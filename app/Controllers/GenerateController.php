<?php

namespace App\Controllers;

use App\Models\adminmodel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;

class GenerateController extends BaseController
{
    public function index()
    {
        $accountType = session()->get('admin_type');

        $adminmodel = new adminmodel();
        $tables = $adminmodel->getAllTableNames();

        $allowedTables = [];

        if ($accountType == 'super_admin') {
            $allowedTables = $tables;
        } elseif ($accountType == 'employee') {
            $allowedTables = $this->filterEmployeeTables($tables);
        } elseif ($accountType == 'seller') {
            $allowedTables = $this->filterSellerTables($tables);
        }

        $data = ['tables' => $allowedTables];

        return view('generate_report', $data);
    }

    private function filterEmployeeTables($tables)
    {
        $allowedTables = ['blogs', 'dripspot', 'stories'];
        return array_intersect($tables, $allowedTables);
    }

    private function filterSellerTables($tables)
    {
        $allowedTables = ['products'];
        return array_intersect($tables, $allowedTables);
    }

    public function gettablecolumns()
    {
        $tableName = $this->request->getPost('table_name');

        $adminmodel = new adminmodel();
        $columns = $adminmodel->getTableColumns($tableName);

        return $this->response->setJSON($columns);
    }

    public function generate_excel_report()
    {
        $tableName = $this->request->getPost('table_name');
        $selectedColumns = $this->request->getPost('columns');
        $efilename = $this->request->getPost('excel-filename');

        $adminmodel = new adminmodel();
        $reportData = $adminmodel->fetchReportData($tableName, $selectedColumns);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = $selectedColumns;
        $sheet->fromArray([$headers], null, 'A1');

        foreach ($reportData as $index => $row) {
            $rowData = [];
            foreach ($selectedColumns as $column) {
                $rowData[] = $row[$column];
            }
            $sheet->fromArray($rowData, null, 'A' . ($index + 2));
        }

        $writer = new Xlsx($spreadsheet);
        $filename = $efilename . '.xlsx';
        $tempFilePath = WRITEPATH . 'uploads/' . $filename;
        $writer->save($tempFilePath);

        return $this->response->download($tempFilePath, null)->setFileName($filename)->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
