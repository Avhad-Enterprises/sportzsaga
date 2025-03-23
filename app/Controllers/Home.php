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
        $model = new Discountcode();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID
        $userName = $session->get('admin_name'); // Get logged-in user's name

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
            'added_by' => $userName . ' (' . $userId . ')', // Store admin name and ID
            'created_at' => date('Y-m-d H:i:s'),
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
        $session = session();

        // Fetch existing discount code data
        $existingDiscountCode = $discountCodeModel->find($id);
        if (!$existingDiscountCode) {
            return redirect()->to('discountcodegenerator')->with('error', 'Discount code not found.');
        }

        // Retrieve POST data
        $newData = [
            'title' => $this->request->getPost('title'),
            'typeOfCode' => $this->request->getPost('typeOfCode'),
            'numberOfCodes' => $this->request->getPost('numberOfCodes'),
            'prefix' => $this->request->getPost('prefix'),
            'suffix' => $this->request->getPost('suffix'),
            'code' => $this->request->getPost('code'),
            'discount_type' => $this->request->getPost('discount_type'),
            'discountValue' => $this->request->getPost('discountValue'),
            'minimumPurchaseRequirement' => $this->request->getPost('minimumPurchaseRequirement'),
            'customerEligibility' => $this->request->getPost('customerEligibility'),
            'maximumDiscountUses' => $this->request->getPost('maximumDiscountUses'),
            'limitPerCustomer' => $this->request->getPost('limitPerCustomer'),
            'startDate' => $this->request->getPost('startDate'),
            'endDate' => $this->request->getPost('endDate'),
            'discountstatus' => $this->request->getPost('discountstatus'),
            'exclusion_rules' => $this->request->getPost('exclusion_rules'),
            'usage_tracking' => $this->request->getPost('usage_tracking') ? 1 : 0,
            'auto_expiration_notification' => $this->request->getPost('auto_expiration_notification') ? 1 : 0,
            'notification_period' => $this->request->getPost('notification_period'),
            'randomization_option' => $this->request->getPost('randomization_option') ? 1 : 0,
            'randomization_range' => $this->request->getPost('randomization_range'),
            'code_deactivation' => $this->request->getPost('code_deactivation') ? 1 : 0,
            'updated_by' => $session->get('admin_name') . '(' . $session->get('user_id') . ')',
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // ✅ Track changes
        $changes = [];
        foreach ($newData as $key => $value) {
            if ($existingDiscountCode[$key] != $value) {
                $changes[$key] = [
                    'old' => $existingDiscountCode[$key],
                    'new' => $value
                ];
            }
        }

        if (!empty($changes)) {
            // Retrieve existing change log
            $existingChangeLog = json_decode($existingDiscountCode['change_log'] ?? '[]', true);
            if (!is_array($existingChangeLog)) {
                $existingChangeLog = [];
            }

            // Append new change log entry
            $existingChangeLog[] = [
                'updated_by' => $session->get('admin_name') . ' (' . $session->get('user_id') . ')',
                'timestamp' => date('Y-m-d H:i:s'),
                'changes' => $changes
            ];

            // Store changes in JSON format
            $newData['change_log'] = json_encode($existingChangeLog);

            // Update the discount code data
            if ($discountCodeModel->update($id, $newData)) {
                return redirect()->to('discountcodegenerator')->with('success', 'Discount code updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Update failed.');
            }
        }

        return redirect()->back()->with('info', 'No changes detected.');
    }


    public function delete($id)
    {
        $discountCodeModel = new discountcode();
        $session = session();
        $userId = $session->get('user_id'); // Get logged-in user ID

        // Find the discount code by ID
        $discountCode = $discountCodeModel->find($id);
        if (!$discountCode) {
            return redirect()->to('discountcodegenerator')->with('error', 'Discount code not found.');
        }

        // Get the admin details from the session
        $deletedBy = $session->get('admin_name') . ' (' . $userId . ')';

        // Perform soft delete by updating the necessary fields
        $discountCodeModel->update($id, [
            'is_deleted' => 1, // Mark as deleted
            'deleted_by' => $deletedBy, // Log who deleted it
            'deleted_at' => date('Y-m-d H:i:s'), // Record deletion timestamp
        ]);

        return redirect()->to('discountcodegenerator')->with('success', 'Discount code deleted successfully.');
    }


    public function deletedDiscountCodes()
    {
        $discountCodeModel = new discountcode();

        // Fetch all discount codes marked as deleted
        $data['discount_codes'] = $discountCodeModel->where('is_deleted', 1)->findAll();

        // Return the view with deleted discount codes
        return view('discountcodes_deleted', $data);
    }


    public function restoreDiscountCode($id)
    {
        $discountCodeModel = new discountcode();

        // Find the discount code by ID
        $discountCode = $discountCodeModel->find($id);
        if (!$discountCode) {
            return redirect()->to('discountcodegenerator')->with('error', 'Discount code not found.');
        }

        // Restore the discount code by clearing deletion fields
        $discountCodeModel->update($id, [
            'is_deleted' => 0,
            'deleted_by' => null,
            'deleted_at' => null,
        ]);

        return redirect()->to('discountcodegenerator')->with('success', 'Discount code restored successfully.');
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








    public function discountcode_change_logs($id = null)
    {
        $db = \Config\Database::connect();

        if ($id === null) {
            return view('edit_discount_logs_view', ['updates' => []]); // No discount ID provided
        }

        // Fetch discount code details
        $query = $db->table('discountcode')->select('change_log')->where('id', $id)->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return view('edit_discount_logs_view', ['updates' => []]); // Return empty if decoding fails
            }

            $updates = [];

            foreach ($decodedData as $key => $log) {
                // Extract only numeric keys (0, 1, 2, ...)
                if (is_numeric($key) && isset($log['timestamp'])) {
                    $updates[] = [
                        'updated_by' => $log['updated_by'] ?? 'Unknown',
                        'updated_at' => $log['timestamp'],
                        'changes' => $log['changes'] ?? [],
                    ];
                }
            }

            return view('edit_discount_logs_view', ['updates' => $updates]);
        }

        return view('edit_discount_logs_view', ['updates' => []]); // No logs found
    }


    public function getDiscountCodeChangeLogs()
    {
        $db = \Config\Database::connect();
        $query = $db->table('discountcode')->select('change_log')->get();
        $row = $query->getRow();

        if ($row) {
            $decodedData = json_decode($row->change_log, true);

            if (!is_array($decodedData)) {
                return []; // Return empty array if decoding fails
            }

            $updates = [];

            // Extract only the indexed updates (0, 1, 2, ...)
            foreach ($decodedData as $key => $log) {
                if (is_numeric($key) && isset($log['updated_at'])) {
                    $updates[] = $log;
                }
            }

            return $updates;
        }
        return [];
    }

}



