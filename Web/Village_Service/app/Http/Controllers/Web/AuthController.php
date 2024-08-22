<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Contracts\Role;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function do_login(Request $request)
    {
        $messages = [
            'kk.required' => 'kk harus diisi',
            'kk.min' => 'kk harus 16 angka',
            'kk.max' => 'kk harus 16 angka',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ];
        $validator = Validator::make($request->all(), [
            'kk' => 'required|min:16|max:16',
            'password' => 'required|min:8',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kk')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kk'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }

        $user = User::where('kk', $request->kk)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if (Auth::attempt(['kk' => $request->kk, 'password' => $request->password], $request->remember)) {
                    return response()->json([
                        'alert' => 'valid',
                        'message' => 'Berhasil Login',
                    ]);
                    return redirect('dashboard');
                }
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, Password Salah.',
                ]);
            }
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, kk Salah atau belum terdaftar.',
            ]);
        }
    }

    public function do_logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
