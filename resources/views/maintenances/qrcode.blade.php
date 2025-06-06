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

    .qr-code-container {
        background: white;
        padding: 20px;
        border: 2px solid #ddd;
        border-radius: 8px;
        display: inline-block;
    }

    .qr-code-container svg {
        display: block;
        margin: 0 auto;
    }

    .asset-details {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }

    .asset-details ul li {
        padding: 5px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .asset-details ul li:last-child {
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .qr-code-container {
            margin-bottom: 20px;
        }
    }
</style>

<x-layout>
    <x-breadcrumb title="QR Code Asset" />
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-qrcode me-2"></i>
                        QR Code untuk Asset: {{ $maintenance->name }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                            <div class="qr-code-container">
                                {!! $qrCode !!}
                            </div>
                            <p class="mt-3 text-muted small">
                                <i class="fas fa-info-circle"></i>
                                Scan untuk akses detail asset
                            </p>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="asset-details">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-cogs me-2"></i>
                                    Detail Asset:
                                </h5>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li>
                                        <strong>Kode Asset:</strong> 
                                        <span class="badge bg-secondary ms-2">{{ $maintenance->kode_asset }}</span>
                                    </li>
                                    <li>
                                        <strong>Name:</strong> 
                                        <span class="text-dark">{{ strtoupper($maintenance->name) }}</span>
                                    </li>
                                    <li>
                                        <strong>Description:</strong> 
                                        <span class="text-muted">{{ $maintenance->keterangan ?: 'No description available' }}</span>
                                    </li>
                                    @if(isset($maintenance->location))
                                    <li>
                                        <strong>Location:</strong> 
                                        <span class="text-dark">{{ $maintenance->location }}</span>
                                    </li>
                                    @endif
                                    @if(isset($maintenance->serial_number))
                                    <li>
                                        <strong>Serial number:</strong> 
                                        <span class="badge bg-{{ $maintenance->serial_number == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($maintenance->serial_number) }}
                                        </span>
                                    </li>
                                    @endif
                                </ul>

                                <div class="mt-4">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('maintenances.download_qrcode', $maintenance->id) }}" 
                                        class="btn btn-danger" 
                                        title="Download PDF">
                                            <i class="fas fa-file-pdf me-1"></i> Download PDF
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>