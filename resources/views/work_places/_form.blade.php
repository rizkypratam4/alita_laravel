<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <div class="select-wrapper col-md-6">
        <label for="select-areas" class="form-label">Area</label>
        <select id="select-areas" name="area_id" class="form-select">
            <option value=""></option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}" 
                    @if(old('area_id', $work_places->area_id ?? '') == $area->id) selected @endif>
                    {{ $area->name }}
                </option>
            @endforeach
        </select>
        @error('area_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="inputWorkPlaceName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control form-control-sm" 
            value="{{ old('name', $work_places->name ?? '') }}" id="inputWorkPlaceName">
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mt-3">
        <label for="inputWorkPlaceJamBuka" class="form-label">Jam buka</label>
        <input type="time" name="opening_hours" class="form-control form-control-sm" 
            value="{{ old('opening_hours', isset($work_places->opening_hours) ? \Illuminate\Support\Carbon::createFromFormat('H:i:s', $work_places->opening_hours)->format('H:i') : '') }}" 
            id="inputWorkPlaceJamBuka">
        @error('opening_hours')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    

    <div class="col-md-4 mt-3">
        <label for="inputWorkPlaceJamTutup" class="form-label">Jam tutup</label>
        <input type="time" name="closing_hours" class="form-control form-control-sm" 
            value="{{ old('closing_hours', $work_places->closing_hours ?? '') }}" id="inputWorkPlaceJamTutup">
        @error('closing_hours')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mt-3">
        <label for="inputWorkPlaceImage" class="form-label">Image</label>
        <input type="file" name="image" class="form-control form-control-sm" 
            value="{{ old('image', $work_places->image ?? '') }}" id="inputWorkPlaceImage">
        @error('image')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <h6 class="card-title fw-normal mb-0">Brand</h6>
    
    <x-checkbox-input label="Comforta" name="comforta" col="2"/>
    <x-checkbox-input label="Therapedic" name="therapedic" col="2" />
    <x-checkbox-input label="Springair" name="spring_air" col="2"/>
    <x-checkbox-input label="Superfit" name="super_fit" col="2"/>
    <x-checkbox-input label="Isleep" name="isleep" col="2"/>
    <x-checkbox-input label="Sleep Spa" name="sleep_spa" col="2"/>
    
    <h6 class="card-title fw-normal mb-0 mt-3">Work Place Category</h6>
    
    <x-radio-input label="Office" name="category" value="OFFICE" />
    <x-radio-input label="Pabrik" name="category" value="PABRIK" />
    <x-radio-input label="Sleep Center" name="category" value="SLEEP CENTER" />
    <x-radio-input label="Hotel" name="category" value="HOTEL"/>
    <x-radio-input label="Massindo Fair" name="category" value="MASSINDO FAIR" />
    <x-radio-input label="Dealer" name="category" value="DEALER" />
    <x-radio-input label="Modern Market" name="category" value="MODERN MARKET" />
    <x-radio-input label="Pameran" name="category" value="PAMERAN"/>
    <x-radio-input label="Supplier" name="category" value="SUPPLIER" col="6" />
    <x-radio-input label="Dll" name="category" col="6" value="DLL" />
  

    <div class="mb-3">
        <label for="inputWorkPlaceAddress" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="inputWorkPlaceAddress" style="height: 100px;">{{ old('address', $work_places->address ?? '') }}</textarea>
        @error('address')
         <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>
   
<script>
    new TomSelect('#select-areas');
</script>