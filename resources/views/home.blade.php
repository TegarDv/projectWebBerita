@extends('layouts.app')
@section('title')
    Web Berita | Home
@endsection
@section('content')
<div class="container mt-5" style="margin-top: 10%; margin-bottom: 50%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('Detail Akun') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-success" role="alert">
                        Hallo {{ $user->name }} Anda Berhasil Login
                    </div>
                    <div class="card-header" align="left"><b>{{ __('Detail Akun Anda') }}</b></div>
                    <table class="table table-responsive">
                        <tr><th>Name</th><th>:</th><td>{{ $user->name }}</td></tr>
                        <tr><th>Email</th><th>:</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Role</th><th>:</th><td>{{ $user->role }}</td></tr>
                    </table>
                    <a href="/news/" class="btn btn-primary">Go To Dashboard</a>
                    <a href="/news/" class="btn btn-primary">Go to Main Page</a><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
