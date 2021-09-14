<?php

namespace App\Exports;

use App\Insentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class InsentifExport implements FromCollection,
ShouldAutoSize,WithHeadings
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
}
