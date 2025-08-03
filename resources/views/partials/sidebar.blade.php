 <!-- [ Sidebar Menu ] start -->
 <style>
   .logo {
     font-family: 'Poppins', sans-serif;
     font-weight: 700;
     font-size: 28px;
     color: #007bff;
     /* Warna biru modern */
     text-decoration: none;
     letter-spacing: 1px;
     position: relative;
     display: inline-block;
     transition: all 0.3s ease;
   }

   .logo::after {
     content: "";
     position: absolute;
     left: 0;
     bottom: -6px;
     width: 40%;
     height: 3px;
     background: #007bff;
     border-radius: 3px;
     transition: width 0.3s ease;
   }

   .logo:hover::after {
     width: 100%;
   }

   .logo:hover {
     text-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
   }

   .m-header {
     padding: 15px 20px;
     background-color: #f8f9fa;
     /* Warna latar belakang header */
     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
   }
 </style>

 <nav class="pc-sidebar">
   <div class="navbar-wrapper">
     <div class="m-header">
       <a href="/dashboard" class="b-brand text-primary">
         Simantri
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

         <x-sidebar-menu
           menuTitle="Master employee"
           menuIcon="ti ti-map"
           :submenu="[
                  ['text' => 'Areas', 'url' => '/areas'],
                  ['text' => 'Departements', 'url' => '/departements'],
                  ['text' => 'Division', 'url' => '/divisions'],
                  ['text' => 'Work place', 'url' => '/work_places'],
              ]" />

         <x-sidebar-menu l
           menuTitle="Master asset"
           menuIcon="ti ti-package"
           :submenu="[
                  ['text' => 'Brands', 'url' => '/brands'],
                  ['text' => 'Categories', 'url' => '/categories'],
                  ['text' => 'Type', 'url' => '/types'],
                  ['text' => 'Location', 'url' => '/locations']
              ]" />

         <li class="pc-item pc-caption">
           <label>Operation</label>
           <i class="ti ti-news"></i>
         </li>

         <x-sidebar-menu
           menuTitle="Production"
           menuIcon="ti ti-layout"
           :submenu="[
              ['text' => 'FG Schedule', 'url' => '/finish_good_schedules'],
              ['text' => 'WIP Schedule', 'url' => '/wip_schedules'],
              ['text' => 'Operators', 'url' => '/operators'],
              ['text' => 'Production report', 'url' => '/production_reports'],
          ]" />

         <x-sidebar-menu
           menuTitle="Maintenance"
           menuIcon="ti ti-bolt"
           :submenu="[
              ['text' => 'MTC Asset', 'url' => '/maintenances'],
          ]" />
       </ul>
     </div>
   </div>
 </nav>
 <!-- [ Sidebar Menu ] end -->