@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required><br><br>

        <label for="npm">NPM:</label><br>
        <input type="text" id="npm" name="npm" value="{{ old('npm', $user->nim) }}" required><br><br>

        <label for="kelas_id">Kelas:</label><br>
        <select id="kelas_id" name="kelas_id" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas_id', $user->kelas_id) == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit" class="btn btn-edit">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection