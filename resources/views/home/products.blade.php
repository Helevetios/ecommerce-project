@extends('layouts.layout')

@section('title', 'Producto')

@section('link')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Productos
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{ route('home.products', [$category->id]) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
@endsection

@section('content')
    <div class="container" style="min-height: 100vh">
        @if (Session::has('msg'))
            <br>
            <div class="alert alert-success">
                <h5>{!! \Session::get('msg') !!}</h5>
            </div>
        @endif
        <div style="margin-top: 5%; margin-bottom: 5%">
        </div>

        <h1 style="padding-bottom: 40px;">{{ $category_name[0]->name }}</h1>
        <hr style="padding: 10px">

        @if (empty($products[0]))
            <div class="d-flex align-items-center justify-content-center" style="height: 50vh;">
                <h1 class="text-center">No hay nada aqui...</h1>
            </div>
        @else
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('storage') . '/' . $product->image }}" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    {{ '$' . $product->price }}
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-primary mt-auto"
                                        href="{{ route('viewProduct', $product->id) }}">Visitar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{ $products->links() }}
    </div>

    <footer class="py-5 bg-primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; iShop {{ date('Y') }}</p>
        </div>
    </footer>
@endsection
