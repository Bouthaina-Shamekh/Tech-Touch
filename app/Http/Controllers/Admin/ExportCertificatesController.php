<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CertificatesImport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use App\Mail\CertificateDelivered;

class ExportCertificatesController extends Controller
{
    public function index()
    {
        return view('dashboard.exportCertificates.index');
    }

    public function store(Request $request)
    {
        // Excel import
        $file = $request->file('file');
        $import = new CertificatesImport();
        Excel::import($import, $file);

        $data = $import->data;
        $names = [];
        foreach ($data as $row) {
            $names[] = $row['name'];
        }
        $paths = $this->generateCertificates($names);

        // send email
        foreach ($data as $row) {
            $email = $row['email'];
            $name = $row['name'];
            $path = $paths[$name];
            $this->sendEmail($email, $name, $path);
        }


        return redirect()->back()->with('success', 'All good!');
    }


    public function generateCertificates(array $names)
    {
        $today = Carbon::today()->format('Y-m-d');
        $basePath = "certificates/$today/";

        // تأكد من وجود المجلد
        Storage::makeDirectory($basePath);

        $paths = [];

        foreach ($names as $name) {
            $fileName = Str::slug($name, '_') . '.pdf';
            $fullPath = $basePath . $fileName;


            $config = [
                'format' => 'A4-L',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
                'default_font' => 'amiri',
                'isRemoteEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'autoScriptToLang' => true,
                'autoLangToFont' => true,
                'baseScript' => 1,
                'autoVietnamese' => true,
                'autoArabic' => true,
                'tempDir' => storage_path('app/temp'),
                'dpi' => 96,
                'img_dpi' => 96,
            ];

            $pdf = PDF::loadView('dashboard.exportCertificates.certificate', [
                'name' => $name,
                'date' => now()->format('Y/m/d'),
            ], [], $config);


            $pdfContent = $pdf->output();

            // احفظ الملف في storage/app/certificates/yyyy-mm-dd
            Storage::put($fullPath, $pdfContent);

            // خزّن المسار الكامل في المصفوفة
            $paths[$name] = storage_path('app/' . $fullPath);
        }

        return $paths; // استخدمهم لاحقاً للإيميل مثلاً
    }

    public function sendEmail($email, $name, $path)
    {
        Mail::to($email)->send(new CertificateDelivered($name, $path));
    }
}
