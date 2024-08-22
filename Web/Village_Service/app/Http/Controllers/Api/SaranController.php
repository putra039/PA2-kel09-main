<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaranController extends Controller
{
    public function select(Request $request, $id = null)
    {
        if ($id) {
            $saran = Saran::findOrFail($id);

            // Check if the authenticated user owns the saran record
            if ($saran->user_id !== Auth::id()) {
                return response()->json([
                    'error' => 'unauthorized',
                    'message' => 'You are not authorized to access this saran.',
                ], 403);
            }

            return response()->json([
                'data' => $saran,
            ]);
        }

        $saran = Saran::where('user_id', Auth::id())->get();

        return response()->json([
            'data' => $saran,
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'saran' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'validation_failed',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $user = Auth::user();

        $saran = new Saran();
        $saran->user_id = $user->id;
        $saran->user_name = $user->nama;
        $saran->saran = $request->saran;
        $saran->save();

        return response()->json([
            'message' => 'Saran created successfully.',
            'data' => $saran,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $saran = Saran::findOrFail($id);

        // Check if the authenticated user owns the saran record
        if ($saran->user_id !== Auth::id()) {
            return response()->json([
                'error' => 'unauthorized',
                'message' => 'You are not authorized to update this saran.',
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'saran' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'validation_failed',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $saran->saran = $request->saran;
        $saran->save();

        return response()->json([
            'message' => 'Saran updated successfully.',
            'data' => $saran,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $saran = Saran::findOrFail($id);

        // Check if the authenticated user owns the saran record
        if ($saran->user_id !== Auth::id()) {
            return response()->json([
                'error' => 'unauthorized',
                'message' => 'You are not authorized to delete this saran.',
            ], 403);
        }

        $saran->delete();

        return response()->json([
            'message' => 'Saran deleted successfully.',
        ]);
    }
}
