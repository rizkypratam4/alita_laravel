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
    @php
        $profile = auth()->user();
    @endphp
    <x-breadcrumb :title="'Profiles'" />
    <div class="row">
        <!-- [ maintenance-page ] start -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Image user</h5>
                </div>
                <div class="card-body">
                    @include('profiles._form', ['user' => $user, 'disabled' => ''])
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>User info</h5>
                </div>
                <div class="card-body">
                    @include('profiles._form_user_info', ['user' => $user, 'disabled' => ''])
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Work experience</h5>
                </div>
                <div class="card-body">
                    @include('profiles._form_work_experience', ['user' => $user, 'disabled' => ''])
                </div>
            </div>
        </div>
        <!-- [ maintenance-page ] end -->
    </div>
</x-layout>
