<?php

namespace App\Exports;

use App\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class DosenExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:C1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }

}
