<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>QR Code Asset</title>
    <style>
    @page {
        size: 8cm 5cm landscape;
        margin: 0;
    }

    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
        font-size: 10pt;
    }

    body {
        padding: 0;
        position: relative;
        height: 5cm;
        width: 8cm;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        padding: 0 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        vertical-align: middle;
    }

    .qr {
        width: 130px;
        text-align: center;
    }

    .qr img {
        width: 120px;
        height: 120px;
    }

    .text {
        padding-left: 8px;
        text-transform: uppercase;
        word-break: break-word;
        text-align: center;
    }

    .text p {
        margin: 2px 0;
        line-height: 1.2;
    }
</style>

</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td class="qr text-center">
                    <img src="data:image/png;base64,{{ $qrCodeImage }}" alt="QR Code">
                </td>
                <td class="text">
                    <p>{{ $maintenance->kode_asset }}</p>
                    <p>{{ $maintenance->name }}</p>
                    <p>{{ $maintenance->serial_number }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>