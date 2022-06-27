<!DOCTYPE html>
<html lang="en">
@yield('head')

<body class="nav-body">
    <!-- nav bar -->
    <input type="checkbox" id="checkbox-toggle" onclick="openNav()" checked class="hide-checkbox" />
    <div class="hb-container">
        <span class="hb"></span>
        <span class="hb"></span>
        <span class="hb"></span>
    </div>
    <div class="container-sidenavbar" id="side-navbar">
        <div class="disp-flex flex-row-css items-center">
            <div class="title-container center-vertical">
                <img src="./assets/logo/logo.png" alt="" / class="logo-css"><span>SIPALING</span>
            </div>
        </div>
        <div class="instansi-container">
            <img src="./assets/logo/uns.png" alt="" srcset="" />
            <span>Universitas Sebelas Maret</span>
        </div>
        <div class="nav-menu font-semibold">
            <span>General</span>
            <a href="/">
                <i class="fa-solid fa-house-user fa-lg " style="margin-right: 0.4em">
                </i>
                Dashboard
            </a><i class="fa-solid fa-house-user fa-lg collapse-icon"></i>
            @auth
                <div class="manajemen-container">
                    <span>Manajemen</span>
                    <a href="{{ route('pengajuan_cuti') }}">
                        <i class="fa-solid fa-calendar-days fa-lg move-icon"
                            style="margin-right: 0.4em; margin-left: 0.1em">
                        </i>
                        Pengajuan Cuti
                    </a><i class="fa-solid fa-calendar-days fa-lg collapse-icon"></i>

                    @if (Auth::user()->is_admin == 1)
                        <a href="{{ route('admin.approvalCuti') }}">
                            <i class="fa-solid fa-bell fa-lg move-icon" style="margin-right: 0.4em; margin-left: 0.1em">
                            </i>
                            Approval Cuti
                        </a><i class="fa-solid fa-bell fa-lg collapse-icon"></i>
                        <a href="{{ route('manajemen_user.index') }}">
                            <i class="fa-solid fa-person-circle-exclamation" style="margin-right: 0.4em; margin-left: 0.1em"></i>
                            Manajemen User
                        </a><i class="fa-solid fa-person-circle-exclamation collapse-icon"></i>
                    @endif

                </div>
            @endauth
        </div>
    </div>
    <!-- main page -->
    <div class="disp-flex flex-col-css r-ctn-wdth font-poppins">
        @auth
            <!-- right corner user profile dropdown  -->
            <div class="top-right-navbar" onclick="profileDropdwn()">
                @auth
                    @if (Auth::user()->image)
                        <img src="{{ asset(Auth::user()->image) }}" alt="profile_image" class="user-icon">
                    @else
                        <img src="{{ asset('assets/img/user-placeholder.png') }}" alt="user" class="user-icon" />
                    @endif
                @else
                    <img src="{{ asset('assets/img/user-placeholder.png') }}" alt="" srcset="" class="user-icon">
                @endauth

                <span class="username">{{ explode(' ', ucwords(strtolower(Auth::user()->nama)))[0] }}</span>
                <i class="fa-solid fa-angle-down" style="position: relative; right: -8px; top: 1px; pointer-events: none;">
                </i>
                <ul class="prof-dropdown" id="profDropdown">
                    <li><a href="{{ route('profile') }}" class="font-semibold">Profile</a></li>
                    <li>
                        <form action={{ route('logout') }} method="POST" id="logout-form">
                            @csrf
                            <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                            {{-- <input
                                    type="submit" value="Logout" id="logout-btn"
                                    style="width: 225px; z-index:10;height: 50px; margin-top: 20px; display:hidden;"> --}}
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="nav-link-css">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>

        @endauth

        <!-- main content -->
        @yield('content')

    </div>
</body>
@yield('script')

</html>
