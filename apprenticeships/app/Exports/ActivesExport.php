<?php

namespace App\Exports;

use App\Models\Active;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ActivesExport implements FromCollection, WithHeadings, WithMapping
{

    private $codeId;

    public function __construct($codeId)
    {
        $this->codeId = $codeId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Active::where('code_id', $this->codeId)->get([
            'student_last_name',
            'student_first_name',
            'company_name',
            'company_address',
            'company_person',
            'position',
            'start_date',
            'end_date',
            'supervisor_name',
            'hours',
            'generated'
        ]);
    }

    public function map($active): array
    {
        return [
            $active->student_last_name,
            $active->student_first_name,
            $active->company_name,
            $active->company_address,
            $active->company_person,
            $active->position,
            $active->start_date,
            $active->end_date,
            $active->supervisor_name,
            $active->hours,
            $active->generated ? 'TAK' : 'NIE'
        ];
    }

    public function headings(): array
    {
        return [
            'Nazwisko studenta',
            'Imię studenta',
            'Dokładna nazwa instytucji ',
            'Dokładny adres instytucji',
            'Nazwisko i imię osoby, która reprezentuje instytucję',
            'Pełniona funkcja osoby, która reprezentuje instytucję',
            'Termin odbycia praktyk data rozpoczęcia',
            'Termin odbycia praktyk data zakończenia',
            'Nazwisko i imię opiekuna w instytucji ',
            'Uwagi (liczba godzin) ',
            'Porozumienie podpisane, gotowe do odbioru'
        ];
    }    
}
