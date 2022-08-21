<?php

namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class daftaradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  DB::table('users')->where('level', '=', 'ADMIN')->where('name','like',"%".$cari."%")->get();

        return view('admin.admin.index', [
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
        return view('admin.admin.create',[
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new User;
        $password = $request->password;
        $encrypted_password = bcrypt($password);
        $model->nik = $request->nik;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->hp = $request->hp;
        $model->level = $request->level;
        $model->password = $encrypted_password;

        $model->save();
        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('admin/daftar-admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduanadmin $pengaduanadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $datas = User::find($id);
        return view('admin.admin.ubah', compact('datas'),[
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::find($id);
        $model->nik = $request->nik;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->hp = $request->hp;
        $model->level = $request->opsi;


        $model->save();
        toastr()->success('Berhasil di terupdate!', 'Sukses');
        return redirect('admin/daftar-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kantin = User::find($id);
        $kantin->delete();
        toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('admin/daftar-admin');
    }
}
