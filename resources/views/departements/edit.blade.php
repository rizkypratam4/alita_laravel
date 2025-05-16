<x-layout>
    <x-breadcrumb title="Edit Departements" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Edit Departement</h5>
              </div>
              <div class="card-body">
                @include('departements._form', [
                    'action' => route('departements.update', $departement),
                    'method' => 'PUT',
                    'departement' => $departement,
                ])
              </div>
            </div>
          </div>
          <!-- [ area-page ] end -->
        </div>
  </x-layout>
  