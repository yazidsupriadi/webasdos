<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;


class CalonAsdosExport implements ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery
{
    
   
    public function query()
    {
        return  User::query()->with('asdos')->where('rules','=','applicant');
    }

    public function map($asdos): array
    {
        return [
            $asdos->id,
            $asdos->name,
            $asdos->email,
            $asdos->asdos->kode,
            $asdos->asdos->birthday_place,
            $asdos->asdos->birthday,
            $asdos->asdos->angkatan,
            $asdos->asdos->username_elen,
            $asdos->asdos->no_hp,
            $asdos->asdos->bank,
            $asdos->asdos->no_rek,
            $asdos->asdos->atasnama,
            $asdos->asdos->berkas,
            
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

