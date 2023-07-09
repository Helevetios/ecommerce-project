@extends('layouts.layout')

@section('title', 'Home')

@section('link')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Productos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-aos="slide-up">
            @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{ $category->name }}
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
                <img src="https://media.istockphoto.com/id/913316472/es/vector/concepto-de-compras-en-l%C3%ADnea-comprar-ordenador-port%C3%A1til-abierto-con-pantalla-plano-de-estilo.jpg?s=612x612&w=0&k=20&c=8IYlV0-5paF2zDb4t9ulQJw4t3aweTrXOBu0lCvTNHc="
                    class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="300"
                    loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">iShop</h1>
                <p class="lead">Encuentra todo lo que quieras para ese nuevo estilo de vida, look o esa persona especial.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="fw-bold text-center" style="padding-bottom: 40px;" data-aos="slide-up">Más Vendido</h1>
        <hr>
        <div class="row">
            @foreach ($topSellers as $topSeller)
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="my-3 p-3">
                            <h2 class="display-5">{{ $topSeller->product->name }}</h2>
                        </div>
                        <div style="padding-bottom: 50px">
                            <a href="{{ route('viewProduct', $topSeller->product->id) }}">
                                <img src="{{ asset('storage') . '/' . $topSeller->product->image }}" width="300px"
                                    height="200px">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="text-center fw-bold" style="padding-bottom: 40px; padding-top: 40px;" data-aos="slide-up">Categorias</h1>

        <hr>

        <div class="row">
            @foreach ($categories->take(6) as $category)
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="my-3 p-3 text-center">
                            <h5>{{ $category->name }}</h5>
                        </div>
                        <div style="padding-bottom: 50px">
                            <a href="{{ route('home.products', $category->id) }}">
                                <img src="{{ asset('storage') . '/' . $category->image }}"
                                    width="200px" height="100px">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <footer class="py-5 bg-primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; iShop {{ date('Y') }}</p>
        </div>
    </footer>
@endsection
