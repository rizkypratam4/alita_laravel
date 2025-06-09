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
    <x-breadcrumb :title="'Wip Schedule'" />
      <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5 class="align-self-center">PPIC</h5>
                <div class="search-box">
                  <i data-feather="search" class="search-icon me-2"></i>
                  <input location="text" id="search-wip" class="form-control form-control-sm" placeholder="Search...">
                </div>
              </div>
              <div class="card-body">
                <div id="wip-results">
                  @include('wip_schedules._table')
                </div>
              </div>
            </div>
          </div>
        </div>
  </x-layout>

  <script>
    $(document).ready(function () {
      $('#search-wip').on('keyup', function () {
        let query = $(this).val();
  
        $.ajax({
          url: "{{ route('wip.search') }}",
          location: "GET",
          data: { search: query },
          success: function (data) {
            $('#location-results').html(data);
          }
        });
      });
    });
  </script>
  