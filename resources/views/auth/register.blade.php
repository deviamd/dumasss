@extends('layouts.login')
@section('title')
    Dumas | Register
@endsection
@section('isi')
<form method="POST" class="form-horizontal mt-3" action="{{ route('register') }}" >
    @csrf


       <div class="input-div one">
          <div class="i">
                  <i class="fas fa-user"></i>
          </div>
          <div class="div">
                  <h5>NIK</h5>
                  <input class="input form-control @error('email') is-invalid @enderror"  class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  type = "number"
                  maxlength = "16">

          </div>
       </div>
       <div class="input-div second">
        <div class="i">
                <i class="fas fa-user"></i>
        </div>
        <div class="div">
                <h5>Name</h5>
                <input id="name" type="text" class="input form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        </div>
     </div>
     <div class="input-div second">
        <div class="i">
                <i class="fas fa-user"></i>
        </div>
        <div class="div">
                <h5>email</h5>
                <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        </div>
     </div>
     <div class="input-div one">
        <div class="i">
                <i class="fas fa-user"></i>
        </div>
        <div class="div">
                <h5>No hp</h5>
                <input id="hp"  class="input form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" required autocomplete="nik" autofocus oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "number"
                maxlength = "13" >

        </div>
     </div>
     <div class="input-div one">
        <div class="i">
                <i class="fas fa-user"></i>
        </div>
        <div class="div">
                <h5>Password</h5>
                <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                <input id="level" type="hidden" name="level" value="USER" >
        </div>
     </div>
       <div class="input-div pass">
          <div class="i">
               <i class="fas fa-lock"></i>
          </div>
          <div class="div">
               <h5>Confirm Password</h5>
               <input class="input form-control"  type="password" name="password_confirmation" required autocomplete="new-password">

       </div>
    </div>

    <button type="submit" class="btn" value="Login">Daftar</button>
    <a href="{{ route('login') }}" class="a">Already have account?</a>
    <a href="/" class="a">Back to Home</a>
</form>
@endsection
