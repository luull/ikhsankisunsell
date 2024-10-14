@extends('partials.app')

@section('title', 'Product')

@section('content')
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            @if (session('Berhasil'))
            <div class="alert alert-success">
                {{ session('Berhasil','Profil anda telah di ubah.')}}
            </div>
        @endif
@endsection

