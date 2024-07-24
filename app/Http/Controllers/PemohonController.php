<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\View\View;
use App\Exports\ExcelExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpWord\TemplateProcessor;

class PemohonController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        //get all pemohons
        $pemohons = Pemohon::latest()->paginate(10);

        //render view with pemohons
        return view('dashboard', compact('pemohons'));
    }


    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {

        //get all pemohons
        $pemohons = Pemohon::latest()->paginate(10);

        return view('formKoneksi.create', compact('pemohons'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        if ($request->has('exportPdf')) {

            // 1. Fetch the data from your database based on the ID
            // 1. Get the input data
            $inputData = $request->all();


            // 2. Load the Word template
            $templateProcessor = new TemplateProcessor('wordTemplate.docx');



            // 3. Replace placeholders with data
            $templateProcessor->setValue('tujuan', (string) $inputData['tujuan']);
            $templateProcessor->setValue('nama', (string) $inputData['nama']);
            $templateProcessor->setValue('nik', (string) $inputData['nik']);
            $templateProcessor->setValue('email', (string) $inputData['email']);
            $templateProcessor->setValue('divisi', (string) $inputData['divisi']);
            $templateProcessor->setValue('grup', (string) $inputData['grup']);
            // radio kebutuhan
            $templateProcessor->setValue('productionCheckbox', $inputData['kebutuhan'] == 'production' ? '☑' : '');
            $templateProcessor->setValue('developmentCheckbox', $inputData['kebutuhan'] == 'development' ? '☑' : '');
            // radio akses
            $templateProcessor->setValue('internalCheckbox', $inputData['akses'] == 'internal' ? '☑' : '');
            $templateProcessor->setValue('pihakKetigaCheckbox', $inputData['akses'] == 'pihakKetiga' ? '☑' : '');
            $templateProcessor->setValue('akses', (string) $inputData['akses']);
            $templateProcessor->setValue('koneksiAplikasi', (string) $inputData['koneksiAplikasi']);
            $templateProcessor->setValue('mulai', (string) $inputData['mulai']);
            $templateProcessor->setValue('sampai', (string) $inputData['sampai']);
            $templateProcessor->setValue('ipSource', implode(', ', $inputData['ipSource']));
            $templateProcessor->setValue('ipDestination', implode(', ', $inputData['ipDestination']));
            $templateProcessor->setValue('port', implode(', ', $inputData['port']));
            // radio initiate connection
            $templateProcessor->setValue('bankBjbCheckbox', $inputData['initiateConnection'] == 'Bank bjb' ? '☑' : '');
            $templateProcessor->setValue('pihakKetigaInitiateCheckbox', $inputData['initiateConnection'] == 'Pihak Ketiga' ? '☑' : '');
            // radio lampiran
            if (isset($inputData['waktuPermohonan'])) {
                $templateProcessor->setValue('waktuPermohonan', (string) $inputData['waktuPermohonan']);
            } else {
                $templateProcessor->setValue('waktuPermohonan', '');
            }
            $templateProcessor->setValue('topologyCheckbox', $inputData['lampiran'] == 'Topology Aplikasi' ? '☑' : '');
            $templateProcessor->setValue('perjanjianCheckbox', $inputData['lampiran'] == 'Perjanjian Kerjasama' ? '☑' : '');
            $templateProcessor->setValue('brdCheckbox', $inputData['lampiran'] == 'BRD' ? '☑' : '');
            $templateProcessor->setValue('lainnyaCheckbox', $inputData['lampiran'] == 'Lainnya' ? '☑' : '');

            // 4. Generate the Word document
            $fileName = 'eForm Permohonan ' . $inputData['nama'] . '.docx';
            $templateProcessor->saveAs($fileName);

            // 5. Download the file
            return response()->download($fileName);
        } elseif ($request->has('submit')) {
            //validate form
            $request->validate([
                'tujuan' => 'required|string',
                'nama' => 'required|string|max:255',
                'nik' => 'required|numeric|min:16|unique:pemohons,nik',
                'email' => 'required|email|unique:pemohons,email',
                'divisi' => 'required|string|max:255',
                'grup' => 'required|string|max:255',
                'tujuan' => 'required|string',
                'kebutuhan' => 'required|string',
                'akses' => 'required|string',
                'koneksiAplikasi' => 'required|string|max:255',
                'mulai' => 'required|date',
                'sampai' => 'required|date',
                'ipSource' => 'required|array',
                'ipDestination' => 'required|array',
                'port' => 'required|array',
                'initiateConnection' => 'required|string',
                'lampiran' => 'required|string',
            ]);

            // Get the array data from the request
            $ipSource = $request->input('ipSource');
            $ipDestination = $request->input('ipDestination');
            $port = $request->input('port');

            Pemohon::create([
                'tujuan' => $request->tujuan,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'divisi' => $request->divisi,
                'grup' => $request->grup,
                'kebutuhan' => $request->kebutuhan,
                'akses' => $request->akses,
                'koneksiAplikasi' => $request->koneksiAplikasi,
                'mulai' => $request->mulai,
                'sampai' => $request->sampai,
                'ipSource' => json_encode($ipSource),
                'ipDestination' => json_encode($ipDestination),
                'port' => json_encode($port),
                'initiateConnection' => $request->initiateConnection,
                'lampiran' => $request->lampiran,
            ]);

            //redirect to index
            return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }

    public function success($id)
    {

        $pdf = pemohon::findOrFail($id);
        return view('formKoneksi/success', compact('pdf'));
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get pemohon by ID
        $pemohon = Pemohon::findOrFail($id);

        //render view with pemohon
        return view('formKoneksi.show', compact('pemohon'));
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $pemohon = Pemohon::findOrFail($id);

        //delete product
        $pemohon->delete();

        //redirect to index
        return redirect()->route('formKoneksi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * export excel
     *
     * @return void
     */
    public function export()
    {
        return Excel::download(new ExcelExport, 'Data-Pemohon-Koneksi.xlsx');
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
    //     $fileName = 'formKoneksi_Permohonan_' . $data->nama . '.docx';
    //     $templateProcessor->saveAs($fileName);

    //     // 6. Download the file
    //     return response()->download($fileName)->deleteFileAfterSend(true);
    // }

}
