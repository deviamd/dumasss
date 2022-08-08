@extends('admin.home')
@section('search')
<form action="{{ url('admin/index-sudah/') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    @csrf
<div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
        aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{ request('cari') }}">
    <div class="input-group-append">
        <button class="btn" style="background-color: #ff9106;" type="submit">
            <i class="fas fa-search fa-sm text-white"></i>
        </button>
    </div>
</div>
</form>
@endsection
@section("button")
<a href="{{ route('pengaduan.index') }}" class="d-none d-sm-inline-block btn btn-sm text-white  shadow-sm" style="background-color: #ff9106;">
   Belum di proses</a>
@endsection
@section('isi')
<div class="container">
    
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        List Aduan
      </h2>
    <table class="table mt-3" cellpadding="10" cellspace="0">
        <thead class="align-self-center text-center">
            <th>Foto</th>
       
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </thead>
       
        @foreach ($pengaduan as $key) 
        @if ($key->status == "sedang di proses")
        <tbody>
            <tr class="align-self-center text-center" style="border: 1px solid black;">
                <td data-label="images"><img src="/assets/images/bukti/{{ $key->image }}"
                    style="height: 100px; width: 150px;"></td>
       
                <td data-label="Name">{{ $key->name }}</td>
                <td data-label="Tanggal">{{ $key->created_at }}</td>
                <td data-label="Cost">
                    @if($key->status == 'belum di proses')
                    <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                          {{ $key->status }}
                    </span>
                    @elseif ($key->status == 'sedang di proses')
                    <span
                          class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                          {{ $key->status }}
                    </span>
                    @else
                    <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                          {{ $key->status }}
                        </span>
                    @endif    
                </td>
                <td class="text-center justify-content-center align-self-center ">
                    
                    <form method="GET" action="{{ route('index-sudah.show', $key->id )}}">
                        <button class="btn btn-info" >lihat detail</button>
                    </form>
                        
                  
                    
                </td>
            </tr>
            @empty($key)
            <tr>
                <td colspan="7" class="text-center text-gray-400">
                  Data Kosong
                </td>
              </tr>
            @endempty
        </tbody>
        @else
            
        @endif
        
        @endforeach
       

    </table>
</div>
    
@endsection