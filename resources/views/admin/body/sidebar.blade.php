<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://si-rajapede.my.id" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI-RAJAPEDE</span>
    </a>

    @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" --}}
                <img src="{{ isset($adminData->profile_image) ? url('upload/user_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}"
                    class="img-circle elevation-2" alt="User Image" height="150">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
            {{-- ini ada garisnya dibawah --}}
            {{-- </div> --}}

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                {{-- =============================================== --}}

                <li class="nav-header">Master</li>
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.alumni.index') }}" class="nav-link"> --}}
                    <a href="{{ route('admin.alumni.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Alumni</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.alumni.index') }}" class="nav-link"> --}}
                    <a href="{{ route('sekolah.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Sekolah</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.alumni.index') }}" class="nav-link"> --}}
                    <a href="{{ route('perusahaan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.alumni.index') }}" class="nav-link"> --}}
                    <a href="{{ route('lowongan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Lowongan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesertadidik.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Peserta Didik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.video_tutorial.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-video"></i>
                        <p>Video Tutorial</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.hero.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Hero</p>
                    </a>
                </li>

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- ini ada garisnya dibawah --}}
                </div>
                <li class="nav-header">User Accout</li>


                <li class="nav-item">

                    <a href="{{ route('admin.adminprofile') }}" class="nav-link ">
                        {{-- <a href="#" class="nav-link active"> --}}
                        <i class="nav-icon fas fa-user"></i>
                        <p>Edit Profile</p>
                    </a>

                </li>



                <li class="nav-item menu-open">


                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
