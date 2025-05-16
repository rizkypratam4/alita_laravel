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
    <x-breadcrumb :title="'Brands'" />
      <div class="row">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>New brand</h5>
              </div>
              <div class="card-body">
                @include('brands._form', [
                  'action' => route('brands.store'),
                  'method' => 'POST',
                  'brand' => null,
                ])
              </div>
            </div>
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5 class="align-self-center">All brand</h5>
                <div class="search-box">
                  <i data-feather="search" class="search-icon me-2"></i>
                  <input type="text" id="search-brands" class="form-control form-control-sm" placeholder="Search...">
                </div>
              </div>
              <div class="card-body">
                <div id="brand-results">
                  @include('brands._table')
                </div>
              </div>
            </div>
          </div>
          <!-- [ brand-page ] end -->
        </div>
  </x-layout>
  
  <script>
    $(document).ready(function () {
      $('#search-brands').on('keyup', function () {
        let query = $(this).val();
  
        $.ajax({
          url: "{{ route('brands.search') }}",
          type: "GET",
          data: { search: query },
          success: function (data) {
            $('#brand-results').html(data);
          }
        });
      });
    });
  </script>
  