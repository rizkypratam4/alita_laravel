<x-layout>
    <x-breadcrumb title="Create Wip Schedule" />
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif

      <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Wip Schedule</h5>
              </div>
              <div class="card-body">
                @include('wip_schedules._form', [
                    'action' => route('wip_schedules.store'),
                    'method' => 'POST',
                ])
              </div>
            </div>
          </div>
        </div>
  </x-layout>
  
  <script>
    var settings = {
        create: true,
        sortField: {
        field: "text",
        direction: "asc"
        }
    };
    new TomSelect('#validationPriority1', settings);
    new TomSelect('#validationKategori1', settings);
  </script>