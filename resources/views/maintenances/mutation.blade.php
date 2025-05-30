
<x-layout>
    <x-breadcrumb title="Add Mutasi" />
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
                <h5>Add Mutasi {{ $maintenance->name }}</h5>
                <div class="col-md-2 d-flex align-items-center gap-2 mt-4">
            </div>
              </div>
              <div class="card-body">
                @include('maintenances._form_mutation', [
                    'action' => route('maintenances.store.mutation', $maintenance->id),
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
