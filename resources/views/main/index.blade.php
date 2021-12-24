@extends('layouts.app')
@section('title')
    Web Berita | Beranda
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="container">
            <div class="card-header mt-5 text-white" align="center"><b>{{ __('BERANDA') }}</b></div>
            <form class="form mb-3" method="get" action="{{route('search')}}">
                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan judul">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </form>
        </div>
    <!-- Header News First -->
    <div class="card mb-3" style="background-color: #dbdbdb">
        <img class="card-img-top" src="{{asset('storage/'.$news[0]->photo)}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $news[0]->judul}}</h5>
            <h6 class="card-text">Berita {{ $news[0]->kategori->kategori_name }}</h6>
            <p class="card-text">{!! $news[0]->pesan_singkat !!}</p>
            <p class="card-text"><small class="text-muted">Terakhir di ubah {{ $news[0]->updated_at->diffForHumans() }}</small></p>
            <a href="/news/{{$news[0]->id}}" class="btn btn-primary">Read More</a>
            @can('manage-users')
            <a href="/news/{{$news[0]->id}}/edit" class="btn btn-primary">📝 Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" class="btn btn-dark">🚮 Delete</button>
            @endcan
        </div>
    </div>
    <!-- Closer Header News First -->
    <!-- News List All -->
    <div class="container">
        <div class="row ">
            @foreach($news->skip(1) as $s)
            <div class="col-md-4">
                <div class="card mr-1 mb-4" style="background-color: #dbdbdb">
                    <img class="card-img-top mx-auto" src="{{asset('storage/'.$s->photo)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $s->judul }}</h5>
                        <h6 class="card-text">Berita {{ $s->kategori->kategori_name }}</h6>
                        <p class="card-text">{{$s->pesan_singkat}}</p>
                        <p class="card-text"><small class="text-muted">Last Update {{ $s->updated_at->diffForHumans() }}</small></p>
                        <a href="/news/{{$s->id}}" class="btn btn-primary">Read More</a>
                        @can('manage-users')
                        <a href="/news/{{$s->id}}/edit" class="btn btn-primary">📝 Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="delete" class="btn btn-dark">🚮 Delete</button>
                        @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Closer News List All -->

    <!-- Pagination -->
    <div class="d-flex justify-content-end">
        {{ $news->links()}}
    </div>
    <!-- End Pagination -->

@endsection

