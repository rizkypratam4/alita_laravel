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

    <div class="header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white">{{ __('Home / Asset / QR Code') }}</li>
            </ol>
        </nav>
    </div>

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
                                    @if(isset($maintenance->status))
                                    <li>
                                        <strong>Status:</strong> 
                                        <span class="badge bg-{{ $maintenance->status == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($maintenance->status) }}
                                        </span>
                                    </li>
                                    @endif
                                </ul>

                                <div class="mt-4">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('maintenances.download_qrcode', $maintenance->id) }}" 
                                           class="btn btn-danger">
                                            <i class="fas fa-download me-1"></i> 
                                            Download QR Code
                                        </a>
                                        <button type="button" class="btn btn-success" onclick="printQrCode()">
                                            <i class="fas fa-print me-1"></i> 
                                            Print
                                        </button>
                                        <button type="button" class="btn btn-info" onclick="shareQrCode()">
                                            <i class="fas fa-share me-1"></i> 
                                            Share
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('maintenances.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> 
                                        Kembali ke Daftar Asset
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Print Modal --}}
    <div class="modal fade" id="printModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-print me-2"></i>
                        Print QR Code
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="printContent">
                    <div class="print-header mb-4">
                        <h3>{{ $maintenance->kode_asset }}</h3>
                        <h4>{{ strtoupper($maintenance->name) }}</h4>
                        @if($maintenance->keterangan)
                        <p class="text-muted">{{ $maintenance->keterangan }}</p>
                        @endif
                    </div>
                    <div class="qr-print-container mb-4">
                        {!! $qrCode !!}
                    </div>
                    <div class="print-footer">
                        <p><strong>Kode Asset:</strong> {{ $maintenance->kode_asset }}</p>
                        <p><small>Generated on: {{ date('d-m-Y H:i:s') }}</small></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="doPrint()">
                        <i class="fas fa-print me-1"></i>
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <script>
    function printQrCode() {
        $('#printModal').modal('show');
    }

    function doPrint() {
        window.print();
    }

    function shareQrCode() {
        if (navigator.share) {
            navigator.share({
                title: 'QR Code Asset - {{ $maintenance->kode_asset }}',
                text: 'QR Code untuk asset {{ $maintenance->name }}',
                url: window.location.href
            });
        } else {
            // Fallback - copy to clipboard
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link QR Code berhasil disalin ke clipboard!');
            }).catch(() => {
                alert('Tidak dapat menyalin link. URL: ' + url);
            });
        }
    }

    // Print styles
    const printStyles = `
        @media print {
            body * { visibility: hidden; }
            #printContent, #printContent * { visibility: visible; }
            #printContent {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .qr-print-container svg {
                width: 200px !important;
                height: 200px !important;
            }
        }
    `;
    
    // Add print styles to head
    const styleSheet = document.createElement("style");
    styleSheet.innerText = printStyles;
    document.head.appendChild(styleSheet);
    </script>
    

</x-layout>