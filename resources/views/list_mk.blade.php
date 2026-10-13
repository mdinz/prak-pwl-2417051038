@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Daftar Mata Kuliah</h1>

    {{-- ALERT NOTIFIKASI (hapus blok ini kalau sudah dipasang di layouts/app.blade.php) --}}
    @if (session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">❌ {{ session('error') }}</div>
    @endif
    {{-- AKHIR ALERT --}}

    <a href="{{ route('matakuliah.create') }}" class="btn btn-add">➕ Tambah Mata Kuliah Baru</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mks as $mk)
                <tr>
                    <td>{{ $mk->id }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>
                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-edit">✏️ Edit</a>

                        <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline;" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Popup konfirmasi hapus
    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

    // Alert hilang otomatis setelah 4 detik
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(a => {
            a.style.opacity = '0';
            setTimeout(() => a.remove(), 500);
        });
    }, 4000);
</script>
@endsection