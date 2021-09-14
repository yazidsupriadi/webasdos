<?php

namespace App\Exports;

use App\Matkul;
use App\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class MatkulExport implements FromCollection,
ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     $matkul = Matkul::with('dosen')->get();
    
     return $matkul;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kode MK',
            'Keterangan',
            'Dosen Pengampu',
            '#',
            'Created at',
            'Updated at'
        ];
    }
    public function map($matkul):array{
        return[
            $matkul->id,$matkul->nama,$matkul->kodemk,$matkul->dosen->nidn
        ];
    }

}
