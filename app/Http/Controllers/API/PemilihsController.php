<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Pemilihs;
use Illuminate\Http\Request;

class PemilihsController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $pemilih = Pemilihs::all();

            if ($id) {
                return Response::success(
                    $pemilih,
                    'data pemilih berhasil di dapatkan'
                );
            } else {
                return Response::error(
                    null,
                    'data pemilih tidak ditemukan',
                    404
                );
            }
        }

        $pemilih = Pemilihs::all();

        return Response::success(
            $pemilih,
            'Data pemilih berhasil di dapatkan'
        );
    }
}
