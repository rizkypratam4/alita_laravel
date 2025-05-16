<x-layout>
    <x-breadcrumb title="Edit locations" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit location</h5>
              </div>
              <div class="card-body">
                @include('locations._form', [
                    'action' => route('locations.update', $location),
                    'method' => 'PUT',
                    'location' => $location,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
