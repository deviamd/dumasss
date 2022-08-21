<?php

namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\pengaduanadmin;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengaduanadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas = DB::table('pengaduans')->get();
        $pengaduan =  DB::table('users')
        ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
        ->orderBy('pengaduans.created_at','ASC')
        ->where('users.name','like',"%".$cari."%")
        ->get();
        return view('admin.pengaduan.index', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id )
    {
        // $datas = DB::table('pengaduans')->get();
        $item = pengaduan::with([
             'details','user'
        ])->findOrFail($id);
        $datas = DB::table('pengaduans')
        ->where('id', '=', $id)
        ->get();
        $pengaduan =  DB::table('tanggapans')
        ->where('pengaduanID', '=', $id)

        ->get();
        
        return view('admin.pengaduan.detail', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'item' => $item,
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduanadmin $pengaduanadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduanadmin $pengaduanadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduanadmin $pengaduanadmin)
    {
        //
    }
}
