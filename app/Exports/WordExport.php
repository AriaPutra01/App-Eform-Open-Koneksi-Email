<?php

namespace App\Exports;

use App\Models\Pemohon;
use PhpOffice\PhpWord\TemplateProcessor;

class WordExport
{
    public function export( $id)
    {
        // 1. Fetch the data from your database based on the ID
        $data = Pemohon::findOrFail($id);

        // 2. Load the Word template
        $templateProcessor = new TemplateProcessor( 'wordTemplate.docx');

        // 3. Replace placeholders with data
        $templateProcessor->setValue('tujuan', $data->tujuan);
        $templateProcessor->setValue('nama', $data->nama);
        $templateProcessor->setValue('nik', $data->nik);
        $templateProcessor->setValue('email', $data->email);
        $templateProcessor->setValue('divisi', $data->divisi);
        $templateProcessor->setValue('grup', $data->grup);
        // radio kebutuhan
        $templateProcessor->setValue('productionCheckbox', $data->kebutuhan == 'production' ? '☑' : '');
        $templateProcessor->setValue('developmentCheckbox', $data->kebutuhan == 'development' ? '☑' : '');
        // radio akses
        $templateProcessor->setValue('internalCheckbox', $data->akses == 'internal' ? '☑' : '');
        $templateProcessor->setValue('pihakKetigaCheckbox', $data->akses == 'pihakKetiga' ? '☑' : '');
        $templateProcessor->setValue('akses', $data->akses);
        $templateProcessor->setValue('koneksiAplikasi', $data->koneksiAplikasi);
        $templateProcessor->setValue('mulai', $data->mulai);
        $templateProcessor->setValue('sampai', $data->sampai);
        $templateProcessor->setValue('ipSource', $data->ipSource);
        $templateProcessor->setValue('ipDestination', $data->ipDestination);
        $templateProcessor->setValue('port', $data->port);
        // radio initiate connection
        $templateProcessor->setValue('bankBjbCheckbox', $data->initiateConnection == 'Bank bjb' ? '☑' : '');
        $templateProcessor->setValue('pihakKetigaInitiateCheckbox', $data->initiateConnection == 'Pihak Ketiga' ? '☑' : '');
        // radio lampiran
        $templateProcessor->setValue('waktuPermohonan', $data->waktuPermohonan);
        $templateProcessor->setValue('topologyCheckbox', $data->lampiran == 'Topology Aplikasi' ? '☑' : '');
        $templateProcessor->setValue('perjanjianCheckbox', $data->lampiran == 'Perjanjian Kerjasama' ? '☑' : '');
        $templateProcessor->setValue('brdCheckbox', $data->lampiran == 'BRD' ? '☑' : '');
        $templateProcessor->setValue('lainnyaCheckbox', $data->lampiran == 'Lainnya' ? '☑' : '');

        // 4. Generate the Word document
        $fileName = 'eForm Permohonan ' . $data->nama . '.docx';
        $templateProcessor->saveAs($fileName);

        // 5. Download the file
        return response()->download($fileName);
    }

//     public function exportToWord($id)
// {
//     // 1. Fetch the data from your database based on the ID
//     $data = Pemohon::findOrFail($id);

//     // 2. Load the Word template
//     $templateProcessor = new TemplateProcessor('wordTemplate.docx');

//     // 3. Replace placeholders with data
//     $templateProcessor->setValue('tujuan', $data->tujuan);
//     $templateProcessor->setValue('nama', $data->nama);
//     $templateProcessor->setValue('nik', $data->nik);
//     $templateProcessor->setValue('email', $data->email);
//     $templateProcessor->setValue('divisi', $data->divisi);
//     $templateProcessor->setValue('grup', $data->grup);

//     // Radio kebutuhan
//     $templateProcessor->setValue('productionCheckbox', $data->kebutuhan == 'production' ? '☑' : '');
//     $templateProcessor->setValue('developmentCheckbox', $data->kebutuhan == 'development' ? '☑' : '');

//     // Radio akses
//     $templateProcessor->setValue('internalCheckbox', $data->akses == 'internal' ? '☑' : '');
//     $templateProcessor->setValue('pihakKetigaCheckbox', $data->akses == 'pihakKetiga' ? '☑' : '');

//     $templateProcessor->setValue('akses', $data->akses);
//     $templateProcessor->setValue('koneksiAplikasi', $data->koneksiAplikasi);
//     $templateProcessor->setValue('mulai', $data->mulai);
//     $templateProcessor->setValue('sampai', $data->sampai);

//     // Decode the JSON arrays
//     $ipSources = json_decode($data->ipSource, true);
//     $ipDestinations = json_decode($data->ipDestination, true);
//     $ports = json_decode($data->port, true);

//     // 4. Add a table for IP and Port data
//     $table = new \PhpOffice\PhpWord\Element\Table();

//     // Add table headers
//     $table->addRow();
//     $table->addCell(2000)->addText('IP Source');
//     $table->addCell(2000)->addText('IP Destination');
//     $table->addCell(2000)->addText('Port');

//     // Add rows for each IP and Port entry
//     foreach ($ipSources as $index => $ipSource) {
//         $ipDestination = $ipDestinations[$index] ?? '';
//         $port = $ports[$index] ?? '';

//         $table->addRow();
//         $table->addCell(2000)->addText($ipSource);
//         $table->addCell(2000)->addText($ipDestination);
//         $table->addCell(2000)->addText($port);
//     }

//     // Add the table to the document
//     $templateProcessor->setComplexValue('ipPortTable', $table);

//     // Radio initiate connection
//     $templateProcessor->setValue('bankBjbCheckbox', $data->initiateConnection == 'Bank bjb' ? '☑' : '');
//     $templateProcessor->setValue('pihakKetigaInitiateCheckbox', $data->initiateConnection == 'Pihak Ketiga' ? '☑' : '');

//     // Radio lampiran
//     $templateProcessor->setValue('waktuPermohonan', $data->waktuPermohonan);
//     $templateProcessor->setValue('topologyCheckbox', $data->lampiran == 'Topology Aplikasi' ? '☑' : '');
//     $templateProcessor->setValue('perjanjianCheckbox', $data->lampiran == 'Perjanjian Kerjasama' ? '☑' : '');
//     $templateProcessor->setValue('brdCheckbox', $data->lampiran == 'BRD' ? '☑' : '');
//     $templateProcessor->setValue('lainnyaCheckbox', $data->lampiran == 'Lainnya' ? '☑' : '');

//     // 5. Generate the Word document
//     $fileName = 'eForm_Permohonan_' . $data->nama . '.docx';
//     $templateProcessor->saveAs($fileName);

//     // 6. Download the file
//     return response()->download($fileName)->deleteFileAfterSend(true);
// }

}
