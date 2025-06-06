<div class="table-responsive">
    <table class="table table-striped table-bordered overflow-scroll">
        <thead>
        <tr>
            <th class="text-nowrap">Kode asset</th>
            <th class="text-nowrap">Name</th>
            <th class="text-nowrap">Jenis asset</th>
            <th class="text-nowrap">Detail asset</th>
            <th class="text-nowrap">Area asset</th>
            <th class="text-nowrap">Serial number</th>
            <th class="text-nowrap">Harga perolehan</th>
            <th class="text-nowrap">Tanggal perolehan</th>
            <th class="text-nowrap">Usia</th>
            <th class="text-nowrap">Brand</th>
            <th class="text-nowrap">Capacity</th>
            <th class="text-nowrap">Supplier</th>
            <th class="text-nowrap">Departement</th>
            <th class="text-nowrap">Creator</th>
            <th class="text-nowrap">Created at</th>
            <th class="text-nowrap">Updated at</th>
            <th class="text-nowrap">Updater</th>
            <th class="text-nowrap">Keterangan</th>
            <th class="text-center" colspan="4">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($maintenances as $maintenance)
            <tr>
            <td class="text-nowrap">{{ $maintenance->kode_asset }}</td>
            <td class="text-nowrap">{{ $maintenance->name }}</td>
            <td class="text-nowrap">{{ $maintenance->category->name }}</td>
            <td class="text-nowrap">{{ $maintenance->type->name }}</td>
            <td class="text-nowrap">{{ $maintenance->workPlace->name }}</td>
            <td class="text-nowrap">{{ $maintenance->serial_number }}</td>
            <td class="text-nowrap">{{ $maintenance->harga }}</td>
            <td class="text-nowrap">{{ $maintenance->tanggal_perolehan }}</td>
            <td class="text-nowrap">
                @if ($maintenance->tanggal_perolehan)
                    @php
                        $purchaseDate = \Carbon\Carbon::parse($maintenance->tanggal_perolehan);
                        $now = \Carbon\Carbon::now();
                        $diff = $purchaseDate->diff($now);
                    @endphp

                    @if ($diff->y > 0)
                        {{ $diff->y }} Tahun
                    @endif
                    @if ($diff->m > 0)
                        {{ $diff->m }} Bulan
                    @endif
                    @if ($diff->d > 0)
                        {{ $diff->d }} Hari
                    @endif
                @else
                    -
                @endif
            </td>
            <td class="text-nowrap">{{ $maintenance->brand->name }}</td>
            <td class="text-nowrap">{{ $maintenance->kapasitas }}</td>
            <td class="text-nowrap">{{ $maintenance->supplier }}</td>
            <td class="text-nowrap">{{ $maintenance->departement->name }}</td>
            <td class="text-nowrap">{{ $maintenance->creator->name ?? '-' }}</td>
            <td class="text-nowrap">{{ $maintenance->created_at->format('d M Y') }}</td>
            <td class="text-nowrap">{{ $maintenance->updated_at ? $maintenance->updated_at->format('d M Y') : '-' }}</td>
            <td class="text-nowrap">{{ $maintenance->updater->name ?? '-' }}</td>
            <td class="text-nowrap">{{ $maintenance->keterangan}}</td>
            <td>
            <a class="dropdown-item" href="{{ route('maintenances.edit', $maintenance->id) }}">
                <i class="fa fa-edit"></i> Edit
            </a>
            </td>
            <td>
            <a class="dropdown-item" href="{{ route('maintenances.show', $maintenance->id) }}">
                <i class="fa fa-plus-circle"></i> Add
            </a>
            </td>
            <td>
            <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST" id="delete-form-{{ $maintenance->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="dropdown-item text-danger" onclick="confirmDelete({{ $maintenance->id }})">
                <i class="fa fa-trash"></i> Delete
                </button>
            </form>
            </td>

            <td>
                <a class="dropdown-item" href="{{ route('maintenances.qrcode', $maintenance->id) }}">
                    <i class="fa fa-qrcode"></i> Qrcode
                </a>
            </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">No results found.</td></tr>  
        @endforelse
        </tbody>
    </table>
</div>
  
<div class="d-flex justify-content-end">
    {{ $maintenances->links() }}
</div>
  
<script>
function confirmDelete(maintenanceId) {
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel',
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + maintenanceId).submit();
    }
    });
}
</script>