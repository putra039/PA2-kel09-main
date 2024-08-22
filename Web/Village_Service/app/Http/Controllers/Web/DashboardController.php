<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->take(7)->get();
        // $users = User::selectRaw('usia, count(*) as total')
        // ->groupBy('usia')
        // ->pluck('total', 'usia')
        // ->toArray();
        $users = User::selectRaw('CASE
                WHEN usia BETWEEN 1 AND 10 THEN "Anak-anak"
                WHEN usia BETWEEN 11 AND 17 THEN "Remaja"
                WHEN usia BETWEEN 18 AND 30 THEN "Dewasa"
                WHEN usia BETWEEN 31 AND 50 THEN "Orang Tua"
                ELSE "Lansia"
            END AS kategori_usia, COUNT(*) as total')
        ->groupBy('kategori_usia')
        ->pluck('total', 'kategori_usia')
        ->toArray();
        $total_user = User::count();
        $totalMale = User::where('jenis_kelamin', 'Laki-laki')->count();
        $totalFemale = User::where('jenis_kelamin', 'Perempuan')->count();

        return view('web.dashboard', compact('pengumuman', 'users', 'total_user', 'totalMale', 'totalFemale'));
    }
}
