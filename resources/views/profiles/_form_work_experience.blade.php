<style>
    select.form-select:disabled {
        color: black !important; /* Pastikan teks tetap hitam meskipun disabled */
        background-color: #f8f9fa !important; /* Set warna latar belakang agar tetap terang */
        opacity: 1 !important; /* Pastikan tidak pudar */
        pointer-events: none; /* Mencegah interaksi meski dalam keadaan disabled */
    }
</style>

<div class="col-md-12">
    <label for="inputJobTitle" class="form-label">Job title</label>
    <input type="text" name="job_title" class="form-control form-control-sm" 
        value="{{ $user->job_title ?? '-' }}" id="inputJobTitle" {{ !$isEdit ? 'disabled' : '' }}>
</div>

<div class="col-md-12 mt-3">
    <label for="select-areas" class="form-label">Area</label>
    <select id="select-areas" name="area_id" class="form-select" {{ !$isEdit ? 'disabled' : '' }}>
        <option value=""></option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}" 
                {{ old('area_id', $user->area_id) == $area->id ? 'selected' : '' }}>
                {{ $area->name }}
            </option>
        @endforeach
    </select>
    @error('area_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-12 mt-3">
    <label for="select-departement" class="form-label">Departement</label>
    <select id="select-departement" name="departement_id" class="form-select" {{ !$isEdit ? 'disabled' : '' }}>
        <option value=""></option>
        @foreach($departements as $departement)
            <option value="{{ $departement->id }}" 
                {{ old('departement_id', $user->departement_id) == $departement->id ? 'selected' : '' }}>
                {{ $departement->name }}
            </option>
        @endforeach
    </select>
    @error('departement_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-12 mt-3">
    <label for="select-workplace" class="form-label">Work place</label>
    <select id="select-workplace" name="work_place_id" class="form-select" {{ !$isEdit ? 'disabled' : '' }}>
        <option value=""></option>
        @foreach($work_places as $place)
            <option value="{{ $place->id }}" 
                {{ old('work_place_id', $user->work_place_id) == $place->id ? 'selected' : '' }}>
                {{ $place->name }}
            </option>
        @endforeach
    </select>
    @error('work_place_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>


<div class="col-md-12 mt-3">
    <label for="select-division" class="form-label">Division</label>
    <select id="select-division" name="division_id" class="form-select" {{ !$isEdit ? 'disabled' : '' }}>
        <option value=""></option>
        @foreach($divisions as $division)
            <option value="{{ $division->id }}" 
                {{ old('division_id', $user->division_id) == $division->id ? 'selected' : '' }}>
                {{ $division->name }}
            </option>
        @endforeach
    </select>
    @error('division_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

{{-- Tombol Edit --}}
@if (!$isEdit)
    <div class="mt-4">
        <a href="{{ route('profiles.edit.work', $user->username) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
@endif

{{-- Tom Select init --}}
<script>
    new TomSelect('#select-areas');
    new TomSelect('#select-departement');
    new TomSelect('#select-workplace');
    new TomSelect('#select-division');
</script>
