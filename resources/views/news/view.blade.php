@extends('layouts.app')
@section('title')
    Web Berita | Detail
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-primary">{{ __('Berita/') }}/{{ $news->kategori->kategori_name }}/Detail</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/news/{{$news->id}}" method="post" enctype="multipart/formdata">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{asset('storage/'.$news->photo)}}" alt="Card image cap">
                        <div class="card-body">
                                <h1 class="card-title">{{ $news->judul}}</h1>
                                <h6 class="card-text">Berita {{ $news->kategori->kategori_name }}</h6>
                                <p class="card-text"><small class="text-muted">Last Update {{ $news->updated_at->diffForHumans() }}</small></p>
                                {!! $news->isi !!} <br>
                            @can('manage-users')
                            <a href="/news/{{$news->id}}/edit" class="btn btn-primary">📝 Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" class="btn btn-dark">🚮 Delete</button>
                            @endcan
                        </div>
                    </div>
                    <a href="/" class="btn btn-primary">🏠 Kembali ke Beranda</a>
                    @can('manage-users')
                    <a href="/main" class="btn btn-primary">⚙️ Kembali ke Dashboard</a>
                    @endcan
                    </form>
                </div>
            </div>
            <!-- Loop Berita Lainnya -->
            <div class="card-header text-dark bg-light mt-3 mb-1 fs-5">Berita Lainnya :</div>
            <div class="container">
                <div class="row">
                @for ($i = 0; $i < 9; $i++)
                <div class="card m-2" style="max-width: 400px;">
                <a href="/news/{{$newsAll[$i]->id}}" class="text-decoration-none text-black">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="{{asset('storage/'.$newsAll[$i]->photo)}}" class="img-fluid rounded-start img-thumbnail">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsAll[$i]->judul}}</h5>
                        <p class="card-text">{{ $newsAll[$i]->pesan_singkat}}</p>
                        <p class="card-text"><small class="text-muted">Last Update {{ $newsAll[$i]->updated_at->diffForHumans() }}</small></p>
                    </div>
                    </div>
                </div></a>
                </div>
                @endfor
                </div>
            </div>
            <!-- End Loop Berita Lainnya -->
        </div>
    </div>
</div>
@endsection

