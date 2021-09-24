<?php

namespace App\Exports;

use App\Gaji;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class GajiExport implements ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $year, int $month)
    {
        $this->month = $month;
        $this->year  = $year;
    }
    public function query()
    {
        return  Gaji::query()
        ->with('insentif','user')
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month);
    }

    public function map($gaji): array
    {
        return [
            $gaji->id,
            $gaji->kode_gaji,
            $gaji->bulan_gaji,
            $gaji->total,
            $gaji->insentif->tipe_insentif,
            $gaji->insentif->kategori,
            $gaji->insentif->nilai, 
            $gaji->user->name,
            $gaji->status,
            $gaji->created_at
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Kode Gaji',
            'Bulan Gaji',
            'Total Honor',
            'Tipe Insentif',
            'Kategori Insentif',
            'Nilai Insentif',
            'Nama Asdos',
            'Status Honor',
            'Data Masuk'
            ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:J1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }
}
