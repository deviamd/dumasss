@extends('admin.home')
@section('isi')

  <div class="container" style="position: relative;">
    
    <form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col mb-3">
            <input class="form-control" type="hidden" name="id" value="{{ $datas->id }}"  id="formFile">
           
            <input class="form-control" type="hidden" name="status" value="belum di proses"  id="formFile">
            <label for="exampleFormControlTextarea1" class="form-label">Tanggapan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="laporan" rows="3" required></textarea>
          </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="formFile" class="form-label">Pilih status</label>
            <select class="form-select" aria-label="Default select example" name="opsi" required>
              
              <option value="sedang di proses">Sedang di proses</option>
              <option value="sudah di proses">Sudah di proses</option>
  
            </select>
          </div>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
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
@endsection