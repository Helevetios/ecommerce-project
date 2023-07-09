@extends('layouts.layout')

@section('title', 'Product')

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
    <section>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                @if (Session::has('msg'))
                    @if (Session::get('msg') == 'error')
                        <div class="alert alert-danger mb-3">
                            <h5>Añada una cantidad valida</h5>
                        </div>
                    @endif
                @endif

                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ asset('storage') . '/' . $productItem->image }}" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $productItem->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span>${{ $productItem->price }}</span>
                    </div>
                    <h4>{{ $productItem->description }}</h4>
                    <p class="lead">{{ $productItem->about }}</p>
                    @auth
                        @if (!$cartShow)
                            <form action="{{ route('home.cart.store', $productItem->id) }}" method="post">
                                @csrf
                                <div class="d-flex">
                                    <input name="cant" class="form-control text-center me-3" id="inputQuantity"
                                        min="1" type="num" value="1" style="max-width: 3rem" />
                                    <button type="submit" class="btn btn-outline-primary flex-shrink-0">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="d-flex">
                                <input disabled class="form-control text-center me-3" id="inputQuantity" min="1"
                                    type="num" value="1" style="max-width: 3rem" />
                                <button disabled class="btn btn-outline-primary flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                            <p class="mt-2">El producto ya se encuentra en el carrito</p>
                        @endif
                    @endauth

                    @guest
                        <div class="d-flex">
                            <input disabled class="form-control text-center me-3" id="inputQuantity" min="1"
                                type="num" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-primary flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                        <p class="mt-2">Por favor, Inicie sesión</p>
                    @endguest

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <h2 class="fw-bolder mb-4">Más Productos</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($productRelateds as $productRelated)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('storage') . '/' . $productRelated->image }}" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <p style="font-size: 16px" class="fw-bolder">{{ $productRelated->name }}</p>
                                    {{ '$' . $productRelated->price }}
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-primary mt-auto"
                                        href="{{ route('viewProduct', $productRelated->id) }}">Visitar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="py-5 bg-primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; iShop {{ date('Y') }}</p>
        </div>
    </footer>
@endsection
