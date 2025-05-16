<x-layout>
    <x-breadcrumb title="Edit brands" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit brand</h5>
              </div>
              <div class="card-body">
                @include('brands._form', [
                    'action' => route('brands.update', $brand),
                    'method' => 'PUT',
                    'brand' => $brand,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
