<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PWL App' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        .btn-add, .btn-edit, .btn-delete {
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 14px;
            transition: all .2s;
        }
        .btn-add:hover, .btn-edit:hover, .btn-delete:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,.2);
        }
        .btn-add    { background: #3b82f6; }
        .btn-add:hover    { background: #2563eb; }
        .btn-edit   { background: #f59e0b; }
        .btn-edit:hover   { background: #d97706; }
        .btn-delete { background: #ef4444; }
        .btn-delete:hover { background: #dc2626; }

        .alert { border-radius: 8px; transition: opacity .5s; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
    </style>
</head>
<body>
    @include('components.navbar')

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success auto-hide">✅ {{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error auto-hide">❌ {{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY31HB60NNkmXc5s9fDVZLESAAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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

        setTimeout(() => {
            document.querySelectorAll('.auto-hide').forEach(a => {
                a.style.opacity = '0';
                setTimeout(() => a.remove(), 500);
            });
        }, 4000);
    </script>
</body>
</html>