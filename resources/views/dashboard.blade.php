<style>
    .pagination {
        justify-content: center;
    }
</style>
<x-layout>
    <x-breadcrumb :title="'Dashboard'" />
    <div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Finish Good Tahunan</h6>
                <h4 class="mb-3">{{ number_format($finishGoodTahunan) }}</h4>
                <p class="mb-0 text-muted text-sm">Jumlah barang jadi yang selesai dalam 1 tahun terakhir</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">WIP Selesai Tahunan</h6>
                    <h4 class="mb-3">{{ number_format($wipScheduleTahunan) }}</h4>
                    <p class="mb-0 text-muted text-sm">Jumlah proses WIP yang berhasil diselesaikan tahun ini</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">User Aktif</h6>
                    <h4 class="mb-3">{{ number_format($totalUsers) }}</h4>
                    <p class="mb-0 text-muted text-sm">Jumlah kesulurahan pengguna yang terdaftar dialita</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Mesin Produksi</h6>
                    <h4 class="mb-3">{{ number_format($totalMesinProduksi) }}</h4>
                    <p class="mb-0 text-muted text-sm">Total mesin yang digunakan di lini produksi</p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Tren Penyelesaian Produksi</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="trendChart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-6">
            <h5 class="mb-3">Finish Good hari ini : {{ number_format($finishGoodHariIni) }}</h5>
            <div class="card tbl-card" style="min-height: 450px;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Item number</th>
                                    <th class="text-nowrap">Nama barang</th>
                                    <th class="text-nowrap">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finishGoodHariIniList as $item)
                                    <tr>
                                        <td class="text-nowrap">{{ $item['item_number'] }}</td>
                                        <td class="text-nowrap">{{ $item['name'] }}</td>
                                        <td class="text-center">{{ number_format($item['total_amount']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-6">
            <h5 class="mb-3">WIP Schedule Hari Ini : {{ number_format($wipHariIni) }}</h5>
            <div class="card tbl-card" style="min-height: 450px;">
                <div class="card-body d-flex flex-column">
                    <div class="table-responsive flex-grow-1">
                        <table class="table table-hover table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wipScheduleHariIniList as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['kategori'] }}</td>
                                        <td class="text-center">{{ number_format($item['total_amount']) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data hari ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $wipScheduleHariIniList->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layout>