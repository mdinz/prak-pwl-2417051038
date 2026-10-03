@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah Pengguna</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @include('components.user_table', ['users' => $users])
    </div>
</div>
@endsection