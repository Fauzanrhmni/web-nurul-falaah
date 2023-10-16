<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-costum">TAAM Nurul Falaah</h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('img/logo.png') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="/guru" class="nav-item nav-link {{ Request::is('guru*') ? 'active' : '' }}"><i class="bi bi-person-video3 me-2"></i>Guru</a>
                    <a href="/kelas" class="nav-item nav-link {{ Request::is('kelas*') ? 'active' : '' }}"><i class="fa fa-table me-2"></i>Kelas</a>
                    <a href="/siswa" class="nav-item nav-link {{ Request::is('siswa*') ? 'active' : '' }}"><i class="bi bi-people-fill me-2"></i>Siswa</a>
                    <a href="/fasilitasAdmin" class="nav-item nav-link {{ Request::is('fasilitasAdmin*') ? 'active' : '' }}"><i class="bi bi-card-image me-2"></i>Fasilitas</a>
                    <a href="/akademik" class="nav-item nav-link {{ Request::is('akademik*') ? 'active' : '' }}"><i class="bi bi-calendar me-2"></i>Kalender Ak</a>
                    <a href="/pesan" class="nav-item nav-link {{ Request::is('pesan*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i>Pesan</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->