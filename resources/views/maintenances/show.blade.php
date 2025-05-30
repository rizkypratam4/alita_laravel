<style>
    .search-box {
      position: relative;
      max-width: 300px;
    }
  
    .search-box .form-control {
      padding-left: 2rem;
    }
  
    .search-box .search-icon {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #999;
    }
  
    .search-box .search-icon svg {
      width: 14px;
      height: 14px;
    }
</style>
  
  <x-layout>
    <div class="d-flex align-items-center justify-content-between">
      <x-breadcrumb :title="'Maintenance assets'" />
    </div>

    <div class="row">
        <div class="col-md-3 col-xl-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail asset</h5>
                </div>
                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#spesifikasi" role="tab">
                        Specification
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#asset" role="tab">
                        Last Mutasi
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="spesifikasi" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between px-4">
                            <h5 class="card-title">{{ $maintenance->name }}</h5>
                            <a class="" href="{{ route('maintenances.specification', $maintenance->id )}}" style="color: black; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                                <i class="fas fa-plus-circle"></i> New spesifikasi
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 image px-3">
                                    @if (!empty($maintenance->image))
                                        <img src="{{ asset($maintenance->image) }}" class="img-fluid rounded me-2 mb-2" alt="Asset Image">
                                    @else
                                        <img src="https://picsum.photos/id/48/5000/3333" class="img-fluid rounded mb-2" alt="Default Image">
                                    @endif
                                </div>

                                <div class="col-12 col-md-6">
                                    <h1 class="card-title fs-5">{{ strtoupper($maintenance->name) }}</h1>
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th style="width:40%;">Specification</th>
                                                <th style="width:25%">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tanggal Perolehan</td>
                                                <td>{{ $maintenance->tanggal_perolehan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Serial Number</td>
                                                <td>{{ $maintenance->serial_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Asset</td>
                                                <td>{{ $maintenance->kode_asset }}</td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>{{ $maintenance->brand->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                @if ($maintenance->tanggal_perolehan)
                                                    @php
                                                        $start = \Carbon\Carbon::parse($maintenance->tanggal_perolehan);
                                                        $end = \Carbon\Carbon::now();
                                                        $diff = $start->diff($end);
                                                    @endphp
                                                    <td>
                                                        {{ $diff->y > 0 ? $diff->y . ' Tahun' : '' }}
                                                        {{ $diff->m > 0 ? $diff->m . ' Bulan' : '' }}
                                                        {{ $diff->d > 0 ? $diff->d . ' Hari' : '' }}
                                                    </td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                        <div class="col-12 keterangan">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    {{-- Kosong sesuai template --}}
                                </thead>
                                <tbody>
                                    @if ($maintenance->machineSpecifications->isNotEmpty())
                                        @foreach ($maintenance->machineSpecifications as $spec)
                                            <tr>
                                                <td>{{ $spec->name }}</td>
                                                <td>{{ $spec->value }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">No specifications available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="asset" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between px-4">
                            <h5 class="card-title">MUTASI ASSET</h5>
                            <div>
                                <a class="me-2" href="{{ route('maintenances.asset.mutation', $maintenance->id )}}" style="color: black; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                                    <i class="fas fa-plus-circle"></i> Add
                                </a>
                                <a href="{{ route('maintenances.edit.mutation', $maintenance->id) }}"
                                style="color: black; text-decoration: none; transition: color 0.3s ease;"
                                onmouseover="this.style.color='blue'" 
                                onmouseout="this.style.color='black'">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center justify-content-center">
                                    @php
                                        $last_asset_detail = $maintenance->assetMutations->last();
                                    @endphp

                                    @if ($last_asset_detail && $last_asset_detail->image)
                                        @php
                                            $imagePath = asset($last_asset_detail->image); // contoh: images/mutations/xxx.jpg
                                            $imageFullPath = public_path($last_asset_detail->image);
                                        @endphp

                                        @if (file_exists($imageFullPath) && filesize($imageFullPath) > 0)
                                            <a target="_blank" href="{{ $imagePath }}">
                                                <img src="{{ $imagePath }}" class="rounded mr-2 mb-2" style="width: 250px; height: 250px; object-fit: cover;">
                                            </a>
                                        @else
                                            <a target="_blank" href="{{ $imagePath }}">
                                                <img src="{{ $imagePath }}" class="rounded mr-2 mb-2" style="width: 250px; height: 250px; object-fit: cover;">
                                            </a>
                                        @endif
                                    @else
                                        <img src="https://picsum.photos/id/48/5000/3333" class="img-fluid rounded mb-2" />
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>User</th>
                                                <td>{{ $last_asset_detail->user->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lokasi</th>
                                                <td>{{ $last_asset_detail->location->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Departement</th>
                                                <td>{{ $last_asset_detail->user->departement->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Area</th>
                                                <td>{{ $last_asset_detail->user->workPlace->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Catatan</th>
                                                <td>{{ $last_asset_detail->note ?? '-' }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <h1 class="fs-4">History Mutasi</h1>
                    <!-- Replace the empty <div class="row mt-3"> section with this code: -->
                    <div class="row mt-3">
                        <div class="col-12">      
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>User</th>
                                            <th>Lokasi</th>
                                            <th>Departement</th>
                                            <th>Area</th>
                                            <th class="text-nowrap">Tanggal Mutasi</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($maintenance->assetMutations->sortByDesc('created_at') as $index => $mutation)
                                            <tr>
                                                <td class="text-nowrap">{{ $mutation->user->name ?? '-' }}</td>
                                                <td class="text-nowrap">{{ $mutation->location->name ?? '-' }}</td>
                                                <td class="text-nowrap">{{ $mutation->user->departement->name ?? '-' }}</td>
                                                <td class="text-nowrap">{{ $mutation->user->workPlace->name ?? '-' }}</td>
                                                <td class="text-nowrap">{{ $mutation->created_at->format('d M Y') }}</td>
                                                <td class="text-nowrap">
                                                    @if($mutation->image)
                                                        <a href="{{ asset($mutation->image) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada history mutasi</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
  new TomSelect('#selectWorkPlaces');
  new TomSelect('#selectCategories');
  new TomSelect('#selectTypes');
  new TomSelect('#selectBrands');
</script>