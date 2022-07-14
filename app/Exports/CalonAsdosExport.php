<?php

namespace App\Exports;

use App\Asdos;
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
        return  Asdos::select('asdos.*','users.*')->join('users', 'users.id', '=', 'asdos.user_id')->where('users.rules', '=', 'applicant');

        
    }

    public function map($calonasdos): array
    {
        return [
            $calonasdos->id,
            $calonasdos->user->name,
            $calonasdos->user->email,
            $calonasdos->kode,
            $calonasdos->birthday_place,
            $calonasdos->birthday,
            $calonasdos->angkatan,
            $calonasdos->username_elen,
            $calonasdos->no_hp,
            $calonasdos->bank,
            $calonasdos->no_rek,
            $calonasdos->atasnama,
            $calonasdos->berkas,
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

