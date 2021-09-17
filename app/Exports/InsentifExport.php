<?php

namespace App\Exports;

use App\Insentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class InsentifExport implements FromCollection,
ShouldAutoSize,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     $insentif = Insentif::all();
    
     return $insentif;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tipe Insentif',
            'Kategori',
            'Tahun Akademik',
            'Nilai',
            'Created at',
            'Updated at'
        ];
    }
    public function map($insentif):array{
        return[
            $insentif->id,$insentif->tipe_insentif,$insentif->kategori,$insentif->tahun_akademik,$insentif->nilai
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:G1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }
}
