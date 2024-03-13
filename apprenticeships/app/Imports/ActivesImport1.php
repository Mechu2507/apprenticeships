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
                'student_name' => $row[2] . ' ' . $row[1],
                'MrMs' => $mrMs,
                'company_name' => isset($row[3]) ? $row[3] : null,
                'company_address' => isset($row[4]) ? $row[4] : null,
                'company_person' => isset($row[5]) ? $row[5] : null,
                'position' => isset($row[6]) ? $row[6] : null,
                'start_date' => isset($row[7]) ? $this->transformStartDate($row[7]) : null,
                'end_date' => isset($row[8]) ? $this->transformEndDate($row[8]) : null,
                'supervisor_name' => isset($row[9]) ? $row[9] : null,
                'hours' => isset($row[10]) ? $row[10] : null,
            ]);
            return $existingActive;
        }else{
            return new Active([
                'code_id' => $this->codeId,
                'student_name' => $row[2] . ' ' . $row[1],
                'MrMs' => $mrMs,
                'company_name' => isset($row[3]) ? $row[3] : null,
                'company_address' => isset($row[4]) ? $row[4] : null,
                'company_person' => isset($row[5]) ? $row[5] : null,
                'position' => isset($row[6]) ? $row[6] : null,
                'start_date' => isset($row[7]) ? $this->transformStartDate($row[7]) : null,
                'end_date' => isset($row[8]) ? $this->transformEndDate($row[8]) : null,
                'supervisor_name' => isset($row[9]) ? $row[9] : null,
                'hours' => isset($row[10]) ? $row[10] : null,
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
