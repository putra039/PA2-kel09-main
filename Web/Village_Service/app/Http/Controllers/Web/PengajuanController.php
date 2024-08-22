<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $pengajuan = Pengajuan::all();
        return view('web.Pengajuan.pengajuan', compact('pengajuan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    public function edit(Pengajuan $pengajuan)
    {
        return view('web.Pengajuan.update', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        dd($request->all());
        $messages = [
            'jenis_pengajuan.required' => 'Jenis Pengajuan harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'file.required' => 'File harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'jenis_pengajuan' => 'required',
            'deskripsi' => 'required',
            'file' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $pengajuan->jenis_pengajuan = $request->input('jenis_pengajuan');
        $pengajuan->deskripsi = $request->input('deskripsi');
        $pengajuan->file = $request->file;
        $pengajuan->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Pengajuan updated successfully',
        ]);

        return redirect()->route('pengajuan.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Pengajuan deleted successfully',
        ]);
    }
    public function downloadFile($file)
    {
        $pathToFile = public_path('/storage' . $file);

        if (file_exists($pathToFile)) {
            return response()->download($pathToFile);
        } else {
            abort(404);
        }
    }
}
