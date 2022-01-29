<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Hasils;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $hasil = Hasils::with(['kandidats', 'pemilihs'])->find($id);

            if ($id) {
                return Response::success(
                    $hasil,
                    'data hasil berhasil di dapatkan'
                );
            } else {
                return Response::error(
                    null,
                    'data hasil tidak ditemukan',
                    404
                );
            }
        }

        $hasil = Hasils::with(['kandidats', 'pemilihs']);

        return Response::success(
            $hasil,
            'Data hasil berhasil di dapatkan'
        );
    }
}
