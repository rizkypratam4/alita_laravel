<style>
  .search-box {
    position: relative;
    max-width: 300px;
  }

  .search-box .form-control {
    padding-left: 2rem;
  }

  .search-box .search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #999;
  }

  .search-box .search-icon svg {
    width: 14px;
    height: 14px;
  }
</style>


<x-layout>
  <x-breadcrumb :title="'Areas'" />
    <div class="row">
        <!-- [ area-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>New Area</h5>
            </div>
            <div class="card-body">
              @include('areas._form', [
                'action' => route('areas.store'),
                'method' => 'POST',
                'area' => null,
              ])
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h5 class="align-self-center">All Area</h5>
              <div class="search-box">
                <i data-feather="search" class="search-icon me-2"></i>
                <input type="text" id="search" class="form-control form-control-sm" placeholder="Search...">
              </div>
            </div>
            <div class="card-body">
              <div id="area-results">
                @include('areas._table')
              </div>
            </div>
          </div>
        </div>
        <!-- [ area-page ] end -->
      </div>
</x-layout>

<script>
  $(document).ready(function () {
    $('#search').on('keyup', function () {
      let query = $(this).val();

      $.ajax({
        url: "{{ route('areas.search') }}",
        type: "GET",
        data: { search: query },
        success: function (data) {
          $('#area-results').html(data);
        }
      });
    });
  });
</script>
