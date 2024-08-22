<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function select(Request $request, $id = null)
    {
        if ($id) {
            $kegiatan = Kegiatan::findOrFail($id);

            return response()->json([
                'data' => $kegiatan,
            ]);
        }

        $kegiatan = Kegiatan::all();

        return response()->json([
            'data' => $kegiatan,
        ]);
    }
}
