<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\tanggapan;
use App\Models\User;

class dashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'user' => User::where('level','=', 'USER')->count(),
            'admin' => User::where('level', '=', 'ADMIN')->count(),
            'tanggapan' => tanggapan::count(),
            'pending' => pengaduan::where('status', 'Belum di Proses')->count(),
            'process' => pengaduan::where('status', 'Sedang di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }
}
