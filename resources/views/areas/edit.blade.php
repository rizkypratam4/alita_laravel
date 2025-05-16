<x-layout>
  <x-breadcrumb title="Edit Area" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit Area</h5>
              </div>
              <div class="card-body">
                @include('areas._form', [
                    'action' => route('areas.update', $area),
                    'method' => 'PUT',
                    'area' => $area,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
  