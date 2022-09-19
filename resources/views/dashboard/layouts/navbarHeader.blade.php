 <!-- Navbar Header -->
 <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
     <div class="container-fluid">
         <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
             <li class="text-white font-weight-bold mr-2">
                 {{ Auth::user()->role == 'Admin' || Auth::user()->role == 'Pimpinan' ? Auth::user()->nama : Auth::user()->opd->nama }}
             </li>
             <li class="nav-item dropdown hidden-caret">
                 <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                     <div class="avatar-sm">
                         <img src="{{ asset('assets/dashboard') }}/img/user.png" alt="..."
                             class="avatar-img rounded-circle">
                     </div>
                 </a>
                 <ul class="dropdown-menu dropdown-user animated fadeIn">
                     <div class="dropdown-user-scroll scrollbar-outer">
                         <li>
                             <div class="user-box">
                                 <div class="avatar-lg"><img src="{{ asset('assets/dashboard') }}/img/user.png"
                                         alt="image profile" class="avatar-img rounded"></div>
                                 <div class="u-text">
                                     <h4>{{ Auth::user()->role == 'Admin' || Auth::user()->role == 'Pimpinan' ? Auth::user()->nama : Auth::user()->opd->nama }}
                                     </h4>

                                     <p class="text-muted">{{ Auth::user()->role }}</p>
                                     {{-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> --}}
                                 </div>
                             </div>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                             {{-- <a class="dropdown-item" href="#">My Profile</a>
                             <a class="dropdown-item" href="#">My Balance</a>
                             <a class="dropdown-item" href="#">Inbox</a>
                             <div class="dropdown-divider"></div> --}}
                             <a class="dropdown-item" href="{{ url('pengaturan-akun') }}">Pengaturan Akun</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="{{ url('/logout') }}">Keluar</a>
                         </li>
                     </div>
                 </ul>
             </li>
         </ul>
     </div>
 </nav>
 <!-- End Navbar -->
