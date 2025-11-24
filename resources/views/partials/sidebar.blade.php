 <!-- [ Sidebar Menu ] start -->
 <style>
     .m-header {
         display: flex;
         align-items: center;
         padding: 12px 16px;
         transition: all 0.3s ease;
         border-radius: 8px;
         margin: 8px 12px;
         gap: 10px;
         font-family: 'Segoe UI', 'Roboto', sans-serif;
     }

     .m-header:hover {
         background-color: rgba(59, 130, 246, 0.1);
         /* Biru soft */
         transform: translateY(-1px);
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
     }

     /* Logo Gambar */
     .logo-img {
         width: 32px;
         height: 32px;
         object-fit: contain;
         border-radius: 6px;
         background: #fff;
         padding: 4px;
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
         transition: transform 0.2s ease;
     }

     .m-header:hover .logo-img {
         transform: scale(1.05);
     }

     /* Teks Logo */
     .logo-text {
         font-size: 15px;
         font-weight: 600;
         color: #1e40af;
         /* Biru modern */
         text-decoration: none;
         letter-spacing: -0.3px;
         white-space: nowrap;
         transition: color 0.2s ease;
     }

     .m-header:hover .logo-text {
         color: #1e3a8a;
     }

     /* Optional: Jika sidebar collapsible (hanya icon) */
     .sidebar-collapsed .logo-text {
         display: none;
     }

     .sidebar-collapsed .m-header {
         justify-content: center;
         padding: 12px;
     }

     .sidebar-collapsed .logo-img {
         width: 36px;
         height: 36px;
     }
 </style>

 <nav class="pc-sidebar">
     <div class="navbar-wrapper">
         <div class="m-header">
             <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo-img">
             <a href="/dashboard" class="b-brand logo-text">
                 Production Tracking
             </a>
         </div>
         <div class="navbar-content">
             <ul class="pc-navbar">
                 <li class="pc-item">
                     <a href="/dashboard" class="pc-link">
                         <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                         <span class="pc-mtext">Dashboard</span>
                     </a>
                 </li>

                 <li class="pc-item pc-caption">
                     <label>Master Data</label>
                     <i class="ti ti-dashboard"></i>
                 </li>

                 <x-sidebar-menu menuTitle="Master employee" menuIcon="ti ti-map" :submenu="[
                     ['text' => 'Areas', 'url' => '/areas'],
                     ['text' => 'Departements', 'url' => '/departements'],
                     ['text' => 'Division', 'url' => '/divisions'],
                     ['text' => 'Work place', 'url' => '/work_places'],
                 ]" />

                 <x-sidebar-menu l menuTitle="Master asset" menuIcon="ti ti-package" :submenu="[
                     ['text' => 'Brands', 'url' => '/brands'],
                     ['text' => 'Categories', 'url' => '/categories'],
                     ['text' => 'Type', 'url' => '/types'],
                     ['text' => 'Location', 'url' => '/locations'],
                 ]" />

                 <li class="pc-item pc-caption">
                     <label>Operation</label>
                     <i class="ti ti-news"></i>
                 </li>

                 <x-sidebar-menu menuTitle="Production" menuIcon="ti ti-layout" :submenu="[
                     ['text' => 'FG Schedule', 'url' => '/finish_good_schedules'],
                     ['text' => 'WIP Schedule', 'url' => '/wip_schedules'],
                     ['text' => 'Operators', 'url' => '/operators'],
                     ['text' => 'Production report', 'url' => '/production_reports'],
                 ]" />

                 <x-sidebar-menu menuTitle="Maintenance" menuIcon="ti ti-bolt" :submenu="[['text' => 'MTC Asset', 'url' => '/maintenances']]" />
             </ul>
         </div>
     </div>
 </nav>
 <!-- [ Sidebar Menu ] end -->
