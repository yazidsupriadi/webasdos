<?php

namespace App\Exports;

use App\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class DosenExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dosen::select("nidn",'nama')->get();
    }
    public function headings(): array
    {
        return [
            'NIDN',
            'Name',
        ];
    }

}
