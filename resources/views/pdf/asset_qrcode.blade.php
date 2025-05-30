<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: sans-serif;
            font-size: 14px;
            text-align: center;
        }
        .qr-container {
            margin: 0 auto;
            max-width: 100%;
        }
        .asset-code {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .asset-name {
            font-size: 14px;
            margin-top: 15px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .asset-keterangan {
            font-size: 12px;
            margin-top: 5px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="qr-container">
        <div class="asset-code">{{ $asset->kode_asset }}</div>
        {!! $qrCode !!}
        <div class="asset-name">{{ strtoupper($asset->name) }}</div>
        @if (!empty($asset->keterangan))
            <div class="asset-keterangan">{{ strtoupper($asset->keterangan) }}</div>
        @endif
    </div>
</body>
</html>