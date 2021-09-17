<?php

namespace App\Exports;

use App\Ruangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;


class RuanganExport implements FromCollection,
ShouldAutoSize,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     $ruangan = Ruangan::all();
    
     return $ruangan;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Ruangan',
            'Nama Ruangan',
            'Kapasitas Ruangan',
            'Created at',
            'Updated at'
        ];
    }
    public function map($ruangan):array{
        return[
            $ruangan->id,$ruangan->kode_ruangan,$ruangan->nama_ruangan,$ruangan->kapasitas_ruangan
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:H1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }
}
