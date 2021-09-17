<?php

namespace App\Exports;

use App\JadwalPraktikum;
use App\Matkul;
use App\Kelas;
use App\Ruangan;
use App\TahunAkademik;
use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class JadwalPraktikumExport implements ShouldAutoSize,
WithMapping,
WithHeadings,
FromQuery,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return JadwalPraktikum::query()->with('matkul','kelas','ruangan','tahun_akademik','user');
    }
    public function map($jadwal): array
    {
        return [
            $jadwal->id,
            $jadwal->hari,
            $jadwal->jam,
            $jadwal->ruangan->nama_ruangan,
            $jadwal->matkul->nama,
            $jadwal->kelas->kode_kelas,
            $jadwal->kelas->angkatan,
            $jadwal->tahun_akademik->kode_tahun_akademik,
            $jadwal->user->name,
            $jadwal->rekap_absen,
            
            
            
            
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Hari Praktikum',
            'Jam Praktikum',
            'Ruangan',
            'Mata Kuliah',
            'Kelas',
            'Angkatan',
            'Tahun Akademik',
            'Asisten Dosen',
            'Rekap Absen'
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
