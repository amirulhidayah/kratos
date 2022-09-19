 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-primary">
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
                     <a data-toggle="collapse" href="#perencanaan">
                         <i class="fas fa-layer-group"></i>
                         <p>Perencanaan</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="perencanaan">
                         <ul class="nav nav-collapse">
                             <li id="li-keong">
                                 <a href="{{ url('rencana-intervensi-keong') }}">
                                     <span class="sub-item">Habitat Keong</span>
                                 </a>
                             </li>
                             <li id="li-manusia">
                                 <a href="{{ url('rencana-intervensi-manusia') }}">
                                     <span class="sub-item">Manusia</span>
                                 </a>
                             </li>
                             <li id="li-hewan">
                                 <a href="{{ url('rencana-intervensi-hewan') }}">
                                     <span class="sub-item">Lokasi Hewan Ternak</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item" id="nav-realisasi">
                     <a data-toggle="collapse" href="#realisasi">
                         <i class="fas fa-layer-group"></i>
                         <p>Realisasi</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="realisasi">
                         <ul class="nav nav-collapse">
                             <li id="li-keong-2">
                                 <a href="{{ url('realisasi-intervensi-keong') }}">
                                     <span class="sub-item">Habitat Keong</span>
                                 </a>
                             </li>
                             <li id="li-manusia-2">
                                 <a href="{{ url('realisasi-intervensi-manusia') }}">
                                     <span class="sub-item">Manusia</span>
                                 </a>
                             </li>
                             <li id="li-hewan-2">
                                 <a href="{{ url('realisasi-intervensi-hewan') }}">
                                     <span class="sub-item">Lokasi Hewan Ternak</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Hasil Realisasi</h4>
                 </li>
                 <li class="nav-item" id="nav-hasil-realisasi-keong">
                     <a href="{{ url('hasil-realisasi-keong') }}">
                         <i class="fas fa-map-pin"></i>
                         <p>Habitat Keong</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-hasil-realisasi-manusia">
                     <a href="{{ url('hasil-realisasi-manusia') }}">
                         <i class="fas fa-users"></i>
                         <p>Manusia</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-hasil-realisasi-hewan">
                     <a href="{{ url('hasil-realisasi-hewan') }}">
                         <i class="fas fa-paw"></i>
                         <p>Lokasi Hewan Ternak</p>
                     </a>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Dokumen</h4>
                 </li>
                 <li class="nav-item" id="nav-dokumen-road-map">
                     <a href="{{ url('dokumen/road-map') }}">
                         <i class="fas fa-road"></i>
                         <p>Road Map</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-dokumen-master-plan">
                     <a href="{{ url('dokumen/master-plan') }}">
                         <i class="far fa-clipboard"></i>
                         <p>Master Plan</p>
                     </a>
                 </li>

                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Master Data</h4>
                 </li>

                 <li class="nav-item" id="nav-master-lokasi">
                     <a data-toggle="collapse" href="#lokasi">
                         <i class="far fa-map"></i>
                         <p>Lokasi</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="lokasi">
                         <ul class="nav nav-collapse">
                             <li id="li-lokasi-desa">
                                 <a href="{{ url('master-data/lokasi/desa') }}">
                                     <span class="sub-item">Desa</span>
                                 </a>
                             </li>
                             <li id="li-lokasi-keong">
                                 <a href="{{ url('master-data/lokasi/keong') }}">
                                     <span class="sub-item">Habitat Keong</span>
                                 </a>
                             </li>
                             <li id="li-lokasi-hewan">
                                 <a href="{{ url('master-data/lokasi/hewan') }}">
                                     <span class="sub-item">Hewan Ternak</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item" id="nav-master-penduduk">
                     <a href="{{ url('master-data/penduduk') }}">
                         <i class="fas fa-user-edit"></i>
                         <p>Penduduk</p>
                     </a>
                 </li>
                 <li class="nav-item" id="nav-master-sekolah">
                     <a href="{{ url('master-data/jenjang-sekolah') }}">
                         <i class="fas fa-school"></i>
                         <p>Sekolah</p>
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
                     <li class="nav-item" id="nav-master-hewan">
                         <a href="{{ url('master-data/hewan') }}">
                             <i class="fas fa-paw"></i>
                             <p>Hewan Ternak</p>
                         </a>
                     </li>
                     <li class="nav-item" id="nav-master-tahun">
                         <a href="{{ url('master-data/tahun') }}">
                             <i class="far fa-calendar-alt"></i>
                             <p>Tahun</p>
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
