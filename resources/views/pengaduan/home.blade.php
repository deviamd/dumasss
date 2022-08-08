<?php
$tanggal = date("Y-m-d");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{ margin:0; } canvas{ display: block; vertical-align: bottom; }
        /* ---- particles.js container ---- */
        #particles-js{ position:absolute; width: 100%; height: 100%; background-color: #ffffff; background-image: url(""); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%; } /* ---- stats.js ---- */ .count-particles{ background: #000022; position: absolute; top: 48px; left: 0; width: 80px; color: #0078AA; font-size: .8em; text-align: left; text-indent: 4px; line-height: 14px; padding-bottom: 2px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; } .js-count-particles{ font-size: 1.1em; } #stats, .count-particles{ -webkit-user-select: none; margin-top: 5px; margin-left: 5px; } #stats{ border-radius: 3px 3px 0 0; overflow: hidden; } .count-particles{ border-radius: 0 0 3px 3px; }
      </style>
    <title>Dumas | Form Pengaduan</title>
    <style>
      nav {
        /* background-image: linear-gradient(90deg,#814096, #f83292); */
        color: white;
      }
    </style>
  </head>
  <body>
     @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
          <a class="navbar-brand" href="#">Dumas</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selamat Datang,{{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/">Kembali</a></li>

                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div id="particles-js">

    </div>
      <div class="container" style="position: relative;">
        <form action="{{ url('pengaduan/home') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">

                <input class="form-control" type="hidden" name="id" value="{{ Auth::user()->id }}"  id="formFile">
                <input class="form-control" type="hidden" name="name" value="{{ Auth::user()->name }}"  id="formFile">
                <input class="form-control" type="hidden" name="tgl" value="{{ $tanggal }}"  id="formFile">
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Nik</label>
                    <input class="form-control" type="text" disabled name="nik" value="{{ Auth::user()->nik }}"  id="formFile">
                  </div>
                 <div class="col-md-6">
                  <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                  <input class="form-control"  type="text" disabled  value="{{ Auth::user()->name }}"  id="formFile">
                 </div>
                </div>

               <div class="row">
                <div class="col-md-6">
                  <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                  <input class="form-control" type="text" disabled name="nik" value="{{ Auth::user()->email }}"  id="formFile">
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlTextarea1" class="form-label">No Handphone</label>
                  <input class="form-control" type="text" disabled name="hp" value="{{ Auth::user()->hp }}"  id="formFile">
                  <input class="form-control" type="hidden" name="status" value="belum di proses"  id="formFile">
                </div>


               </div>
                <div class="row">
                  <div class="col">
                    <label for="exampleFormControlTextarea1" class="form-label">Keluhan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="pengaduan" rows="3"></textarea>
                  </div>
                </div>


        </div>
        <div class="row">
          <div class="col">

              <label for="formFile" class="form-label">Foto Bukti</label>
              <input class="form-control" type="file" name="image" id="image">
              <img id="preview-image-before-upload" src="" alt="" style="width: 250px" class="mt-3">

          </div>

        </div>
        <button type="submit" class="btn btn-primary mt-4">Kirim</button>
        <button type="reset" class="btn btn-danger mt-4">Reset Pengaduan</button>
    </form>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function (e) {


   $('#image').change(function(){

    let reader = new FileReader();

    reader.onload = (e) => {

      $('#preview-image-before-upload').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]);

   });

});

</script>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
particlesJS("particles-js",
{"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},
"color":{"value":"#000000"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},
"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},
"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},
"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},
"line_linked":{"enable":true,"distance":150,"color":"#000000","opacity":0.4,"width":1},
"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out",
"bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},
"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},
"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
