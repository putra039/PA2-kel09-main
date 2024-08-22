<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
        <a href="{{route('dashboard')}}" class="header-logo">
            <img src="{{ asset('assets/auth/images/logo.png') }}" class="img-fluid rounded-normal light-logo"
                alt="logo">
            {{-- <img src="{{ asset('assets/auth/images/logo-dark.png') }}" class="img-fluid rounded-normal darkmode-logo"
                alt="logo"> --}}
            <span>OR Hutapea</span>
        </a>
        <div class="side-menu-bt-sidebar-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="side-menu">
                <li class=" sidebar-layout">
                    <a href="{{ route('dashboard') }}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </i>
                        <span class="ml-2">Dashboard</span>
                        {{-- <p class="mb-0 w-10 badge badge-pill badge-primary">6</p> --}}
                    </a>
                </li>
                <li class="px-3 pt-3 pb-2 ">
                    <span class="text-uppercase small font-weight-bold">Kelola Data</span>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{ route('penduduk.index') }}" class="svg-icon ">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </i>
                        <span class="ml-2">Kelola Kependudukan</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('perangkat.index')}}" class="svg-icon ">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </i>
                        <span class="ml-2">Kelola Perangkat Desa</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('kegiatan.index')}}" class="svg-icon">
                        <i class="">
                            <svg class="icon line" width="18" id="receipt" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M17,16V3L13,5,10,3,7,5,3,3V17.83A3.13,3.13,0,0,0,5.84,21,3,3,0,0,0,9,18V17a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v1a3,3,0,0,1-3,3H6"
                                    style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                                <line x1="8" y1="10" x2="12" y2="10"
                                    style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </line>
                            </svg>
                        </i>
                        <span class="ml-2">Kelola Kegiatan</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('pengumuman.index')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </i><span class="ml-2">Kelola Pengumuman</span>
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('pengajuan.index')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </i>
                        <span class="ml-2">Kelola Pengajuan</span>
                        {{-- <p class="mb-0 px-2 badge badge-pill badge-success">New</p> --}}
                    </a>
                </li>
                <li class=" sidebar-layout">
                    <a href="{{route('saran.index')}}" class="svg-icon">
                        <i class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </i>
                        <span class="ml-2">Kelola Pengaduan</span>
                        {{-- <p class="mb-0 px-2 badge badge-pill badge-success">New</p> --}}
                    </a>
                </li>
            </ul>
        </nav>

        <div class="pt-5 pb-5"></div>
    </div>
</div>

