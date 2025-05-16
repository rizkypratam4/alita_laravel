<div class="row">
  @foreach ($work_places as $work_place)
  <div class="col-md-3 mb-4 d-flex">
    <div class="card shadow-sm border-0 flex-fill" style="border-radius: 0; min-height: 500px; display: flex; flex-direction: column;">
      
      @if($work_place->image)
        <img src="{{ asset('storage/' . $work_place->image) }}" class="card-img-top" alt="{{ $work_place->name }}" style="height: 200px; object-fit: cover;">
      @else
        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
      @endif

      <div class="card-header text-center">
        <h5 class="card-title">{{ $work_place->name }}</h5>
      </div>

      <div class="card-body d-flex flex-column">
  
        <div class="row text-center mb-4">
          
          <div class="col-4 d-flex flex-column align-items-center justify-content-center">
            <i data-feather="map-pin" class="text-primary" style="width: 24px; height: 24px;"></i>
            <small class="mt-1">{{ $work_place->area?->name ?? '-' }}</small>
          </div>
          <div class="col-4 d-flex flex-column align-items-center justify-content-center">
            <i data-feather="clock" class="text-warning" style="width: 24px; height: 24px;"></i>
            <small class="mt-1">
              {{ $work_place->opening_hours ? \Carbon\Carbon::parse($work_place->opening_hours)->format('H:i') : '-' }}
              -
              {{ $work_place->closing_hours ? \Carbon\Carbon::parse($work_place->closing_hours)->format('H:i') : '-' }}
            </small>
          </div>
          <div class="col-4 d-flex flex-column align-items-center justify-content-center">
            <i data-feather="tag" class="text-muted" style="width: 24px; height: 24px;"></i>
            <small class="mt-1">{{ $work_place->category ?? '-' }}</small>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-3 mb-3">
          @if($work_place->comforta)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-primary" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Comforta</small>
            </div>
          @endif
          @if($work_place->therapedic)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-success" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Therapedic</small>
            </div>
          @endif
          @if($work_place->spring_air)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-warning" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Spring Air</small>
            </div>
          @endif
          @if($work_place->super_fit)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-info" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Super Fit</small>
            </div>
          @endif
          @if($work_place->isleep)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-danger" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Isleep</small>
            </div>
          @endif
          @if($work_place->sleep_spa)
            <div class="d-flex flex-column align-items-center">
              <i data-feather="check-circle" class="text-secondary" style="width: 20px; height: 20px;"></i>
              <small class="text-muted" style="font-size: 10px;">Sleep Spa</small>
            </div>
          @endif
        </div>
      </div>

      <div class="card-footer">
        <div class="d-flex justify-content-center align-items-center gap-2 small text-muted">
          <div class="d-flex align-items-center gap-1">
            <i data-feather="user" style="width: 16px; height: 16px;"></i>
            <span>{{ $work_place->creator?->name ?? '-' }}</span>
          </div>
          <span>•</span>
          <div class="d-flex align-items-center gap-1">
            <i data-feather="calendar" style="width: 16px; height: 16px;"></i>
            <span>{{ $work_place->created_at->format('d M Y') }}</span>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endforeach
</div>

<div class="d-flex justify-content-center">
  {{ $work_places->links() }}
</div>
