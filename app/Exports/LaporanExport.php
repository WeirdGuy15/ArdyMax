<?php

namespace App\Exports;

use App\Models\laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return laporan::all();
    }

    public function map($laporan): array
    {
        return [
        	$laporan->id_jadwal,
            $laporan->nama_MPAnMPI,
			$laporan->no_HP1,
			$laporan->no_HP2,
			$laporan->paket,
			$laporan->tgl_resepsi,
        ];
    }

    public function headings(): array

    {

        return [
        	'ID Jadwal',

            'Nama MPA & MPI',

            'No HP 1',

            'No HP 2',

            'Paket',

            'Tanggal Resepsi',

        ];

    }
}
