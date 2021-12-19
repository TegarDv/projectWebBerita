@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card-header" align="center"><b>{{ __('PROJECT LARAVEL WEBSITE BERITA') }}</b></div>
            <div class="card-header">{{ __('News Data') }}</div>

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
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Isi</th>
                                <th>News Picture</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $s)
                            <tr>
                                <td>{{ $s->judul }}</td>
                                <td><a href="/news/{{ $s->kategori->judul }}">{{ $s->kategori->kategori_name }}</a></td> 
                                <td>{{ $s->isi }}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection

