<style>

</style>

<x-layout>
    <x-breadcrumb :title="'Finish Good'" />
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-3">PPIC</h5>
                    <div class="row align-items-center">
                        <!-- Bagian kiri: form file (50% width di laptop) -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="w-100" style="max-width: 400px;"> <!-- Container pembatas lebar -->
                                <div class="d-flex flex-column gap-2">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" />
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary btn-sm">Import</button>
                                        <button class="btn btn-danger btn-sm">Clear all</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian kanan: search form (50% width di laptop) -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="d-flex justify-content-md-end justify-content-start">
                                <div class="w-100" style="max-width: 400px;">
                                    <input type="text" id="search-finish-good" class="form-control form-control-sm"
                                        placeholder="Search..." />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div id="finish-good-results">
                        @include('finish_good_schedules._table')
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
                url: "{{ route('finish-good.search') }}",
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
