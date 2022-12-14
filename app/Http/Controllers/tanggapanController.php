<?php

namespace App\Http\Controllers;

use App\Models\tanggapan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.tanggapan.index',[
        //   'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        //   'success' => pengaduan::where('status', 'sudah di proses')->count(),
        // ]);
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
        DB::table('pengaduans')->where('id', $request->id)->update([
            'status'=> $request->opsi,
            'update'=> $request->tgl,
            'created_at'=> $request->tgl,
        ]);
        $datas = DB::table('tanggapans')->get();

        DB::table('tanggapans')->where('pengaduanID', $request->id)->update([

            'tanggapan' => $request->laporan,
            'update'=> $request->tgl
        ]);

        $model = new tanggapan;
        $model->pengaduanID = $request->id;
        $model->tanggapan = $request->laporan;
        $model->update = $request->tgl;
        $model->save();









        toastr()->success('Berhasil di tanggapi!', 'Selamat');
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
        $tanggapan =  DB::table('tanggapans')->get();
        $datas = pengaduan::with([
            'details','tanggapans'
        ])->findorFail($id);
        return view('admin.tanggapan.index', compact('datas','tanggapan'),[
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $datas = tanggapan::find($id);
        return view('admin.tanggapan.index', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $model = tanggapan::find($id);
       // $model->tanggapan = $request->laporan;
       // $model->update = $request->tgl;



       //$model->save();
       DB::table('pengaduans')->where('id', $request->id)->update([
        'status'=> $request->opsi,
        'update'=> $request->tgl,
        'created_at'=> $request->tgl,
    ]);
    DB::table('tanggapans')->where('pengaduanID', $request->id)->update([

        'tanggapan' => $request->laporan,
        'update'=> $request->tgl
    ]);
    toastr()->success('Berhasil di tanggapi!', 'Selamat');
        return redirect('admin/index-sudah');
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
