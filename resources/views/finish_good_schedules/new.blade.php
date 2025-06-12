<x-layout>
    <x-breadcrumb title="Create Finish Good Schedule" />
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif

      <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Finish Good</h5>
              </div>
              <div class="card-body">
                @include('finish_good_schedules._form', [
                    'action' => route('finish_good_schedules.store'),
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
  </script>