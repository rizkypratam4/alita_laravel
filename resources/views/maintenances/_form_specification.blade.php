<form class="row g-3" method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <input type="hidden" name="asset_id" value="{{ $maintenance->id }}">

    <div id="spec-fields">
        <div class="row g-3 spec-row">
            <div class="col-md-6">
                <input type="text" class="form-control mb-3" name="specs[0][name]" placeholder="Name">
                @error('specs.0.name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control mb-3" name="specs[0][value]" placeholder="Value">
                @error('specs.0.value')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>
