<?php

namespace App\Controllers;

use App\Models\visitersmodel;
use App\Models\AdminModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Analytics extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel(); // Load your model here

        // Get the current date and calculate 30 days ago
        $currentDate = date('Y-m-d');
        $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));

        // Count today's new users
        $newUsersToday = $visitermodel
            ->where('visit_type', 'new')
            ->where('DATE(visited_at)', $currentDate)
            ->countAllResults();

        // Count total users (new + returning) who visited today
        $usersVisitedToday = $visitermodel
            ->where('DATE(visited_at)', $currentDate)
            ->countAllResults();

        // Fetch visitor trends for the last 30 days
        $visitorTrends = $db->table('visitors')
            ->select("DATE(visited_at) as visit_date, 
                COUNT(*) as total_visits,
                SUM(CASE WHEN device_type = 'Desktop' THEN 1 ELSE 0 END) as desktop_visits,
                SUM(CASE WHEN device_type = 'Mobile' THEN 1 ELSE 0 END) as mobile_visits,
                SUM(CASE WHEN device_type = 'Tablet' THEN 1 ELSE 0 END) as tablet_visits,
                SUM(CASE WHEN visit_type = 'new' THEN 1 ELSE 0 END) as new_visits,
                SUM(CASE WHEN visit_type = 'returning' THEN 1 ELSE 0 END) as returning_visits")
            ->where('DATE(visited_at) >=', $thirtyDaysAgo) // Only data for the last 30 days
            ->groupBy("DATE(visited_at)")
            ->orderBy("visit_date", "ASC")
            ->get()
            ->getResultArray();

        // Fetch visitor locations (last 30 days data)
        $visitorLocations = $db->table('visitors')
            ->select("location, COUNT(*) as count")
            ->where('DATE(visited_at) >=', $thirtyDaysAgo) // Only data for the last 30 days
            ->groupBy("location")
            ->get()
            ->getResultArray();

        // Fetch data for User Behavior Bar Chart (last 30 days)
        $userBehaviorLogs = $db->table('user_behavior_logs')
            ->select("DATE(created_at) as log_date, COUNT(*) as event_count")
            ->where('DATE(created_at) >=', $thirtyDaysAgo) // Only data for the last 30 days
            ->groupBy("DATE(created_at)")
            ->orderBy("log_date", "ASC")
            ->get()
            ->getResultArray();

        // Fetch session data (last 30 days)
        $sessionData = $db->table('session_analytics')
            ->select("DATE(start_time) as session_date, COUNT(*) as session_count, AVG(duration) as avg_duration")
            ->where('DATE(start_time) >=', $thirtyDaysAgo) // Only data for the last 30 days
            ->groupBy("DATE(start_time)")
            ->orderBy("session_date", "ASC")
            ->get()
            ->getResultArray();

        // Calculate overall average session duration
        $totalDuration = $db->table('session_analytics')
            ->selectSum('duration', 'total_duration')
            ->where('DATE(start_time) >=', $thirtyDaysAgo) // Only data for the last 30 days
            ->get()
            ->getRow()->total_duration;

        $totalSessions = $db->table('session_analytics')->countAllResults();
        $averageDuration = $totalSessions > 0 ? $totalDuration / $totalSessions : 0;

        // Calculate average loading time for Desktop and Mobile (all time)
        $loadingTimes = $db->table('website_loading_times')
            ->select("device_type, AVG(load_time) as avg_load_time")
            ->groupBy("device_type")
            ->get()
            ->getResultArray();

        $avgDesktopLoadTime = 0;
        $avgMobileLoadTime = 0;

        foreach ($loadingTimes as $time) {
            // Convert to seconds and round for readability
            $loadTimeInSeconds = round(abs($time['avg_load_time']), 2); // Assuming load_time is in seconds
            if ($time['device_type'] === 'Desktop') {
                $avgDesktopLoadTime = $loadTimeInSeconds;
            } elseif ($time['device_type'] === 'Mobile') {
                $avgMobileLoadTime = $loadTimeInSeconds;
            }
        }

        // Pass all data to the view
        return view('analytics_view', [
            'visitorTrends' => $visitorTrends,
            'sessionData' => $sessionData,
            'averageDuration' => round($averageDuration, 2),
            'visitorLocations' => $visitorLocations,
            'userBehaviorLogs' => $userBehaviorLogs,
            'newUsersToday' => $newUsersToday,
            'usersVisitedToday' => $usersVisitedToday,
            'avgDesktopLoadTime' => $avgDesktopLoadTime,
            'avgMobileLoadTime' => $avgMobileLoadTime,
        ]);
    }

    public function VisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        $visiters = $visitermodel->GetAllVisitorsData();

        // Count today's new users
        $newUsersToday = $visitermodel
            ->where('visit_type', 'new')
            ->where('DATE(visited_at)', date('Y-m-d'))
            ->countAllResults();

        // Count total users (new + returning) who visited today
        $usersVisitedToday = $visitermodel
            ->where('DATE(visited_at)', date('Y-m-d'))
            ->countAllResults();

        // Fetch raw visitor data for chart
        $rawVisitorData = $visitermodel->select('visited_at, device_type, visit_type, browser, operating_system, location, referrer')
            ->findAll();

        // Fetch distinct filter values for both chart and table
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        // Pass all data to the view
        return view('analytics_detailview', [
            'rawVisitorData' => $rawVisitorData,
            'visiters' => $visiters,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function DesktopVisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        // Fetch desktop visits data only
        $desktopVisitsData = $visitermodel
            ->where('device_type', 'Desktop')
            ->findAll();

        // Fetch additional data for filters
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        return view('desktop_visits_view', [
            'desktopVisitsData' => $desktopVisitsData,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function MobileVisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        // Fetch Mobile visits data only
        $mobileVisitsData = $visitermodel
            ->where('device_type', 'Mobile')
            ->findAll();

        // Fetch additional data for filters
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        return view('mobile_visits_view', [
            'mobileVisitsData' => $mobileVisitsData,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function TabletVisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        // Fetch tablet views data only
        $tabletVisitsData = $visitermodel
            ->where('device_type', 'Tablet')
            ->findAll();

        // Fetch additional data for filters
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        return view('tablet_visits_view', [
            'tabletVisitsData' => $tabletVisitsData,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function NewVisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        // Fetch new views data only
        $newVisitsData = $visitermodel
            ->where('visit_type', 'new')
            ->findAll();

        // Fetch additional data for filters
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        return view('new_visits_view', [
            'newVisitsData' => $newVisitsData,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function ReturningVisitsOverview()
    {
        $db = \Config\Database::connect();
        $visitermodel = new visitersmodel();

        // Fetch returning views data only
        $returnVisitsData = $visitermodel
            ->where('visit_type', 'returning')
            ->findAll();

        // Fetch additional data for filters
        $data['browsers'] = $visitermodel->select('browser')->distinct()->findAll();
        $data['operating_systems'] = $visitermodel->select('operating_system')->distinct()->findAll();
        $data['locations'] = $visitermodel->select('location')->distinct()->findAll();
        $data['referrers'] = $visitermodel->select('referrer')->distinct()->findAll();
        $data['device_types'] = $visitermodel->select('device_type')->distinct()->findAll();
        $data['visit_types'] = $visitermodel->select('visit_type')->distinct()->findAll();

        return view('returning_visits_view', [
            'returnVisitsData' => $returnVisitsData,
            'browsers' => $data['browsers'],
            'operating_systems' => $data['operating_systems'],
            'locations' => $data['locations'],
            'referrers' => $data['referrers'],
            'device_types' => $data['device_types'],
            'visit_types' => $data['visit_types'],
        ]);
    }

    public function export_visitors()
    {
        $model = new visitersmodel();

        // Get filter inputs
        $dateRange = $this->request->getPost('dateRange');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Log inputs for debugging
        log_message('debug', 'Export Inputs - DateRange: ' . $dateRange . ', StartDate: ' . $startDate . ', EndDate: ' . $endDate);

        // Calculate date range if predefined and no custom dates provided
        if ($dateRange !== 'custom' && empty($startDate) && empty($endDate)) {
            $today = new \DateTime();
            switch ($dateRange) {
                case 'last30days':
                    $startDate = $today->modify('-30 days')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastMonth':
                    $startDate = $today->modify('first day of last month')->format('Y-m-d');
                    $endDate = $today->modify('last day of last month')->format('Y-m-d');
                    break;
                case 'last6months':
                    $startDate = $today->modify('-6 months')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'thisYear':
                    $startDate = $today->modify('first day of January this year')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastYear':
                    $startDate = date('Y-01-01', strtotime('last year'));
                    $endDate = date('Y-12-31', strtotime('last year'));
                    break;
            }
        }

        // Build query
        $builder = $model->db->table('visitors');
        if (!empty($startDate)) {
            $builder->where('visited_at >=', $startDate);
        }
        if (!empty($endDate)) {
            $builder->where('visited_at <=', $endDate);
        }

        // Fetch data
        $visitors = $builder->select('user_agent, browser, operating_system, location, referrer, visit_type, visited_at')
            ->get()
            ->getResultArray();

        // Log the query and result count
        log_message('debug', 'SQL Query: ' . $model->db->getLastQuery());
        log_message('debug', 'Number of records fetched: ' . count($visitors));

        if (empty($visitors)) {
            log_message('error', 'No data found for the given date range.');
            return redirect()->back()->with('error', 'No data available for the selected date range.');
        }

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['User Agent', 'Browser', 'Operating System', 'Location', 'Referrer', 'Visit Type', 'Visited At'];
        $sheet->fromArray($headers, null, 'A1');

        // Add data
        $sheet->fromArray($visitors, null, 'A2');

        // Auto-size columns
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Generate filename
        $filename = 'Visitor_Data_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write to file and output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function export_desktop_visitors()
    {
        $model = new visitersmodel();

        // Get filter inputs
        $dateRange = $this->request->getPost('dateRange');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Log inputs for debugging
        log_message('debug', 'Export Desktop Inputs - DateRange: ' . $dateRange . ', StartDate: ' . $startDate . ', EndDate: ' . $endDate);

        // Calculate date range if predefined and no custom dates provided
        if ($dateRange !== 'custom' && empty($startDate) && empty($endDate)) {
            $today = new \DateTime();
            switch ($dateRange) {
                case 'last30days':
                    $startDate = $today->modify('-30 days')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastMonth':
                    $startDate = $today->modify('first day of last month')->format('Y-m-d');
                    $endDate = $today->modify('last day of last month')->format('Y-m-d');
                    break;
                case 'last6months':
                    $startDate = $today->modify('-6 months')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'thisYear':
                    $startDate = $today->modify('first day of January this year')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastYear':
                    $startDate = date('Y-01-01', strtotime('last year'));
                    $endDate = date('Y-12-31', strtotime('last year'));
                    break;
            }
        }

        // Build query
        $builder = $model->db->table('visitors');
        $builder->where('device_type', 'Desktop'); // Filter for desktop only
        if (!empty($startDate)) {
            $builder->where('visited_at >=', $startDate);
        }
        if (!empty($endDate)) {
            $builder->where('visited_at <=', $endDate);
        }

        // Fetch data
        $visitors = $builder->select('user_agent, browser, operating_system, location, referrer, visit_type, visited_at')
            ->get()
            ->getResultArray();

        // Log the query and result count
        log_message('debug', 'SQL Query: ' . $model->db->getLastQuery());
        log_message('debug', 'Number of desktop records fetched: ' . count($visitors));

        if (empty($visitors)) {
            log_message('error', 'No desktop data found for the given date range.');
            return redirect()->back()->with('error', 'No desktop data available for the selected date range.');
        }

        // Create new Spreadsheet object
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['User Agent', 'Browser', 'Operating System', 'Location', 'Referrer', 'Visit Type', 'Visited At'];
        $sheet->fromArray($headers, null, 'A1');

        // Add data
        $sheet->fromArray($visitors, null, 'A2');

        // Auto-size columns
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Generate filename
        $filename = 'Desktop_Visitor_Data_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write to file and output
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function export_mobile_visitors()
    {
        $model = new visitersmodel();

        // Get filter inputs
        $dateRange = $this->request->getPost('dateRange');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Log inputs for debugging
        log_message('debug', 'Export Mobile Inputs - DateRange: ' . $dateRange . ', StartDate: ' . $startDate . ', EndDate: ' . $endDate);

        // Calculate date range if predefined and no custom dates provided
        if ($dateRange !== 'custom' && empty($startDate) && empty($endDate)) {
            $today = new \DateTime();
            switch ($dateRange) {
                case 'last30days':
                    $startDate = $today->modify('-30 days')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastMonth':
                    $startDate = $today->modify('first day of last month')->format('Y-m-d');
                    $endDate = $today->modify('last day of last month')->format('Y-m-d');
                    break;
                case 'last6months':
                    $startDate = $today->modify('-6 months')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'thisYear':
                    $startDate = $today->modify('first day of January this year')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastYear':
                    $startDate = date('Y-01-01', strtotime('last year'));
                    $endDate = date('Y-12-31', strtotime('last year'));
                    break;
            }
        }

        // Build query
        $builder = $model->db->table('visitors');
        $builder->where('device_type', 'Mobile'); // Filter for mobile only
        if (!empty($startDate)) {
            $builder->where('visited_at >=', $startDate);
        }
        if (!empty($endDate)) {
            $builder->where('visited_at <=', $endDate);
        }

        // Fetch data
        $visitors = $builder->select('user_agent, browser, operating_system, location, referrer, visit_type, visited_at')
            ->get()
            ->getResultArray();

        // Log the query and result count
        log_message('debug', 'SQL Query: ' . $model->db->getLastQuery());
        log_message('debug', 'Number of mobile records fetched: ' . count($visitors));

        if (empty($visitors)) {
            log_message('error', 'No mobile data found for the given date range.');
            return redirect()->back()->with('error', 'No mobile data available for the selected date range.');
        }

        // Create new Spreadsheet object
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['User Agent', 'Browser', 'Operating System', 'Location', 'Referrer', 'Visit Type', 'Visited At'];
        $sheet->fromArray($headers, null, 'A1');

        // Add data
        $sheet->fromArray($visitors, null, 'A2');

        // Auto-size columns
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Generate filename
        $filename = 'Mobile_Visitor_Data_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write to file and output
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function export_tablet_visitors()
    {
        $model = new visitersmodel();

        // Get filter inputs
        $dateRange = $this->request->getPost('dateRange');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        // Log inputs for debugging
        log_message('debug', 'Export Tablet Inputs - DateRange: ' . $dateRange . ', StartDate: ' . $startDate . ', EndDate: ' . $endDate);

        // Calculate date range if predefined and no custom dates provided
        if ($dateRange !== 'custom' && empty($startDate) && empty($endDate)) {
            $today = new \DateTime();
            switch ($dateRange) {
                case 'last30days':
                    $startDate = $today->modify('-30 days')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastMonth':
                    $startDate = $today->modify('first day of last month')->format('Y-m-d');
                    $endDate = $today->modify('last day of last month')->format('Y-m-d');
                    break;
                case 'last6months':
                    $startDate = $today->modify('-6 months')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'thisYear':
                    $startDate = $today->modify('first day of January this year')->format('Y-m-d');
                    $endDate = date('Y-m-d');
                    break;
                case 'lastYear':
                    $startDate = date('Y-01-01', strtotime('last year'));
                    $endDate = date('Y-12-31', strtotime('last year'));
                    break;
            }
        }

        // Build query
        $builder = $model->db->table('visitors');
        $builder->where('device_type', 'Tablet'); // Filter for tablet only
        if (!empty($startDate)) {
            $builder->where('visited_at >=', $startDate);
        }
        if (!empty($endDate)) {
            $builder->where('visited_at <=', $endDate);
        }

        // Fetch data
        $visitors = $builder->select('user_agent, browser, operating_system, location, referrer, visit_type, visited_at')
            ->get()
            ->getResultArray();

        // Log the query and result count
        log_message('debug', 'SQL Query: ' . $model->db->getLastQuery());
        log_message('debug', 'Number of tablet records fetched: ' . count($visitors));

        if (empty($visitors)) {
            log_message('error', 'No tablet data found for the given date range.');
            return redirect()->back()->with('error', 'No tablet data available for the selected date range.');
        }

        // Create new Spreadsheet object
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['User Agent', 'Browser', 'Operating System', 'Location', 'Referrer', 'Visit Type', 'Visited At'];
        $sheet->fromArray($headers, null, 'A1');

        // Add data
        $sheet->fromArray($visitors, null, 'A2');

        // Auto-size columns
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Generate filename
        $filename = 'Tablet_Visitor_Data_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write to file and output
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function AllReportsView()
    {
        $adminmodel = new AdminModel();
        $reports = $adminmodel->getAllReports();
        $data = ['reports' => $reports];
        return view('all_reports_view', $data);
    }

    public function generateReportsLogs()
    {
        $adminModel = new AdminModel();
        $userModel = new \App\Models\Registerusers_model();
        $logs = $adminModel->getReportLogs();

        foreach ($logs as &$log) {
            $log['created_by_name'] = $userModel->getUserNameById($log['created_by']);
            $log['updated_by_name'] = $userModel->getUserNameById($log['updated_by']);
            $log['deleted_by_name'] = $userModel->getUserNameById($log['deleted_by']);
        }

        $data = ['logs' => $logs];
        return view('reports_logs_view', $data);
    }

    public function generateReportsView($reportId = null)
    {
        $adminModel = new AdminModel();
        $tables = $adminModel->getSpecificTables();
        $data = ['tables' => $tables];

        if ($reportId) {
            $report = $adminModel->getReportById($reportId);
            if ($report) {
                $data['report'] = $report;
            }
        }

        return view('create_reports_view', $data);
    }

    public function saveReport()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getJSON(true);
        $session = session();
        $userId = $session->get('user_id');

        $reportData = [
            'created_by' => $userId,
            'report_name' => $data['report_name'],
            'table_name' => $data['table_name'],
            'columns' => json_encode($data['columns']),
            'filters' => !empty($data['filters']) ? json_encode($data['filters']) : null
        ];

        $builder = $db->table('saved_reports');
        $builder->insert($reportData);

        if ($db->affectedRows() > 0) {
            return $this->response->setJSON(['success' => true, 'id' => $db->insertID()]);
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Failed to save report']);
    }

    public function updateReport($reportId)
    {
        $db = \Config\Database::connect();
        $data = $this->request->getJSON(true);
        $session = session();
        $userId = $session->get('user_id');

        $reportData = [
            'updated_by' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
            'report_name' => $data['report_name'],
            'table_name' => $data['table_name'],
            'columns' => json_encode($data['columns']),
            'filters' => !empty($data['filters']) ? json_encode($data['filters']) : null
        ];

        $builder = $db->table('saved_reports');
        $builder->where('id', $reportId);
        $builder->update($reportData);

        if ($db->affectedRows() >= 0) {
            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Failed to update report']);
    }

    public function deleteGReport($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You must be logged in to delete a report.');
        }

        $adminModel = new AdminModel();

        $data = [
            'is_deleted' => 1,
            'deleted_by' => $userId,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $adminModel->DeleteReportsData($id, $data);
        return redirect()->to('analytics/reports')->with('success', 'Report deleted successfully');
    }

    public function RestoreGReport($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You must be logged in to restore a report.');
        }

        $adminModel = new AdminModel();

        $data = [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null
        ];

        $adminModel->RestoreReportsData($id, $data);
        return redirect()->back()->with('success', 'Report restored successfully');
    }

    public function getColumns($table)
    {
        $db = \Config\Database::connect();
        $builder = $db->query('DESCRIBE ' . $db->escapeIdentifiers($table));
        $columns = $builder->getResultArray();

        $columnNames = [];
        $formattedColumnNames = [];
        $columnTypes = [];

        foreach ($columns as $column) {
            $rawColumnName = $column['Field'];
            $formattedColumnName = ucwords(str_replace('_', ' ', $rawColumnName));
            $rawType = strtolower($column['Type']);

            if (stripos($rawType, 'varchar') !== false || stripos($rawType, 'text') !== false) {
                $type = 'Text';
            } elseif (stripos($rawType, 'int') !== false || stripos($rawType, 'float') !== false || stripos($rawType, 'double') !== false || stripos($rawType, 'decimal') !== false) {
                $type = 'Number';
            } elseif (stripos($rawType, 'tinyint(1)') !== false) {
                $type = 'Boolean';
            } elseif (stripos($rawType, 'date') !== false || stripos($rawType, 'time') !== false) {
                $type = 'DateTime';
            } elseif (stripos($rawType, 'enum') !== false || stripos($rawType, 'set') !== false) {
                $type = 'Enum';
                preg_match("/^enum\((.*)\)$/", $rawType, $matches);
                $enumValues = isset($matches[1]) ? array_map('trim', explode(',', str_replace("'", "", $matches[1]))) : [];
                $columnTypes[$rawColumnName]['enum_values'] = $enumValues;
            } else {
                $type = 'Text';
            }

            $columnNames[] = $rawColumnName;
            $formattedColumnNames[] = $formattedColumnName;
            $columnTypes[$rawColumnName] = ['type' => $type];
            if (isset($enumValues)) {
                $columnTypes[$rawColumnName]['enum_values'] = $enumValues;
            }
        }

        return $this->response->setJSON([
            'columns' => $columnNames,
            'formattedColumns' => $formattedColumnNames,
            'columnTypes' => $columnTypes
        ]);
    }

    public function getReportData($table)
    {
        $columns = $this->request->getPost('columns');

        if ($table && !empty($columns)) {
            $db = \Config\Database::connect();
            $builder = $db->table($table);
            $builder->select($columns);
            $query = $builder->get();
            $rows = $query->getResultArray();

            return $this->response->setJSON([
                'columns' => $columns,
                'rows' => $rows
            ]);
        }

        return $this->response->setJSON(['error' => 'Invalid table or columns']);
    }
}
