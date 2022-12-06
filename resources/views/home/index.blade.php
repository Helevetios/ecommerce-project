@extends('layouts.layout')

@section('title','Home')

@section('link')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
    aria-expanded="false">
    Productos
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-aos="slide-up">
    @foreach ($categories as $category)
    <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{$category->name}}
      </a>
    </li>
    @endforeach
  </ul>
</li>
@endsection

@section('content')

<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6" data-aos="zoom-in-up">
      <img
        src="https://media.istockphoto.com/id/913316472/es/vector/concepto-de-compras-en-l%C3%ADnea-comprar-ordenador-port%C3%A1til-abierto-con-pantalla-plano-de-estilo.jpg?s=612x612&w=0&k=20&c=8IYlV0-5paF2zDb4t9ulQJw4t3aweTrXOBu0lCvTNHc="
        class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="300" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Tienda Mis Peques</h1>
      <p class="lead">Encuentra todo lo que quieras para ese nuevo estilo de vida, look o esa persona especial.</p>
    </div>
  </div>
</div>

<div class="container">
  <h1 class="fw-bold text-center" style="padding-bottom: 40px;" data-aos="slide-up">Descubre</h1>
  <hr>
  <div class="row">
    <div class="col-md-6" data-aos="zoom-in">
      <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Belleza</h2>
          <p class="lead">Lo mejor para tu persona</p>
        </div>
        <div style="padding-bottom: 50px">
          <a href="/home/4">
            <img src="https://t4.ftcdn.net/jpg/02/24/31/27/240_F_224312774_YMAQq02RmHcvfwAH3VhwZDr28SLTE8tc.jpg"
            width="300px" height="200px">
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6" data-aos="zoom-in">
      <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Cocina</h2>
          <p class="lead">Articulos para tu cocina</p>
        </div>
        <div style="padding-bottom: 50px">
          <a href="/home/5">
            <img src="https://t4.ftcdn.net/jpg/00/77/82/13/240_F_77821372_IVVb3oJbkLPkpXhXF7v2EYghi89VaqRi.jpg"
            width="300px" height="200px">
          </a>
        </div>
      </div>
    </div>

  </div>

  <h1 class="text-center fw-bold" style="padding-bottom: 40px; padding-top: 40px;" data-aos="slide-up">Categorias</h1>

  <hr>

  <div class="row">
    <div class="col-md-4" data-aos="zoom-in">
      <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Papeleria</h2>
        </div>
        <div style="padding-bottom: 50px">
          <a href="/home/11">
            <img
            src="https://media.istockphoto.com/id/485725200/es/foto/accesorios-escolares-y-de-oficina-en-fondo-de-madera.jpg?s=612x612&w=0&k=20&c=HV0Wd3tbk42-qsGVCxFvhoJKr8KDmm-ihE1CrEB2oHo="
            width="200px" height="100px">
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4" data-aos="zoom-in">
      <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h5 class="display-5">Juguetería</h5>
        </div>
        <div style="padding-bottom: 50px">
          <a href="/home/9">
            <img
              src="https://media.istockphoto.com/id/1322274556/es/foto/colecci%C3%B3n-de-diferentes-juguetes-sobre-mesa-de-madera.jpg?s=612x612&w=0&k=20&c=YRmLVRP14HSIBdw7SZcSzvhkoWlT827dGcC3MpS2TIM="
              width="200px" height="100px">
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4" data-aos="zoom-in">
      <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Mascotas</h2>
        </div>
        <div style="padding-bottom: 50px">
          <a href="/home/10">
            <img
              src="https://media.istockphoto.com/id/1310331783/es/foto/amigos-esponjosos-un-perro-corgi-y-un-gato-tabby-sentarse-juntos-en-un-prado-de-primavera.jpg?s=612x612&w=0&k=20&c=rYr5ibc7Swp3Hdg83lungT_oyVHh6Qk0EJSD0wizrBc="
              width="200px" height="100px">
          </a>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>

<hr>

<footer class="text-center text-lg-start text-muted" data-aos="zoom-in">

  <section class="d-flex justify-content-center justify-content-lg-between p-4"
    style="background-color: rgba(255, 255, 255, 0.05);">

  </section>
  <section class="">
    <div class="container text-center text-md-start mt-8">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Mis Peques</h6>
          <p>Tienda mis Peques: Es una tienda internacional </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Contacto
          </h6>
          <p>Col. Mexico</p>
          <p>tienda@correo.com</p>
          <p>+ 52 234 567 8890</p>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <div class="text-center p-4">
    © 2022 Copyright
  </div>

</footer>
@endsection