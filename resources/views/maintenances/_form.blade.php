<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <input type="hidden" name="departement_id" value="2">

    <div class="col-md-6">
        <label for="formGroupExampleInput" class="form-label">Nama asset</label>
        <input type="text" class="form-control mb-3" name="name" aria-label="First name" 
            value="{{ old('name', $asset->name ?? '') }}">
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="formGroupExampleInput" class="form-label">Tanggal perolehan</label>
        <input type="date" class="form-control mb-3" name="tanggal_perolehan" aria-label="First name" 
            value="{{ old('tanggal_perolehan', $asset->name ?? '') }}">
        @error('tanggal_perolehan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Supplier</label>
        <input type="text" class="form-control mb-3" name="supplier" aria-label="First name"
            value="{{ old('supplier', $asset->supplier ?? '') }}">
        @error('supplier')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Serial number</label>
        <input type="text" class="form-control mb-3" name="serial_number" aria-label="First name" 
            value="{{ old('serial_number', $asset->serial_number ?? '') }}">
        @error('serial_number')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Kode Asset</label>
        <input type="text" class="form-control mb-3" name="kode_asset" aria-label="First name" 
            value="{{ old('kode_asset', $asset->kode_asset ?? '') }}">
        @error('kode_asset')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Harga</label>
        <input type="text" class="form-control mb-3" name="harga" aria-label="First name" 
            value="{{ old('harga', $asset->harga ?? '') }}">
        @error('harga')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Capacity</label>
        <input type="text" class="form-control mb-3" name="kapasitas" aria-label="First name" 
            value="{{ old('kapasitas', $asset->kapasitas ?? '') }}">
        @error('kapasitas')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Brand</label>
        <select id="selectBrands" name="brand_id" class="form-select mb-3" 
            value="{{ old('brand_id', $asset->brand_id ?? '') }}">
          <option value=""></option>
          @foreach($brands as $brand)
              <option value="{{ $brand->id }}" 
                    @if(old('brand_id', $asset->brand_id ?? '') == $brand->id) selected @endif>
                    {{ $brand->name }}
              </option>
          @endforeach
        </select>
        @error('brand_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label">Area</label>
        <select id="selectWorkPlaces" name="work_place_id" class="form-select">
          <option value=""></option>
          @foreach($workPlaces as $workPlace)
              <option value="{{ $workPlace->id }}" 
                @if(old('work_place_id', $asset->work_place_id ?? '') == $workPlace->id) selected @endif>
                {{ $workPlace->name }}
              </option>
          @endforeach
        </select>
        @error('work_place_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-4">
        <label for="formGroupExampleInput" class="form-label">Jenis asset</label>
        <select id="selectCategories" name="category_id" class="form-select">
          <option value=""></option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}" 
                @if(old('category_id', $asset->category_id ?? '') == $category->id) selected @endif>
                {{ $category->name }}
              </option>
          @endforeach
        </select>
        @error('category_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-4">
        <label for="formGroupExampleInput" class="form-label">Detail asset</label>
        <select id="selectTypes" name="type_id" class="form-select">
          <option value=""></option>
          @foreach($types as $type)
              <option value="{{ $type->id }}" 
                    @if(old('type_id', $asset->type_id ?? '') == $type->id) selected @endif>
                  {{ $type->name }}
              </option>
          @endforeach
        </select>
        @error('type_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-2">
        <label for="inputKeterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="inputKeterangan" style="height: 100px;" 
            value="{{ old('keterangan', $asset->keterangan ?? '') }}"></textarea>
        @error('keterangan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <input type="file" name="image" class="form-control form-control-sm" id="inputWorkPlaceImage" 
            value="{{ old('image', $asset->image ?? '') }}">
        @error('image')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <x-checkbox-input label="In active" name="status" col="6"/>
    @error('status')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror

    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>
   
<script>
    new TomSelect('#selectBrands');
    new TomSelect('#selectWorkPlaces');
    new TomSelect('#selectCategories');
    new TomSelect('#selectTypes');
</script>