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
    <div class="d-flex align-items-center justify-content-between mt-2">
      <x-breadcrumb :title="'Maintenance assets'" />
      <a class="" href="{{ route('maintenances.create') }}" style="color: black; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
        <i class="fas fa-plus-circle"></i> New asset
      </a>
    </div>
    
      <div class="row mt-3">
          <!-- [ maintenance-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Search Asset</h5>
              </div>
              <form method="GET" action="{{ route('maintenances.index') }}">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Name</label>
                      <input type="text" class="form-control mb-3" name="filter[name]" value="{{ request('filter.name') }}" 
                      placeholder="Search nama asset" aria-label="First name">
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Serial number</label>
                      <input type="text" class="form-control mb-3" name="filter[serial_number]" value="{{ request('filter.serial_number') }}" 
                      placeholder="Search serial number" aria-label="serial number">
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Tanggal perolehan</label>
                      <input type="date" class="form-control mb-3" name="filter[tanggal_perolehan]" value="{{ request('filter.tanggal_perolehan') }}" 
                      placeholder="Search tanggal perolehan" aria-label="tanggal perolehan">
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Kode asset</label>
                      <input type="text" class="form-control mb-3" name="filter[kode_asset]" value="{{ request('filter.kode_asset') }}" 
                      placeholder="Search kode asset" aria-label="kode asset">
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Supplier</label>
                      <input type="text" class="form-control mb-3" name="filter[supplier]" value="{{ request('filter.supplier') }}" 
                      placeholder="Search supplier" aria-label="supplier">
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Brand</label>
                      <select id="selectBrands" name="filter[brand_id]" class="form-select mb-3">
                        <option value=""></option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" 
                                {{ request('filter.brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Area</label>
                      <select id="selectWorkPlaces" name="filter[work_place_id]" class="form-select">
                        <option value=""></option>
                        @foreach($workPlaces as $workPlace)
                            <option value="{{ $workPlace->id }}" 
                                {{ request('filter.work_place_id') == $workPlace->id ? 'selected' : '' }}>
                                {{ $workPlace->name }}
                            </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Jenis asset</label>
                      <select id="selectCategories" name="filter[category_id]" class="form-select">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ request('filter.category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-4">
                      <label for="formGroupExampleInput" class="form-label">Detail asset</label>
                      <select id="selectTypes" name="filter[type_id]" class="form-select">
                        <option value=""></option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" 
                                {{ request('filter.type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mt-3">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h5 class="align-self-center">All Asset</h5>
              </div>
              <div class="card-body">
                <div id="maintenance-results">
                   @include('maintenances._table')
                </div>
              </div>
            </div>
          </div>
          <!-- [ maintenance-page ] end -->
        </div>
  </x-layout>

<script>
  new TomSelect('#selectWorkPlaces');
  new TomSelect('#selectCategories');
  new TomSelect('#selectTypes');
  new TomSelect('#selectBrands');
</script>