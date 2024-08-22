<?php

namespace App\Http\Controllers\web;

use PDF;
use App\Models\User;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function generateUserPdf()
    {

        $user = User::all();
        $view = view('web.Pdf.penduduk', compact('user'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('user.pdf');
    }

    public function generatePerangkatPdf()
    {
        $perangkat = PerangkatDesa::all();

        $view = view('web.pdf.perangkat', compact('perangkat'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('perangkat.pdf');
    }

    public function generatePengumumanPdf()
    {
        $pengumuman = Pengumuman::all();
        $view = view('web.pdf.pengumuman', compact('pengumuman'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('pengumuman.pdf');
    }

}
