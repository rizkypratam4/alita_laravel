<x-layout>
    <x-breadcrumb title="Create Maintenance Asset" />
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif

      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Maintenance Asset</h5>
              </div>
              <div class="card-body">
                @include('maintenances._form', [
                    'action' => route('maintenances.store'),
                    'method' => 'POST',
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