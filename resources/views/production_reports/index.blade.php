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
    <x-breadcrumb :title="'Production report'" />
    <div class="row">
        <!-- [ search-production-report-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Search report</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <input type="date" class="form-control" name="filter[date]"
                                value="{{ request('filter.date') }}" placeholder="Start date" aria-label="First name">
                            <small class="form-text text-muted" for="validationStartDate">Start date</small>
                        </div>
                        <div class="col-3">
                            <input type="date" class="form-control" name="filter[date]"
                                value="{{ request('filter.date') }}" placeholder="End date" aria-label="First name">
                            <small class="form-text text-muted" for="validationEndDate">End date</small>
                        </div>
                        <div class="col-3">
                            <input type="date" class="form-control" name="filter[date]"
                                value="{{ request('filter.time') }}" placeholder="Start time" aria-label="First name">
                            <small class="form-text text-muted" for="validationStartTime">Start time</small>
                        </div>
                        <div class="col-3">
                            <input type="date" class="form-control" name="filter[date]"
                                value="{{ request('filter.time') }}" placeholder="End date" aria-label="First name">
                            <small class="form-text text-muted" for="validationEndDate">End time</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="align-self-center">All data</h5>
                    <div class="search-box">
                        <i data-feather="search" class="search-icon me-2"></i>
                        <input type="text" id="search-departements" class="form-control form-control-sm"
                            placeholder="Search...">
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <!-- [ search-production-report-page ] end -->
        </div>
</x-layout>
