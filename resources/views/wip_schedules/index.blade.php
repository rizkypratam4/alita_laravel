<style>

</style>

<x-layout>
    <x-breadcrumb :title="'Wip Schedule'" />

    <div class="row">
        <div class="col-sm-12">
            <!-- Flash Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-3">PPIC</h5>

                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <form action="{{ route('wip_schedules.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2 w-100" style="max-width: 400px;">
                                @csrf
                                <input class="form-control form-control-sm" name="file" type="file">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">
                                        <i class="fas fa-file-import me-1"></i> Import
                                    </button>
                            </form>
                            <form action="{{ route('wip_schedules.clearAll') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data belum terjadwal?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm mt-2">
                                    <i class="fas fa-trash-alt me-1"></i> Clear All
                                </button>
                            </form>
                        </div>
                    </div>

                        <div class="col-12 col-md-6">
                            <div class="d-flex justify-content-md-end align-items-start justify-content-start">
                                <div class="w-100" style="max-width: 200px;">
                                    <input type="text" id="search-finish-good" class="form-control form-control-sm"
                                        placeholder="Search...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Tabel daftar finish good -->
                    <div id="finish-good-results">
                        @include('wip_schedules._table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


<script>
    $(document).ready(function() {
        $('#search-finish-good').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('wip.search') }}",
                location: "GET",
                data: {
                    search: query
                },
                success: function(data) {
                    $('#location-results').html(data);
                }
            });
        });
    });
</script>
