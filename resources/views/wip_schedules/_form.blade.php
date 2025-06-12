<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <div class="col-12">
        <input type="text" name="name" class="form-control form-control-sm" 
            value="{{ old('name', $wip_schedules->name ?? '') }}" id="inputItemNumber">
            <small class="form-text text-muted" for="validationItemNumber">Nama WIP</small>
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <input type="text" name="qty" class="form-control form-control-sm" 
            value="{{ old('qty', $wip_schedules->qty ?? '') }}" id="inputItemNumber">
            <small class="form-text text-muted" for="validationItemNumber">Quantity</small>
        @error('qty')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <select name="priority" id="validationPriority1" class="form-control @error('priority') is-invalid @enderror" required>
            <option value=""></option>
            <option value="5" {{ old('priority', $wip_schedules->priority ?? '') == 5 ? 'selected' : '' }}>Perorangan</option>
            <option value="4" {{ old('priority', $wip_schedules->priority ?? '') == 4 ? 'selected' : '' }}>Luar Kota</option>
            <option value="3" {{ old('priority', $wip_schedules->priority ?? '') == 3 ? 'selected' : '' }}>Normal</option>
            <option value="2" {{ old('priority', $wip_schedules->priority ?? '') == 2 ? 'selected' : '' }}>Urgent</option>
            <option value="1" {{ old('priority', $wip_schedules->priority ?? '') == 1 ? 'selected' : '' }}>Top Urgent</option>
        </select>
        <small class="form-text text-muted" for="validationPriority">Priority</small>
        @error('priority')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <select name="kategori" id="validationKategori1" class="form-control @error('kategori') is-invalid @enderror" required>
            <option value=""></option>
            <option value="Mattras" {{ old('kategori', $wip_schedules->kategori ?? '') == 'Mattras' ? 'selected' : '' }}>Mattras</option>
            <option value="Panel" {{ old('kategori', $wip_schedules->kategori ?? '') == 'Panel' ? 'selected' : '' }}>Panel</option>
            <option value="Border" {{ old('kategori', $wip_schedules->kategori ?? '') == 'Border' ? 'selected' : '' }}>Border</option>
            <option value="Gusset" {{ old('kategori', $wip_schedules->kategori ?? '') == 'Gusset' ? 'selected' : '' }}>Gusset</option>
            <option value="Ram" {{ old('kategori', $wip_schedules->kategori ?? '') == 'Ram' ? 'selected' : '' }}>Ram</option>
        </select>
        <small class="form-text text-muted" for="validationKategori1">kategori</small>
        @error('kategori')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>