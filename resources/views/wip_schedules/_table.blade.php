<form action="{{ route('wip_schedules.delete-selected') }}" method="POST" class="ms-auto">
    @csrf
    @method('DELETE')

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 2%; white-space: nowrap;">
                        <input type="checkbox" id="select_all_wip">
                    </th>
                    <th class="text-nowrap">WIP</th>
                    <th class="text-nowrap">Quantity</th>
                    <th class="text-nowrap">Priority</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wip_schedules as $wip)
                    <tr>
                        <td class="text-center" style="width: 2%; white-space: nowrap;">
                            <input type="checkbox" name="wip_schedule_ids[]" value="{{ $wip->id }}">
                        </td>
                        <td>{{ $wip->name }}</td>
                        <td>{{ $wip->qty }}</td>
                        <td>
                            @switch($wip->priority)
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
        <a href="{{ route('wip_schedules.create') }}" class="btn btn-success btn-sm me-2 text-white">
            <i class="fas fa-plus"></i> Add
        </a>
        <button type="submit" class="btn btn-danger btn-sm text-white me-auto" onclick="return confirm('Yakin ingin menghapus data yang dipilih?');">
            <i class="fas fa-trash"></i> Delete
        </button>

        <div class="pagination-sm ms-auto mt-2">
            {{ $wip_schedules->links('pagination::bootstrap-5') }}
        </div>
    </div>
</form>

t
<script>
    document.getElementById('select_all_wip').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="wip_schedule_ids[]"]');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>

