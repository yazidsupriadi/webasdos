<?php

namespace App\Exports;

use App\Matkul;
use App\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class MatkulExport implements ToModel,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function model(array $row)
    {
      return new matkul([
          'nama'     => $row['nama'],
          'kodemk'    => $row['kodemk'], 
          'line_manager_id'    => $row['line_manager_id'],
          'employee_designation_id'    => $row['employee_designation_id'],
          'employee_job_title_id'    => $row['employee_job_title_id'],
      ]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kode MK',
            'Dosen Pengampu',
        ];
    }

}
