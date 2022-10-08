 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-secondary">
                 <li class="nav-item" id="nav-dashboard">
                     <a href="{{ url('/dashboard') }}">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Intervensi</h4>
                 </li>
                 <li class="nav-item" id="nav-perencanaan">
                     <a href="{{ url('rencana-intervensi') }}">
                         <i class="fas fa-list"></i>
                         <p>Perencanaan</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-realisasi">
                     <a href="{{ url('realisasi-intervensi') }}">
                         <i class="fas fa-tasks"></i>
                         <p>Realisasi</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-hasil-realisasi">
                     <a href="{{ url('hasil-realisasi') }}">
                         <i class="far fa-flag"></i>
                         <p>Hasil Realisasi</p>
                     </a>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Master Data</h4>
                 </li>

                 <li class="nav-item" id="nav-master-wilayah">
                     <a href="{{ url('master-data/wilayah/kecamatan') }}">
                         <i class="far fa-map"></i>
                         <p>Wilayah</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-pengukuran-anak">
                     <a href="{{ url('daftar-pengukuran-anak') }}">
                         <i class="fas fa-user-md"></i>
                         <p>Pengukuran Anak</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-master-orang-tua">
                     <a href="{{ url('master-data/orang-tua') }}">
                         <i class="fas fa-user-friends"></i>
                         <p>Orang Tua</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-master-anak">
                     <a href="{{ url('master-data/anak') }}">
                         <i class="fas fa-child"></i>
                         <p>Anak</p>
                     </a>
                 </li>
                 @if (Auth::user()->role != 'OPD')
                     <li class="nav-item" id="nav-master-opd">
                         <a href="{{ url('master-data/opd') }}">
                             <i class="fas fa-building"></i>
                             <p>OPD</p>
                         </a>
                     </li>
                 @endif
                 @if (Auth::user()->role == 'Admin')
                     <li class="nav-item" id="nav-master-pelayanan-kesehatan">
                         <a href="{{ url('master-data/puskesmas') }}">
                             <i class="fas fa-hospital"></i>
                             <p>Pelayanan Kesehatan</p>
                         </a>
                     </li>
                     <li class="nav-item" id="nav-master-sumber-dana">
                         <a href="{{ url('master-data/sumber-dana') }}">
                             <i class="fas fa-money-bill-wave"></i>
                             <p>Sumber Dana</p>
                         </a>
                     </li>
                     <li class="nav-item" id="nav-master-indikator">
                         <a href="{{ url('master-data/indikator') }}">
                             <i class="fas fa-tasks"></i>
                             <p>Indikator</p>
                         </a>
                     </li>
                     <li class="nav-item" id="nav-master-akun">
                         <a href="{{ url('master-data/akun') }}">
                             <i class="fas fa-users"></i>
                             <p>Akun</p>
                         </a>
                     </li>
                 @endif

             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
