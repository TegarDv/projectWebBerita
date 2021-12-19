@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                    <a href="/news/" class="btn btn-primary">Go To Dashboard</a><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
