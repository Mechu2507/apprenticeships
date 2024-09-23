<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\Active;
use Carbon\Carbon;

class ActivesImport1 implements ToModel, WithStartRow
{
   
    use Importable;

    private $codeId;

    public function __construct($codeId)
    {
        $this->codeId = $codeId;
    }

    public function model(array $row)
    {
        
        if(empty($row[1])){
            return null;
        }

        $existingActive = Active::where('student_name', $row[2] . ' ' . $row[1])
                                ->where('company_name', $row[3])
                                ->first();

        $mrMs = (substr(trim($row[1]), -1) === 'a') ? 'Pani' : 'Pan';

        if($existingActive){
            $existingActive->update([
                'student_name' => $row[1],
                'MrMs' => $mrMs,
                'company_name' => isset($row[2]) ? $row[2] : null,
                'company_form' => 1,
                'company_address' => isset($row[3]) ? $row[3] : null,
                'company_person' => isset($row[4]) ? $row[4] : null,
                'MrMs_company_person' => (substr(trim($row[4]), -1) === 'a') ? 'Pani' : 'Pan',
                'position' => isset($row[5]) ? $row[5] : null,
                'start_date' => isset($row[6]) ? $this->transformStartDate($row[6]) : null,
                'end_date' => isset($row[7]) ? $this->transformEndDate($row[7]) : null,
                'supervisor_name' => isset($row[8]) ? $row[8] : null,
                'MrMs_supervisor' => (substr(trim($row[8]), -1) === 'a') ? 'Pani' : 'Pan',
                'hours' => isset($row[9]) ? $row[9] : null,
            ]);
            return $existingActive;
        }else{
            return new Active([
                'code_id' => $this->codeId,
                'student_name' => $row[1],
                'MrMs' => $mrMs,
                'company_name' => isset($row[2]) ? $row[2] : null,
                'company_form' => 1,
                'company_address' => isset($row[3]) ? $row[3] : null,
                'company_person' => isset($row[4]) ? $row[4] : null,
                'MrMs_company_person' => (substr(trim($row[4]), -1) === 'a') ? 'Pani' : 'Pan',
                'position' => isset($row[5]) ? $row[5] : null,
                'start_date' => isset($row[6]) ? $this->transformStartDate($row[6]) : null,
                'end_date' => isset($row[7]) ? $this->transformEndDate($row[7]) : null,
                'supervisor_name' => isset($row[8]) ? $row[8] : null,
                'MrMs_supervisor' => (substr(trim($row[8]), -1) === 'a') ? 'Pani' : 'Pan',
                'hours' => isset($row[9]) ? $row[9] : null,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    private function transformStartDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format($format);
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value)->format($format);
        }
    }

    private function transformEndDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format($format);
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value)->format($format);
        }
    }
}
