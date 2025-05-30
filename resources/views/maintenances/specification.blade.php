<x-layout>
    <x-breadcrumb title="Create Specification" />
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
                <h5>Create {{ $maintenance->name }} Specification</h5>
                <div class="col-md-2 d-flex align-items-center gap-2 mt-4">
                <button type="button" id="add-row" class="btn btn-outline-success btn-sm rounded-pill d-flex align-items-center">
                    <i data-feather="plus"></i>
                </button>
                <button type="button" id="remove-row" class="btn btn-outline-danger btn-sm rounded-pill d-flex align-items-center remove-row">
                    <i data-feather="x"></i>
                </button>
            </div>
              </div>
              <div class="card-body">
                @include('maintenances._form_specification', [
                    'action' => route('maintenances.create.specification', $maintenance->id),
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

<script>
  let index = 1;

  document.getElementById('add-row').addEventListener('click', function () {
      const wrapper = document.createElement('div');
      wrapper.classList.add('row', 'spec-row', 'mb-3');
      wrapper.innerHTML = `
          <div class="col-md-6">
              <input type="text" class="form-control" name="specs[${index}][name]" placeholder="Name">
          </div>
          <div class="col-md-6">
              <input type="text" class="form-control" name="specs[${index}][value]" placeholder="Value">
          </div>
      `;
      document.getElementById('spec-fields').appendChild(wrapper);
      index++;
  });

  document.getElementById('remove-row').addEventListener('click', function () {
      const specFields = document.getElementById('spec-fields');
      const rows = specFields.querySelectorAll('.spec-row');
      if (rows.length > 1) {
          rows[rows.length - 1].remove();
          index--;
      }
  });
</script>
