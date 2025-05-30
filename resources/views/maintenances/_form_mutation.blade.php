<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <input type="hidden" name="asset_id">
    <input type="hidden" name="departement_id">
    <input type="hidden" name="work_place_id">

    {{-- Select User --}}
    <div class="select-wrapper col-12">
        <label for="select-users" class="form-label">User</label>
        <select id="select-users" name="user_id" class="form-select">
            <option value=""></option>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                    @if(old('user_id', $mutation->user_id ?? $maintenance->user_id) == $user->id) selected @endif>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    {{-- Select Location --}}
    <div class="select-wrapper col-12">
        <label for="select-locations" class="form-label">Location</label>
        <select id="select-locations" name="location_id" class="form-select">
            <option value=""></option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}"
                    @if(old('location_id', $mutation->location_id ?? $maintenance->location_id) == $location->id) selected @endif>
                    {{ $location->name }}
                </option>
            @endforeach
        </select>
        @error('location_id')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    {{-- Note --}}
    <div class="mb-3">
        <label for="inputMutationNote" class="form-label">Note</label>
        <textarea class="form-control" name="note" id="inputMutationNote" style="height: 100px;">{{ old('note', $mutation->note ?? '') }}</textarea>
        @error('note')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="col-12 mb-2">
        <label for="inputMutasiImage" class="form-label">Image</label>
        <input type="file" name="image" class="form-control form-control-sm" id="inputMutasiImage">
        @if(!empty($mutation->image))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $mutation->image) }}" width="150" alt="Mutasi Image" class="rounded shadow-sm">
            </div>
        @endif
        @error('image')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>

<script>
    new TomSelect('#select-users');
    new TomSelect('#select-locations');
</script>
