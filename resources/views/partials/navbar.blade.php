<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Manajemen Cuti</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home" ? 'active' : '') }}" href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Database
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/departemen">Departemen</a></li>
            <li><a class="dropdown-item" href="/pegawai">Pegawai</a></li>
            <li><a class="dropdown-item" href="/riwayatcuti">Riwayat Cuti</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "About" ? 'active' : '') }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Blog" || $title === "Single Post" ? 'active' : '') }}" href="/blog">Blog</a>
        </li>
      </ul>
    </div>
  </div>
</nav>