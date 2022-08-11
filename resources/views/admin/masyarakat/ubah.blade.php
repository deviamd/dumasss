@extends('admin.home')
@section('isi')

  <div class="container" style="position: relative;">

    <form method="POST" action="{{ route('daftar-admin.update',$datas->id) }}" >
        @csrf
            <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="formGroupExampleInput">nik</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="nik" value="{{ $datas->nik }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ $datas->name }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ $datas->email }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">hp</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="hp" value="{{ $datas->hp }}">
        </div>

        <button style="background-color: #E56717; border: unset" type="submit" class="btn btn-primary mt-4">Ubah</button>
    </form>
  </div>

<!-- Optional JavaScript; choose one of the two! -->






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
