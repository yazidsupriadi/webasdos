<?php

namespace App\Exports;

use App\Asdos;
use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class AsdosExport implements ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery
{
    
   
    public function query()
    {
        return  Asdos::query()->with('user');
    }

    public function map($asdos): array
    {
        return [
            $asdos->id,
            $asdos->user->name,
            $asdos->user->email,
            $asdos->kode,
            $asdos->birthday_place,
            $asdos->birthday,
            $asdos->angkatan,
            $asdos->username_elen,
            $asdos->no_hp,
            $asdos->bank,
            $asdos->no_rek,
            $asdos->atasnama,
            $asdos->berkas,
            
            
            
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Kode',
            'NIM',
            'Tempat Lahir',
            'Angkatan',
            'Username ELEN',
            'No Handphone',
            'Bank',
            'Nomor Rekening',
            'Atasnama',
            "Berkas Pendaftaran"
            ];
    }
 

}
