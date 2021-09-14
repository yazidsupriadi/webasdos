<?php

namespace App\Exports;

use App\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class KelasExport implements FromCollection,
ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     $kelas = Kelas::all();
    
     return $kelas;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Kelas',
            'Program Studi',
            'Angkatan',
            'Tahun Akademik',
            'Jumlah Mahasiswa',
            'Created at',
            'Updated at'
        ];
    }
    public function map($kelas):array{
        return[
            $kelas->id,$kelas->prodi,$kelas->angkatan,$kelas->tahun_akademik,$kelas->jumlah_mahasiswa
        ];
    }
}
