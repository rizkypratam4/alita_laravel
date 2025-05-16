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
    .new-workplace-link {
      color: black; /* Default color */
      text-decoration: none; /* Remove underline */
      transition: color 0.3s ease; /* Smooth transition effect */
    }

    .new-workplace-link:hover {
      color: blue; /* Change color to blue on hover */
    }

</style>
  
  <x-layout>
    <div class="d-flex align-items-center justify-content-between">
      <x-breadcrumb :title="'Work place'" />
      <a class="" href="{{ route('work_places.create') }}" style="color: black; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
        <i class="fas fa-plus-circle"></i> New work place
      </a>
    </div>
    
      <div class="row mt-3">
          <!-- [ area-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Search Work Place</h5>
              </div>
          <form method="GET" action="{{ route('work_places.index') }}">

            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <label for="formGroupExampleInput" class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter[name]" value="{{ request('filter.name') }}" 
                  placeholder="Search work place" aria-label="First name">
                </div>
                <div class="col-4">
                  <label for="formGroupExampleInput" class="form-label">Area</label>
                  <select id="select-areas" name="filter[area_id]" class="form-select">
                    <option value=""></option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ request('fileter.area_id') == $area->id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label for="formGroupExampleInput" class="form-label">Kategori</label>
                  <select id="select-category" class="form-select" name="filter[category]" 
                  aria-label="Default select example">
                    <option value=""></option>
                    <option value="OFFICE" {{ request('filter.category') == 'OFFICE' ? 'selected' : '' }}>OFFICE</option>
                    <option value="PABRIK" {{ request('filter.category') == 'PABRIK' ? 'selected' : '' }}>PABRIK</option>
                    <option value="SLEEP CENTER" {{ request('filter.category') == 'SLEEP CENTER' ? 'selected' : '' }}>SLEEP CENTER</option>
                    <option value="HOTEL" {{ request('filter.category') == 'HOTEL' ? 'selected' : '' }}>HOTEL</option>
                    <option value="MASSINDO FAIR" {{ request('filter.category') == 'MASSINDO FAIR' ? 'selected' : '' }}>MASSINDO FAIR</option>
                    <option value="DEALER" {{ request('filter.category') == 'DEALER' ? 'selected' : '' }}>DEALER</option>
                    <option value="MODERN MARKET" {{ request('filter.category') == 'MODERN MARKET' ? 'selected' : '' }}>MODERN MARKET</option>
                    <option value="PAMERAN" {{ request('filter.category') == 'PAMERAN' ? 'selected' : '' }}>PAMERAN</option>
                    <option value="SUPPLIER" {{ request('filter.category') == 'SUPPLIER' ? 'selected' : '' }}>SUPPLIER</option>
                    <option value="DLL" {{ request('filter.category') == 'DLL' ? 'selected' : '' }}>DLL</option>
                  </select>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
              </div>
            </div>

          </form>
            
          </div>
            @include('work_places._place')
          </div>
          <!-- [ departement-page ] end -->
        </div>
  </x-layout>
  
  <script>
    new TomSelect('#select-areas');
    new TomSelect('#select-category');
  </script>
  
