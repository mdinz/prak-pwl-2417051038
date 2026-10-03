<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/user">PWL App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user') ? 'active fw-bold text-warning' : '' }}" href="/user">Daftar Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/create') ? 'active fw-bold text-warning' : '' }}" href="/user/create">Tambah Pengguna</a>
                </li>
            </ul>
        </div>
    </div>
</nav>