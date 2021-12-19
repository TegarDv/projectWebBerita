@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card-header" align="center"><b>{{ __('PROJECT LARAVEL WEBSITE BERITA') }}</b></div>
        <div class="card">
            <div class="card-header">{{ __('News Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('manage-users')
                    <a href="/news/" class="btn btn-secondary">Kembali Ke Dashboard</a>
                    <a href="/kategori/create" class="btn btn-primary">+ Tambah Kategori Baru</a><br><br>
                    @endcan
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $s)
                            <tr>
                                <td>{{ $s->kategori_name }}</td>
                                <td>
                                    <form action="/kategori/{{$s->id}}" method="post">
                                        @can('manage-users')
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



