<?php

namespace App\Controllers;

use App\Models\Registerusers_model;
use App\Models\Footer_model;
use App\Models\SocialMediaLinks_model;
use App\Models\Controls_model;
use App\Models\discountcode;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    protected $pager;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }



    public function discountcodegenerator()
    {
        $discountCodeModel = new discountcode();
        $data['discountcode'] = $discountCodeModel->getDiscountCodes();
        return view('discount_code_view', $data);
    }

    public function publishDiscountCode()
    {
        $model = new discountcode();

        // Get POST data
        $title = $this->request->getPost('title');
        $typeOfCode = $this->request->getPost('typeOfCode');
        $numberOfCodes = $this->request->getPost('numberOfCodes');
        $prefix = $this->request->getPost('prefix');
        $suffix = $this->request->getPost('suffix');
        $code = $this->request->getPost('code');
        $codelength = $this->request->getPost('codeLength');
        $discountType = $this->request->getPost('discount_type');
        $discountValue = $this->request->getPost('discountValue');
        $minimumPurchaseRequirement = $this->request->getPost('minimumPurchaseRequirement');
        $customerEligibility = $this->request->getPost('customerEligibility');
        $limitPerCustomer = $this->request->getPost('limitPerCustomer');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');
        $autoExpirationNotification = $this->request->getPost('auto_expiration_notification') ? 1 : 0;
        $notificationPeriod = $this->request->getPost('notification_period');

        // Process codes
        $codes = explode(', ', $code);
        log_message('info', 'Codes to insert: ' . print_r($codes, true)); // Log codes

        // Determine discount status
        $discountStatus = (strtotime($startDate) <= time() && time() <= strtotime($endDate)) ? 'Active' : 'Inactive';

        // Prepare base discount data
        $baseDiscountData = [
            'title' => $title,
            'typeOfCode' => $typeOfCode,
            'numberOfCodes' => $numberOfCodes,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'codeLength' => $codelength,
            'code' => $code,
            'discount_type' => $discountType,
            'discountValue' => $discountValue,
            'minimumPurchaseRequirement' => $minimumPurchaseRequirement,
            'customerEligibility' => $customerEligibility,
            'limitPerCustomer' => $limitPerCustomer,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'discountStatus' => $discountStatus,
            'auto_expiration_notification' => $autoExpirationNotification,
            'notification_period' => $notificationPeriod,
        ];


        try {
            $model->db->transStart();

            $insertedCodes = [];
            foreach ($codes as $singleCode) {
                $discountData = array_merge($baseDiscountData, ['code' => $singleCode]);
                $insertResult = $model->insert($discountData);
                if (!$insertResult) {
                    log_message('error', 'Failed to insert discount data: ' . print_r($model->errors(), true));
                } else {
                    log_message('info', 'Successfully inserted code: ' . $singleCode);
                }
                $insertedCodes[] = $singleCode;
            }

            $model->db->transComplete();

            if ($model->db->transStatus() === false) {
                log_message('error', 'Transaction failed. DB error: ' . $model->db->getLastQuery());
                throw new \Exception('Transaction failed');
            }

            if ($typeOfCode === 'Exclusive') {
                $excelFile = $this->generateExcelFile($insertedCodes, $title);
                return $this->response->download($excelFile, null)->setFileName("discount_codes_{$title}.xlsx");
            }

            return redirect()->to('discountcodegenerator')->with('success', 'Discount code(s) published successfully');
        } catch (\Exception $e) {
            log_message('error', 'Exception occurred: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to insert discount code. Please try again.');
        }
    }

    private function generateExcelFile($codes, $title)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Discount Code');
        $sheet->setCellValue('B1', 'Title');

        // Add data
        $row = 2;
        foreach ($codes as $code) {
            $sheet->setCellValue('A' . $row, $code);
            $sheet->setCellValue('B' . $row, $title);
            $row++;
        }

        // Create Excel file
        $writer = new Xlsx($spreadsheet);
        $fileName = WRITEPATH . 'uploads/discount_codes_' . time() . '.xlsx';

        log_message('info', 'Saving Excel file to: ' . $fileName);
        $writer->save($fileName);

        return $fileName;
    }

    public function addnewdiscountcode()
    {
        return view('addnew_discountcode_view');
    }

    public function discount_code_view()
    {
        return view('discount_code_view');
    }

    public function view($id)
    {
        $discountCodeModel = new discountcode();
        $data['discountcode'] = $discountCodeModel->getDiscountCodeById($id);
        return view('edit_discountcode_view', $data);
    }

    public function edit($id)
    {
        $discountCodeModel = new discountcode();
        $data['discountcode'] = $discountCodeModel->getDiscountCodeById($id);
        return view('edit_discountcode_view', $data);
    }

    public function update($id)
    {
        // Load the model
        $discountCodeModel = new discountcode();

        // Retrieve POST data
        $title = $this->request->getPost('title');
        $typeOfCode = $this->request->getPost('typeOfCode');
        $numberOfCodes = $this->request->getPost('numberOfCodes');
        $prefix = $this->request->getPost('prefix');
        $suffix = $this->request->getPost('suffix');
        $code = $this->request->getPost('code');
        $codelength = $this->request->getPost('codeLength');
        $discountType = $this->request->getPost('discount_type');
        $discountValue = $this->request->getPost('discountValue');
        $minimumPurchaseRequirement = $this->request->getPost('minimumPurchaseRequirement');
        $customerEligibility = $this->request->getPost('customerEligibility');
        $maximumDiscountUses = $this->request->getPost('maximumDiscountUses');
        $limitPerCustomer = $this->request->getPost('limitPerCustomer');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');
        $discountstatus = $this->request->getPost('discountstatus');

        $exclusionRules = $this->request->getPost('exclusion_rules');
        $usageTracking = $this->request->getPost('usage_tracking') ? 1 : 0;
        $autoExpirationNotification = $this->request->getPost('auto_expiration_notification') ? 1 : 0;
        $notificationPeriod = $this->request->getPost('notification_period');
        $randomizationOption = $this->request->getPost('randomization_option') ? 1 : 0;
        $randomizationRange = $this->request->getPost('randomization_range');
        $codeDeactivation = $this->request->getPost('code_deactivation') ? 1 : 0;

        // Prepare the data to be updated
        $discountCodeData = [
            'title' => $title,
            'typeOfCode' => $typeOfCode,
            'numberOfCodes' => $numberOfCodes,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'code' => $code,
            'codeLength' => $codelength,
            'discount_type' => $discountType,
            'discountValue' => $discountValue,
            'minimumPurchaseRequirement' => $minimumPurchaseRequirement,
            'customerEligibility' => $customerEligibility,
            'maximumDiscountUses' => $maximumDiscountUses,
            'limitPerCustomer' => $limitPerCustomer,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'discountstatus' => $discountstatus,
            'exclusion_rules' => $exclusionRules,
            'usage_tracking' => $usageTracking,
            'auto_expiration_notification' => $autoExpirationNotification,
            'notification_period' => $notificationPeriod,
            'randomization_option' => $randomizationOption,
            'randomization_range' => $randomizationRange,
            'code_deactivation' => $codeDeactivation,
        ];

        if ($discountCodeModel->updateDiscountCode($id, $discountCodeData)) {
            return redirect()->to('discountcodegenerator');
        } else {
            return redirect()->back()->with('error', 'Update failed');
        }
    }

    public function delete($id)
    {
        $discountCodeModel = new discountcode();
        $discountCodeModel->deletecode($id);
        return redirect()->to('discountcodegenerator');
    }

    public function saveDiscountCode()
    {
        $model = new discountcode();

        $discountstatus = $this->request->getPost('discountstatus');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        if (!in_array($discountstatus, ['active', 'inactive'])) {
            return redirect()->back()->with('error', 'Invalid discount status');
        }

        $discountData = [
            'discountstatus' => $discountstatus,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];

        try {
            $model->insert($discountData);
            return redirect()->to('/your-success-page')->with('success', 'Discount code saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save discount code: ' . $e->getMessage());
        }
    }

    public function exportdiscountcode()
    {
        // Load the model
        $discountCodeModel = new discountcode();
        // Retrieve data from the model
        $data = $discountCodeModel->getDiscountCodeData();

        // Load the Spreadsheet class
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $column = 'A';
        foreach ($data[0] as $key => $value) {
            $sheet->setCellValue($column . '1', $key);
            $column++;
        }

        // Populate data rows
        $row = 2;
        foreach ($data as $row_data) {
            $column = 'A';
            foreach ($row_data as $value) {
                $sheet->setCellValue($column . $row, $value);
                $column++;
            }
            $row++;
        }

        // Set headers for file download
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'DiscountCode_Data.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function importfromexcel()
    {
        return view('import_discountcode_view');
    }

    public function offersdata()
    {
        // Load the discountcode model if not loaded automatically
        $discountcode = new \App\Models\discountcode();

        // Fetch all discount codes
        $data['discountcode'] = $discountcode->findAll();

        // Load the view with data
        return view('Offers', $data);
    }

    public function applyDiscount()
    {
        $code = $this->request->getPost('code');

        // Load the model
        $discountcode = new \App\Models\discountcode();

        // Validate the discount code
        $discount = $discountcode->where('code', $code)->first();

        if ($discount) {
            // Check if the discount is valid (e.g., not expired)
            $currentDate = date('Y-m-d');
            if ($discount['startDate'] <= $currentDate && $discount['endDate'] >= $currentDate) {
                // Code is valid, redirect to the next page
                return redirect()->to('');
            } else {
                // Code is expired
                return redirect()->back()->with('error', 'Discount code has expired.');
            }
        } else {
            // Code is invalid
            return redirect()->back()->with('error', 'Invalid discount code.');
        }
    }

    public function download_file()
    {
        $filePath = FCPATH . 'uploads/excel/SportzSaga.xlsx';

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
        }
    }
    public function download_user_file()
    {
        $filePath = FCPATH . 'uploads/excel/User_bulk_template.xlsx';

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
        }
    }
}
