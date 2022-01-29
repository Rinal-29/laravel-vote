<?php

namespace App\Http\Controllers;

use App\Models\Hasils;
use App\Models\Kandidats;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HasilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $hasils = Hasils::find($id);


        if (request()->ajax()) {
            $query = Hasils::where('kandidat_id', $hasils->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <form class="inline-block" action="#" method="POST">
                    <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                        Hapus
                    </button>
                    ' . method_field('delete') . csrf_field() . '
                    </form>';
                })
                ->editColumn('nama_kandidat', function ($item) {
                    $nama_kandidat = Kandidats::find($item->kandidat_id);
                    return '<div class="content-center"> ' . $nama_kandidat->nama_kandidat . '  </div>';
                })
                ->rawColumns(['action', 'nama_kandidat'])
                ->make();
        }

        return view('pages.dashboard.hasils.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
