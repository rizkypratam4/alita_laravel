<form action="{{ route('finish_good_schedules.delete-selected') }}" method="POST" class="ms-auto">
    @csrf
    @method('DELETE')

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 2%; white-space: nowrap;">
                        <input type="checkbox" id="select_all_fg">
                    </th>
                    <th class="text-nowrap">Item Number</th>
                    <th class="text-nowrap">Nama Barang 1</th>
                    <th class="text-nowrap">Nama Barang 2</th>
                    <th class="text-nowrap">Quantity</th>
                    <th class="text-nowrap">Priority</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finish_good_schedules as $fg)
                    <tr>
                        <td class="text-center" style="width: 2%; white-space: nowrap;">
                            <input type="checkbox" name="finish_good_schedule_ids[]" value="{{ $fg->id }}">
                        </td>
                        <td>{{ $fg->item_number }}</td>
                        <td>{{ $fg->name }}</td>
                        <td>{{ $fg->keterangan }}</td>
                        <td>{{ $fg->quantity }}</td>
                        <td>
                            @switch($fg->priority)
                                @case(1)
                                    Top Urgent
                                @break

                                @case(2)
                                    Urgent
                                @break

                                @case(3)
                                    Normal
                                @break

                                @case(4)
                                    Luar Kota
                                @break

                                @case(5)
                                    Perorangan
                                @break

                                @default
                                    Tidak Diketahui
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex align-items-center">
        <a href="{{ route('finish_good_schedules.create') }}" class="btn btn-success btn-sm me-2 text-white">
            <i class="fas fa-plus"></i> Add
        </a>
        <button type="submit" class="btn btn-danger btn-sm text-white me-auto"
            onclick="return confirm('Yakin ingin menghapus data yang dipilih?');">
            <i class="fas fa-trash"></i> Delete
        </button>

        <div class="pagination-sm ms-auto mt-2">
            {{ $finish_good_schedules->links('pagination::bootstrap-5') }}
        </div>
    </div>
</form>


<script>
    document.getElementById('select_all_fg').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="finish_good_schedule_ids[]"]');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
