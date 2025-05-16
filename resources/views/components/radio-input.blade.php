<div class="col-md-{{ $col ?? 3 }}">
    <div class="form-group mb-0">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input class="form-check-input mt-0" type="radio" name="{{ $name ?? '' }}" value="{{ $value ?? $label }}" aria-label="Checkbox for following text input">
          </div>
        </div>
        <input type="text" class="form-control" placeholder="{{ $label }}" disabled>
      </div>
    </div>
</div>