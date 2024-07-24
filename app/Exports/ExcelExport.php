<?php

namespace App\Exports;

use App\Models\Pemohon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pemohon::all([
            'nama', 'nik', 'email', 'divisi', 'grup', 'kebutuhan', 'akses', 'koneksiAplikasi',
            'mulai', 'sampai', 'ipSource', 'ipDestination', 'port', 'initiateConnection', 'lampiran'
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama', 'NIK', 'Email', 'Divisi', 'Grup', 'Kebutuhan', 'Akses', 'Koneksi Aplikasi',
            'Waktu Mulai', 'Waktu Selesai', 'IP Source', 'IP Destination', 'Port', 'Initiate Connection', 'Lampiran'
        ];
    }
}
