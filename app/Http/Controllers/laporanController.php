<?php


namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\pengaduanadmin;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class laporanController extends Controller
{
    public function index(Request $request)
    {
        $tgl = $request->tgl;
        $datas = DB::table('pengaduans')->get();
        $data = DB::table('tanggapans')->get();
        $pengaduan =  DB::table('users')
        ->where('pengaduans.created_at', '=', $tgl)
        ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
        ->orderBy('pengaduans.created_at','ASC')
        ->get();
      
        return view('admin.laporan.index', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'data' => $data,
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        ]);
        // $pdf = PDF::loadview('admin.laporan.pdf', compact('pengaduan')) ;
        // return $pdf->download('laporan.pdf');
        return view('admin.laporan.pdf', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'data' => $data,
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        ]);
       
    }
    public function pdf(Request $request ){
         $tgl = $request->tgl;
    $success = pengaduan::where('status', 'sudah di proses')->count();
    $pending = pengaduan::where('status', 'belum di Proses')->count();
    $pengaduan = pengaduan::where('created_at', '=', $tgl)->get();
   
    $pdf = PDF::loadview('admin.laporan.pdf', compact('pengaduan','pending','success')) ;
    return $pdf->download('laporan.pdf');
     

    }
}
