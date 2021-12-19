@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card-header" align="center"><b>{{ __('BUAT KATEGORI BARU') }}</b></div>
        <div class="card">
            <div class="card-header">{{ __(' ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/kategori" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label for="kategori_name">Kategori</label>
                            <input type="text" class="form-control" required="required" name="kategori_name"></br>
                        </div>
                        <button type="submit" name="create" class="btn btn-primary float-right">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection