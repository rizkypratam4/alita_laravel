<x-layout>
    <x-breadcrumb :title="'Operator Produksi'" />

     @if (session('notice'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('notice') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('alert'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Operator Produksi</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">No</th>
                                    <th scope="col" class="text-nowrap">Wip</th>
                                    <th scope="col" class="text-nowrap">Jam upload</th>
                                    <th scope="col" class="text-nowrap">Priority</th>
                                    <th scope="col" class="text-nowrap text-center" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($operators as $index => $operator)
                                    <tr>
                                        <td class="text-center" style="width: 2%; white-space: nowrap;">
                                            {{ $loop->iteration + ($operators->currentPage() - 1) * $operators->perPage() }}
                                        </td>
                                        <td>{{ $operator->wipSchedule->name ?? '-' }}</td>
                                        <td>
                                            {{ optional($operator->wipSchedule->created_at)->format('H:i:s') ?? '-' }}
                                        </td>
                                        <td>
                                            @php
                                                $priorityText = [
                                                    1 => 'Top Urgent',
                                                    2 => 'Urgent',
                                                    3 => 'Normal',
                                                    4 => 'Luar Kota',
                                                    5 => 'Perorangan'
                                                ];
                                            @endphp
                                            {{ $priorityText[$operator->wipSchedule->priority] ?? 'Tidak Diketahui' }}
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <form method="POST" action="{{ route('operators.markComplete', $operator->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-circle me-1"></i> Selesai
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="pagination-sm ms-auto mt-2">
                            {{ $operators->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
