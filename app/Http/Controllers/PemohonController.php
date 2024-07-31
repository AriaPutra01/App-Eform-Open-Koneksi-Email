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

        if ($request->has('word')) {

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
            return response()->download($fileName)->deleteFileAfterSend(true);
            
        } elseif ($request->has('submit')) {
            //validate form
            $request->validate([
                'tujuan' => 'required|string',
                'nama' => 'required|string|max:255',
                'nik' => 'required|numeric|digits:16|unique:pemohons,nik',
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
}
