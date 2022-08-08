@extends('layouts.login')
@section('title')
    Dumas | Login
@endsection
@section('isi')
<form method="POST" class="form-horizontal mt-3" action="{{ route('login') }}" >
    @csrf
    {{-- <img src="{{ asset('assets/avatar.svg') }}"> --}}
    <h2 class="title">Welcome</h2>
       <div class="input-div one">
          <div class="i">
                  <i class="fas fa-user"></i>
          </div>
          <div class="div">
                  <h5>Email</h5>
                  <input class="input form-control @error('email') is-invalid @enderror" name="email" type="email" required=""  value="{{ old('email') }}">
                  
          </div>
       </div>
       <div class="input-div pass">
          <div class="i"> 
               <i class="fas fa-lock"></i>
          </div>
          <div class="div">
               <h5>Password</h5>
               <input class="input form-control @error('password') is-invalid @enderror" name="password" type="password" required="">
                            
       </div>
    </div>
    <a href="#">Forgot Password?</a>
    <button type="submit" class="btn" value="Login">Login</button>
    <a href="{{ route('register') }}" class="a">Create an account</a>
    <a href="/" class="a">Back to Home</a>
</form>
@endsection