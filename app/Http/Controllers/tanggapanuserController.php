<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;
use Auth;

class tanggapanuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = DB::table('pengaduans')->where('UserID', '=',  Auth::user()->id)->get();

        return view('pengaduan.tanggapanuser',[
            'datas' => $datas,
        ]);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = pengaduan::with([
            'details','user','tanggapans'
       ])->findOrFail($id);
       $datas = DB::table('pengaduans')
       ->where('id', '=', $id)
       ->get();
       $pengaduan =  DB::table('tanggapans')
       ->where('pengaduanID', '=', $id)
       ->groupBy('update')
       ->get();

       return view('pengaduan.detail', compact('pengaduan'), [
           'pengaduan' => $pengaduan,
           'datas' => $datas,
           'item' => $item,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduan $pengaduan)
    {
        //
    }
}
