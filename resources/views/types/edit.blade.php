<x-layout>
    <x-breadcrumb title="Edit types" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit Type</h5>
              </div>
              <div class="card-body">
                @include('types._form', [
                    'action' => route('types.update', $type),
                    'method' => 'PUT',
                    'type' => $type,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
