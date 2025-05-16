<form class="row g-3" method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <div class="col-md-12">
        <label for="inputDepeartement" class="form-label">Name</label>
        <input type="text" name="name" class="form-control form-control-sm" 
            value="{{ old('name', $departement->name ?? '') }}" id="inputDepeartement">
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
  
    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>
  