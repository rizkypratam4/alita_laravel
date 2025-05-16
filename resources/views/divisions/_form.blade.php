<form class="row g-3" method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
  
    <div class="select-wrapper col-md-6">
        <label for="select-departements" class="form-label">Departement</label>
        <select id="select-departements" name="departement_id" class="form-select">
            <option value=""></option>
            @foreach($departements as $departement)
                <option value="{{ $departement->id }}" 
                    @if(old('departement_id', $division->departement_id ?? '') == $departement->id) selected @endif>
                    {{ $departement->name }}
                </option>
            @endforeach
        </select>
        @error('departement_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-6">
        <label for="inputDivision" class="form-label">Name</label>
        <input type="text" name="name" class="form-control form-control-sm" 
            value="{{ old('name', $division->name ?? '') }}" id="inputDivision">
        @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
  
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>
   
