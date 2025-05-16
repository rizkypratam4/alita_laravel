<x-layout>
    <x-breadcrumb title="Create Work Place" />
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
                <h5>Work Place</h5>
              </div>
              <div class="card-body">
                @include('work_places._form', [
                    'action' => route('work_places.store'),
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