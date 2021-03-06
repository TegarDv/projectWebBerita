@extends('layouts.app')
@section('title')
    Web Berita | Edit Berita
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-5" align="center">{{ __('EDIT BERITA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/news/{{$news->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$news->id}}"></br>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" required="required" name="judul" value="{{$news->judul}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="Kategori">kategori</label>
                            <select class="form-control" name="Kategori">
                            @foreach($kategori as $kategori)
                            <option value="{{$kategori->id}}" {{ $news->kategori_id == $kategori->id ? "selected":"" }}>
                            {{ $kategori->kategori_name}}
                            </option>
                            @endforeach
                            </select></br>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Berita</label>
                            <input id="isi" type="hidden" name="isi">
                            <trix-editor input="isi">{{$news->isi}}</trix-editor>
                        </div>
                        <div class="form-group">
                            <label for="photo">News Image</label>
                            <input type="file" class="form-control" required="required" name="photo" value="{{$news->photo}}"></br>
                            <img width="150px" src="{{asset('storage/'.$news->photo)}}">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection