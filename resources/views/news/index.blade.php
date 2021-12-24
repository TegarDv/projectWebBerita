@extends('layouts.app')
@section('title')
    Web Berita | Dashboard Berita
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <form class="form mb-3" method="get" action="{{route('search')}}">
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan judul">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </form>
            <div class="card-header text-white text-center" align="center">{{ __('News Data') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('manage-users')
                    <a href="/news/create" class="btn btn-primary">+ Tambahkan Berita</a>
                    <a href="/kategori/" class="btn btn-primary">Kelola Kategori</a><br><br>
                    @endcan
                    <table class="table table-responsive table-striped text-white">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Isi</th>
                                <th>Pesan Singkat</th>
                                <th>News Picture</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $s)
                            <tr>
                                <td class="text-white">{{ $s->judul }}</td>
                                <td class="text-white">{{ $s->kategori->kategori_name }}</td> 
                                <td class="text-white">{{ $s->isi }}</td>
                                <td class="text-white">{{ $s->pesan_singkat }}</td>
                                <td><img width="150px" src="{{asset('storage/'.$s->photo)}}"></td>
                                <td>
                                    <form action="/news/{{$s->id}}" method="post">
                                        <a href="/news/{{$s->id}}" class="btn btn-primary">View</a>
                                        @can('manage-users')
                                        <a href="/news/{{$s->id}}/edit" class="btn btn-primary">✏️ Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="delete" class="btn btn-dark">❌ Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    {{ $news->links()}}
                </div>
                <!-- End Pagination -->
            </div>
            
        </div>

    </div>
    
</div>

    
@endsection

