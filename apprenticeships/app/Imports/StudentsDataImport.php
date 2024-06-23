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

            Active::where('code_id', $this->codeId)
                ->where('student_last_name', $row[1])
                ->where('student_first_name', $row[2])
                ->update([
                    'index' => $row[3],
                    'address' => $row[4],
                    'phone' => $row[5],
                    'email' => $row[6]
                ]);

    return null;
    }

    public function startRow(): int
    {
        return 2;
    }

}
