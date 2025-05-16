<x-layout>
    <x-breadcrumb title="Edit Division" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit Division</h5>
              </div>
              <div class="card-body">
                @include('divisions._form', [
                    'action' => route('divisions.update', $division),
                    'method' => 'PUT',
                    'division' => $division,
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