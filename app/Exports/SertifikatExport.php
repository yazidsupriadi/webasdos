<?php

namespace App\Exports;

use App\Sertifikat;
use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class SertifikatExport implements  ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Sertifikat::query()->with('user');
    }
    public function map($sertifikat): array
    {
        return [
            $sertifikat->id,
            $sertifikat->no_sertifikat,
            $sertifikat->nama,
            $sertifikat->jabatan,
            $sertifikat->matkul,
            $sertifikat->tahun_akademik,
            $sertifikat->sertifikat_file,
            
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'No Sertifikat',
            'Nama Asisten',
            'Jabatan',
            'Mata Kuliah',
            'Tahun Akademik',
            'Sertifikat File'
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