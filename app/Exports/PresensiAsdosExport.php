<?php

namespace App\Exports;

use App\Presensi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class PresensiAsdosExport implements ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $year, int $month,int $user)
    {
        $this->month = $month;
        $this->year  = $year;
    }
    public function query()
    {
        return  Presensi::query()->with('user','tahun_akademik','jadwal_praktek')
        ->whereYear('tanggal_praktek', $this->year)
        ->whereMonth('tanggal_praktek', $this->month)
        ->where('user_id',$this->user);
    }

    public function map($presensi): array
    {
        return [
            $presensi->id,
            $presensi->tanggal_praktek,
            $presensi->pertemuan,
            $presensi->rekap_absen,
            $presensi->keterangan,
            $presensi->user->name,
            $presensi->tahun_akademik->kode_tahun_akademik
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Tanggal Praktikum',
            'Pertemuan',
            'Rekap Absen',
            'Keterangan',
            'Nama Asisten',
            'Tahun Akademik'
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
