<form class="row g-3" method="POST" action="{{ $action }}">
  @csrf
  @if($method === 'PUT')
      @method('PUT')
  @endif

  <div class="col-md-6">
      <label for="inputCode" class="form-label">Code</label>
      <input type="text" name="code" class="form-control form-control-sm" 
          value="{{ old('code', $area->code ?? '') }}" id="inputCode">
      @error('code')
          <div class="text-danger mt-2">{{ $message }}</div>
      @enderror
  </div>

  <div class="col-md-6">
      <label for="inputArea" class="form-label">Name</label>
      <input type="text" name="name" class="form-control form-control-sm" 
          value="{{ old('name', $area->name ?? '') }}" id="inputArea">
      @error('name')
          <div class="text-danger mt-2">{{ $message }}</div>
      @enderror
  </div>

  <div class="mt-4">
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  </div>
</form>
