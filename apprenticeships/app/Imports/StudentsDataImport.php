<?php

namespace App\Imports;

use App\Models\Active;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsDataImport implements ToModel, WithStartRow
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

        $fullName = $row[1];
        $nameParts = explode(' ', $fullName);

        if(count($nameParts) > 1){
            // $reverseNameParts = $nameParts[1] . ' ' . $nameParts[0];

            Active::where('code_id', $this->codeId)
                ->where('student_name', $row[1])
                ->update([
                    'index' => $row[2],
                    'address' => $row[3],
                    'phone' => $row[4],
                    'email' => $row[5]
                ]);

        }
    return null;
    }

    public function startRow(): int
    {
        return 2;
    }

}
