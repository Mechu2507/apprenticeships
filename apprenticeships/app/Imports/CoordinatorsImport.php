<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Coordinator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CoordinatorsImport implements ToModel, WithStartRow
{

    use Importable;

    public function model(array $row)
    {

        if(empty($row[1])){
            return null;
        }

        $existingCoordinator = Coordinator::where('direction', $row[1])
                                ->first();

        if ($existingCoordinator) {
            $existingCoordinator->update([
                'direction' => $row[1],
                'name' => isset($row[2]) ? $row[2] : null,
                'phone' => isset($row[3]) ? $row[3] : null,
                'mail_ur' => isset($row[4]) ? $row[4] : null,
                'mail_google' => isset($row[5]) ? $row[5] : null,
                'table_shared' => isset($row[6]) ? $row[6] : null,
                'form_link' => isset($row[7]) ? $row[7] : null,
                'login_method' => isset($row[8]) ? $row[8] : null,
            ]);
            return $existingCoordinator;

        } else {
            return new Coordinator([
                'direction' => $row[1],
                'name' => isset($row[2]) ? $row[2] : null,
                'phone' => isset($row[3]) ? $row[3] : null,
                'mail_ur' => isset($row[4]) ? $row[4] : null,
                'mail_google' => isset($row[5]) ? $row[5] : null,
                'table_shared' => isset($row[6]) ? $row[6] : null,
                'form_link' => isset($row[7]) ? $row[7] : null,
                'login_method' => isset($row[8]) ? $row[8] : null,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
