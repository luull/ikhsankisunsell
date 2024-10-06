@extends('layouts.productApp')

@section('title', 'Product')

@section('content')
    <h1 class="text-center mb-4">Product List</h1>

    <div class="container">
        <!-- Pulsa Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2>Pulsa</h2>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/telkomsel.png" class="card-img-top" alt="Telkomsel Pulsa">
                    <div class="card-body">
                        <h5 class="card-title">Telkomsel</h5>
                        <p class="card-text">Pulsa Telkomsel berbagai nominal.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/indosat.png" class="card-img-top" alt="Indosat Pulsa">
                    <div class="card-body">
                        <h5 class="card-title">Indosat</h5>
                        <p class="card-text">Pulsa Indosat berbagai nominal.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/xl.png" class="card-img-top" alt="XL Pulsa">
                    <div class="card-body">
                        <h5 class="card-title">XL</h5>
                        <p class="card-text">Pulsa XL berbagai nominal.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kuota Internet Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2>Kuota Internet</h2>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/telkomsel.png" class="card-img-top" alt="Telkomsel Kuota Internet">
                    <div class="card-body">
                        <h5 class="card-title">Telkomsel</h5>
                        <p class="card-text">Kuota Internet Telkomsel berbagai paket.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/indosat.png" class="card-img-top" alt="Indosat Kuota Internet">
                    <div class="card-body">
                        <h5 class="card-title">Indosat</h5>
                        <p class="card-text">Kuota Internet Indosat berbagai paket.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/images/xl.png" class="card-img-top" alt="XL Kuota Internet">
                    <div class="card-body">
                        <h5 class="card-title">XL</h5>
                        <p class="card-text">Kuota Internet XL berbagai paket.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
