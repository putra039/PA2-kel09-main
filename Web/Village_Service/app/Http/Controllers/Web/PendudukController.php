<?php

namespace App\Http\Controllers\Web;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $penduduk = User::all();
        return view('web.Penduduk.penduduk', compact('penduduk'));
    }

    public function profile(){
        return view('web.Penduduk.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.Penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            $messages = [
                'nik.required' => 'NIK harus diisi.',
                'nik.min' => 'NIK harus terdiri dari 16 angka.',
                'nik.max' => 'NIK harus terdiri dari 16 angka.',
                'nama.required' => 'Nama harus diisi.',
                'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
                'no_telp.required' => 'Nomor telepon harus diisi.',
                'no_telp.min' => 'Nomor telepon harus terdiri dari minimal 10 digit.',
                'no_telp.max' => 'Nomor telepon harus terdiri dari maksimal 13 digit.',
                'tempat_lahir.required' => 'Tempat lahir harus diisi.',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
                'tanggal_lahir.before' => 'Tanggal lahir tidak boleh lebih dari tanggal saat ini.',
                'usia.required' => 'Usia harus diisi.',
                'usia.min' => 'Usia minimal adalah 17 tahun.',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
                'jenis_kelamin.in' => 'Jenis kelamin hanya boleh "laki-laki" atau "perempuan".',
                'pekerjaan.required' => 'Pekerjaan harus diisi.',
                'agama.required' => 'Agama harus diisi.',
                'agama.regex' => 'Agama tidak boleh mengandung angka dan simbol.',
                'kk.required' => 'Nomor Kartu Keluarga (KK) harus diisi.',
                'kk.min' => 'Nomor Kartu Keluarga (KK) harus terdiri dari 16 karakter.',
                'kk.max' => 'Nomor Kartu Keluarga (KK) harus terdiri dari 16 karakter.',
                'alamat.required' => 'Alamat harus diisi.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal adalah 8 karakter',
            ];

            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/u',
                'nik' => 'required|string|min:16|max:16',
                'no_telp' => 'required|string|min:10|max:13',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date|before:today',
                'usia' => 'required|numeric|min:17',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'pekerjaan' => 'required',
                'agama' => 'required|string|regex:/^[a-zA-Z\s]+$/u',
                'kk' => 'required|string|min:16|max:16',
                'alamat' => 'required',
                'password' => 'required|min:8',
            ], $messages);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }

            $user = new User();
            $user->nama = $request->input('nama');
            $user->nik = $request->input('nik');
            $user->no_telp = $request->input('no_telp');
            $user->tempat_lahir = $request->input('tempat_lahir');
            $user->tanggal_lahir = $request->input('tanggal_lahir');
            $user->usia = $request->input('usia');
            $user->jenis_kelamin = $request->input('jenis_kelamin');
            $user->pekerjaan = $request->input('pekerjaan');
            $user->agama = $request->input('agama');
            $user->kk = $request->input('kk');
            $user->alamat = $request->input('alamat');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response()->json([
                'status' => 'success', // Use 'success' status for successful submission
            ]);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(User $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(User $penduduk)
    {
        return view('web.Penduduk.update', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $penduduk)
    {
        $messages = [
            'nik.required' => 'NIK harus diisi.',
            'nik.min' => 'NIK harus terdiri dari 16 angka.',
            'nik.max' => 'NIK harus terdiri dari 16 angka.',
            'nama.required' => 'Nama harus diisi.',
            'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'no_telp.min' => 'Nomor telepon harus terdiri dari minimal 10 digit.',
            'no_telp.max' => 'Nomor telepon harus terdiri dari maksimal 13 digit.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.before' => 'Tanggal lahir tidak boleh lebih dari tanggal saat ini.',
            'usia.required' => 'Usia harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin hanya boleh "laki-laki" atau "perempuan".',
            'pekerjaan.required' => 'Pekerjaan harus diisi.',
            'agama.required' => 'Agama harus diisi.',
            'agama.regex' => 'Agama tidak boleh mengandung angka dan simbol.',
            'kk.required' => 'Nomor Kartu Keluarga (KK) harus diisi.',
            'kk.min' => 'Nomor Kartu Keluarga (KK) harus terdiri dari 16 karakter.',
            'kk.max' => 'Nomor Kartu Keluarga (KK) harus terdiri dari 16 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|min:16|max:16',
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/u',
            'no_telp' => 'required|string|min:10|max:13',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date|before:today',
            'usia' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'required',
            'agama' => 'required|string|regex:/^[a-zA-Z\s]+$/u',
            'kk' => 'required|string|min:16|max:16',
            'alamat' => 'required',
        ], $messages);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ]);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $penduduk->nama = $request->input('nama');
        $penduduk->nik = $request->input('nik');
        $penduduk->no_telp = $request->input('no_telp');
        $penduduk->tempat_lahir = $request->input('tempat_lahir');
        $penduduk->tanggal_lahir = $request->input('tanggal_lahir');
        $penduduk->usia = $request->input('usia');
        $penduduk->jenis_kelamin = $request->input('jenis_kelamin');
        $penduduk->pekerjaan = $request->input('pekerjaan');
        $penduduk->agama = $request->input('agama');
        $penduduk->kk = $request->input('kk');
        $penduduk->alamat = $request->input('alamat');
        $penduduk->update();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Penduduk updated successfully.',
            ]);
        } else {
            return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $penduduk)
    {
        $penduduk->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Penduduk deleted successfully',
        ]);
    }
}
