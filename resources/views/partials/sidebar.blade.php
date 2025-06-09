 <!-- [ Sidebar Menu ] start -->
 <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="../dashboard/index.html" class="b-brand text-primary">
          ALITA V2
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
              ]" 
          />

          <x-sidebar-menu l
              menuTitle="Master asset" 
              menuIcon="ti ti-package" 
              :submenu="[
                  ['text' => 'Brands', 'url' => '/brands'],
                  ['text' => 'Categories', 'url' => '/categories'],
                  ['text' => 'Type', 'url' => '/types'],
                  ['text' => 'Location', 'url' => '/locations']
              ]" 
          />

          <li class="pc-item pc-caption">
            <label>Information Technology</label>
            <i class="ti ti-news"></i>
          </li>

          <x-sidebar-menu 
            menuTitle="IT support" 
            menuIcon="ti ti-bolt" 
            :submenu="[
                ['text' => 'IT Asset', 'url' => '#itAsset'],
            ]" 
            />

          <li class="pc-item pc-caption">
            <label>HR & GA</label>
            <i class="ti ti-news"></i>
          </li>

          <x-sidebar-menu 
          menuTitle="General affair" 
          menuIcon="ti ti-ruler" 
          :submenu="[
              ['text' => 'GA Asset', 'url' => '#gaassets'],
          ]" 
          />

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
              ['text' => 'Report', 'url' => '#report']
          ]" 
          />

          <x-sidebar-menu 
          menuTitle="Maintenance" 
          menuIcon="ti ti-bolt" 
          :submenu="[
              ['text' => 'MTC Asset', 'url' => '/maintenances'],
          ]" 
          />
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- [ Sidebar Menu ] end -->