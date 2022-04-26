<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <span class="fs-5 text-primary">Pencatatan Keuangan</span>
                            <p class="fs-6 te">Selamat datang {{ Auth::user()->nama }}</p>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        
                        <li class="sidebar-item ">
                            <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                                <i class="fa-solid fa-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        @if(Auth::user()->role == 'admin')
                        <li class="sidebar-item">
                            <a href="{{ route('data_user') }}" class='sidebar-link'>
                                <i class="fa-solid fa-users"></i>
                                <span>Data User</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('laporan') }}" class='sidebar-link'>
                                <i class="fa-solid fa-list"></i>
                                <span>Laporan Keseluruhan</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a href="{{ route('laporan_user') }}" class='sidebar-link'>
                                <i class="fa-solid fa-list-ol"></i>
                                <span>Laporan Per User</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{ route('input-kas') }}" class='sidebar-link'>
                                <i class="fa-solid fa-pen"></i>
                                <span>Input Kas</span>
                            </a>
                        </li>
                       
                        <li class="sidebar-item">
                            <a href="{{ route('lap-kas') }}" class='sidebar-link'>
                                <i class="fa-solid fa-list-ul"></i>
                                <span>Laporan Kas</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a href="{{ route('logout') }}" class='sidebar-link'>
                                <i class="fa-solid fa-sign-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>