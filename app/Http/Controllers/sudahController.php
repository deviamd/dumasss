<?php

namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\pengaduanadmin;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class sudahController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas = DB::table('pengaduans')->get();
        $pengaduan =  DB::table('users')
        ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
        ->orderBy('pengaduans.created_at','ASC')
        ->where('users.name','like',"%".$cari."%")
        ->get();
        return view('admin.pengaduan.indexsudah', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
       
    }
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
        DB::table('tanggapans')->where('pengaduanID', $request->id)->update([
           
            'tanggapan' => $request->laporan,
        ]);
        return redirect('admin/pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $item = pengaduan::with([
            'details','user'
       ])->findOrFail($id);
       $datas = DB::table('pengaduans')
       ->where('id', '=', $id)
       ->get();
       $pengaduan = tanggapan::where('pengaduanID', $id)->first();
       return view('admin.pengaduan.detailsudah', compact('datas','item','pengaduan'),[
        'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = tanggapan::find($id);
        return view('admin.tanggapan.indexsudah', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tanggapan $tanggapan)
    {
        //
    }
}
