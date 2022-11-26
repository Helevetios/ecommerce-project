@extends('layouts.layout')

@section('title','Home')

@section('link')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
    aria-expanded="false">
    Productos
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($categories as $category)
    <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{$category->name}}</a></li>
    @endforeach
  </ul>
</li>
@endsection

@section('content')
<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="{{ asset('storage/static/index_image1.jpg') }}" class="d-block mx-lg-auto img-fluid" width="600"
        height="400" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Lorem ipsum dolor sit amet.</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, esse!</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Cuidado Personal</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div style="padding-bottom: 50px">
          <img src="{{ asset('storage/static/index_image2.jpg') }}" width="300px" height="200px">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Zapatos</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div style="padding-bottom: 50px">
          <img src="{{ asset('storage/static/index_image3.jpg') }}" width="300px" height="200px">
        </div>
      </div>
    </div>
  </div>
  <h1 class="text-center" style="padding: 60px;">Más Productos</h1>

  <div class="row">
    <div class="col-md-4">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Ropa</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div style="padding-bottom: 50px">
          <img src="{{ asset('storage/static/index_image4.jpg') }}" width="200px" height="100px">
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Fiesta</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div style="padding-bottom: 50px">
          <img src="{{ asset('storage/static/index_image5.jpg') }}" width="200px" height="100px">
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Mascotas</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div style="padding-bottom: 50px">
          <img src="{{ asset('storage/static/index_image6.jpg') }}" width="200px" height="100px">
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="text-center text-lg-start bg-dark text-muted">

  <section class="d-flex justify-content-center justify-content-lg-between p-4" style="background-color: rgba(0, 0, 0, 0.05);">

  </section>
  <section class="">
    <div class="container text-center text-md-start mt-8">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Mis Peques</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam fuga ratione ullam officia reiciendis et
            aut illo distinctio fugit quae velit labore ea porro dolorem soluta maiores facere placeat, exercitationem
            voluptates modi! Adipisci, officia rerum.</p>
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

  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright
  </div>

</footer>
@endsection