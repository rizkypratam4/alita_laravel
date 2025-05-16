<div class="col-md-12">
    <label for="inputCompany" class="form-label">Payroll Company</label>
    <input type="text" name="company" class="form-control form-control-sm" 
        value="{{ $user->company ?? '-' }}" id="inputCompany" {{ !$isEdit ? 'disabled' : '' }}>
    @error('company')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>


@if (!$isEdit)
    <div class="col-md-12 mt-3">
        <label for="inputUserId" class="form-label">User id</label>
        <input type="text" name="id" class="form-control form-control-sm" 
            value="{{ $user->id ?? '-' }}" id="inputUserId" {{ !$isEdit ? 'disabled' : '' }}>
    </div>
@endif

<div class="col-md-12 mt-3">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="text" name="email" class="form-control form-control-sm" 
        value="{{ $user->email ?? '-' }}" id="inputEmail" {{ !$isEdit ? 'disabled' : '' }}>
    @error('email')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-12 mt-3">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="text" name="username" class="form-control form-control-sm" 
        value="{{ $user->username ?? '-' }}" id="inputUsername" {{ !$isEdit ? 'disabled' : '' }}>
    @error('username')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-12 mt-3">
    <label for="inputPhone" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control form-control-sm" 
        value="{{ $user->phone ?? '-' }}" id="inputPhone" {{ !$isEdit ? 'disabled' : '' }}>
    @error('phone')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

@if (!$isEdit)
    <div class="mt-4">
        <a href="{{ route('profiles.edit.info', $user->username) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <button type="submit" class="btn btn-warning btn-sm">
            <i class="fas fa-key"></i> Change password
        </button>
    </div>
@endif

