<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Active;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class ActivesImport implements ToModel, WithStartRow
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
        
        $existingActive = Active::where('student_last_name', $row[1])
                                ->where('student_first_name', $row[2])
                                ->where('company_name', $row[3])
                                ->first();

        $mrMs = (substr(trim($row[2]), -1) === 'a') ? 'Pani' : 'Pan';
        $mrMsCompanyPerson = (substr(trim($row[5]), -1) === 'a') ? 'Pani' : 'Pan';
        $mrMsSupervisor = (substr(trim($row[9]), -1) === 'a') ? 'Pani' : 'Pan';

        if ($existingActive) {
            $existingActive->update([
                'student_last_name' => $row[1],
                'student_first_name' => $row[2],
                'MrMs' => $mrMs,
                'company_name' => isset($row[3]) ? $row[3] : null,
                'company_form' => 1,
                'company_address' => isset($row[4]) ? $row[4] : null,
                'company_person' => isset($row[5]) ? $row[5] : null,
                'MrMs_company_person' => $mrMsCompanyPerson,
                'position' => isset($row[6]) ? $row[6] : null,
                'start_date' => isset($row[7]) ? $this->transformStartDate($row[7]) : null,
                'end_date' => isset($row[8]) ? $this->transformEndDate($row[8]) : null,
                'supervisor_name' => isset($row[9]) ? $row[9] : null,
                'MrMs_supervisor' => $mrMsSupervisor,
                'hours' => isset($row[11]) ? $row[11] : null,
            ]);
            return $existingActive;

        } else {
            return new Active([
                'code_id' => $this->codeId,
                'student_last_name' => $row[1],
                'student_first_name' => $row[2],
                'MrMs' => $mrMs,
                'company_name' => isset($row[3]) ? $row[3] : null,
                'company_form' => 1,
                'company_address' => isset($row[4]) ? $row[4] : null,
                'company_person' => isset($row[5]) ? $row[5] : null,
                'MrMs_company_person' => $mrMsCompanyPerson,
                'position' => isset($row[6]) ? $row[6] : null,
                'start_date' => isset($row[7]) ? $this->transformStartDate($row[7]) : null,
                'end_date' => isset($row[8]) ? $this->transformEndDate($row[8]) : null,
                'supervisor_name' => isset($row[9]) ? $row[9] : null,
                'MrMs_supervisor' => $mrMsSupervisor,
                'hours' => isset($row[11]) ? $row[11] : null,
                'generated' => false,
            ]);
        }

    }

    public function startRow(): int
    {
        return 7;
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
