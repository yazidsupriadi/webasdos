<?php

namespace App\Exports;

use App\Matkul;
use App\Dosen;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class MatkulExport implements  ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery,WithEvents
{
    
   
    public function query()
    {
        return  Matkul::query()->with('dosen');
    }

    public function map($matkul): array
    {
        return [
            $matkul->id,
            $matkul->nama,
            $matkul->kodemk,
            $matkul->keterangan,
            $matkul->dosen->nama,
            $matkul->created_at
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kode MK',
            'Keterangan',
            'Dosen Pengampu',
            'Created at',
            ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:F1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }

}
