<div class="mb-3">
    <input type="password" name="current_password" class="form-control form-control-sm" id="inputPasswordBaru">
    <small class="text-muted">Password saat ini</small>
    @error('current_password')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <input type="password" name="new_password" class="form-control form-control-sm" id="inputPasswordBaru">
    <small class="text-muted">Password baru</small>
    @error('new_password')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <input type="password" name="new_password_confirmation" class="form-control form-control-sm" id="inputPasswordBaru">
    <small class="text-muted">Konfirmasi Password baru</small>
</div>
