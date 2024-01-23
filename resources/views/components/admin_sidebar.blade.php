<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pengetahuan</li>

        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('cl.form') }}">
                <i class="bi bi-clipboard-check"></i>
                <span>Putusan</span>
            </a>
        </li><!-- End Identifikasi Page Nav -->

        @if(auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('identifikasi.index') }}">
                <i class="bi bi-search"></i>
                <span>Identifikasi</span>
            </a>
        </li><!-- End Identifikasi Page Nav -->
        

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pasal.index') }}">
                <i class="bi bi-book"></i>
                <span>Pasal</span>
            </a>
        </li><!-- End Pasal Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('keputusan.index') }}">
                <i class="bi bi-percent"></i>
                <span>Keputusan</span>
            </a>
        </li><!-- End Pasal Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('artikel.index') }}">
                <i class="bi bi-journal-text"></i>
                <span>Artikel</span>
            </a>
        </li><!-- End Pasal Page Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('spk.index') }}">
                <i class="bi bi-clipboard2-data"></i>
                <span>Hasil Putusan</span>
            </a>
        </li><!-- End Pasal Page Nav -->

        <li class="nav-heading">Pengaturan</li>

        @if(auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/add_admin">
                        <i class="bi bi-circle"></i><span>Tambah Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/admin">
                        <i class="bi bi-circle"></i><span>Daftar Admin</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
        @endif

        <li class="nav-item" style="nowrap">

            <a class="nav-link collapsed" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li><!-- End F.A.Q Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
