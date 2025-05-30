<x-layout>
    <x-breadcrumb title="Edit Maintenance Asset" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit Maintenance Asset</h5>
              </div>
              <div class="card-body">
                @include('maintenances._form', [
                    'action' => route('maintenances.update', $maintenance),
                    'method' => 'PUT',
                    'maintenance' => $maintenance,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
  
  <script>
        new TomSelect('#select-departements');
  </script>