<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <div class="col-12">
        <input type="text" name="item_number" class="form-control form-control-sm" 
            value="{{ old('item_number', $finish_good_schedules->item_number ?? '') }}" id="inputItemNumber">
            <small class="form-text text-muted" for="validationItemNumber">Item Number</small>
        @error('item_number')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <input type="text" name="name" class="form-control form-control-sm" 
            value="{{ old('name', $finish_good_schedules->name ?? '') }}" id="inputItemNumber">
            <small class="form-text text-muted" for="validationItemNumber">Nama barang 1</small>
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <input type="text" name="keterangan" class="form-control form-control-sm" 
            value="{{ old('keterangan', $finish_good_schedules->keterangan ?? '') }}" id="inputItemNumber">
            <small class="form-text text-muted" for="validationItemNumber">Nama barang 2</small>
        @error('keterangan')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <input type="number" name="quantity" class="form-control form-control-sm" 
            value="{{ old('quantity', $finish_good_schedules->quantity ?? '') }}" id="inputItemNumber">
            <small class="form-number number-muted" for="validationItemNumber">Quantity</small>
        @error('quantity')
            <div class="number-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <select name="priority" id="validationPriority1" class="form-control @error('priority') is-invalid @enderror" required>
            <option value=""></option>
            <option value="5" {{ old('priority', $finish_good_schedules->priority ?? '') == 5 ? 'selected' : '' }}>Perorangan</option>
            <option value="4" {{ old('priority', $finish_good_schedules->priority ?? '') == 4 ? 'selected' : '' }}>Luar Kota</option>
            <option value="3" {{ old('priority', $finish_good_schedules->priority ?? '') == 3 ? 'selected' : '' }}>Normal</option>
            <option value="2" {{ old('priority', $finish_good_schedules->priority ?? '') == 2 ? 'selected' : '' }}>Urgent</option>
            <option value="1" {{ old('priority', $finish_good_schedules->priority ?? '') == 1 ? 'selected' : '' }}>Top Urgent</option>
        </select>
        <small class="form-text text-muted" for="validationPriority">Priority</small>
        @error('priority')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>