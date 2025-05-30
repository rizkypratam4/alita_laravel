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
    <x-breadcrumb title="QR Code Asset" />

    <div class="header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white">{{ __('Home / Asset / QR Code') }}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>QR Code untuk Asset: {{ $maintenance->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-3 text-center">
                            {!! $qrCode !!}
                        </div>
                        <div class="col-6 col-md-9">
                            <h5>Fix Asset Details:</h5>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li>- Kode Asset: {{ $maintenance->kode_asset }}</li>
                                <li>- Name: {{ strtoupper($maintenance->name) }}</li>
                                <li>- Description: {{ $maintenance->keterangan }}</li>
                            </ul>

                            <div class="mt-3">
                                <a href="{{ route('maintenances.download_qrcode', $maintenance->id) }}" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Download QR Code
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
