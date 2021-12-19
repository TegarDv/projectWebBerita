@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card-header" align="center"><b>{{ __('BUAT BERITA BARU') }}</b></div>
        <div class="card">
            <div class="card-header">{{ __('News Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/news" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" required="required" name="judul"></br>
                        </div>
                        <div class="form-group">
                            <label for="Kategori">kategori</label>
                            <select class="form-control" name="Kategori">
                            @foreach($kategori as $kategori)
                            <option value="{{$kategori->id}}">
                                {{ $kategori->kategori_name }}
                            </option>
                            @endforeach
                            </select></br>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type="text" class="form-control" required="required" name="isi"></br>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" required="required" name="photo"></br>
                        <div>
                        <button type="submit" name="create" class="btn btn-primary float-right">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection