@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('NEWS DATA DETAILS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/news/{{$news->id}}" method="post" enctype="multipart/formdata">
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Isi</th>
                                <th>News Picture</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$news->id}}</td>
                                <td>{{$news->judul}}</td>
                                <td>{{$news->kategori->kategori_name}}</td>
                                <td>{{$news->isi}}</td>
                                <td><img width="150px" src="{{asset('storage/'.$news->photo)}}"></td>
                            </tr>
                            <a href="/news" class="btn btn-primary">Return</a>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection