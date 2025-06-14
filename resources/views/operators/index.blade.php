<x-layout>
    <x-breadcrumb :title="'Operator Produksi'" />

    <style>
        .hover-card {
            transition: 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .hover-card:hover {
            background-color: #f0f8ff;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.2);
        }

        .hover-card:hover i {
            color: #0d6efd !important; /* Bootstrap primary */
        }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Operator Produksi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $cards = [
                                ['title' => 'Mattras', 'route' => route('mattras.index'), 'icon' => 'fa-bed'],
                                ['title' => 'Border', 'route' => route('border.index'), 'icon' => 'fa-border-style'],
                                ['title' => 'Gusset', 'route' => route('gusset.index'), 'icon' => 'fa-layer-group'],
                                ['title' => 'Panel', 'route' => route('panel.index'), 'icon' => 'fa-th-large'],
                                ['title' => 'Pocket', 'route' => route('pocket.index'), 'icon' => 'fa-wallet'],
                                ['title' => 'Ram', 'route' => route('ram.index'), 'icon' => 'fa-microchip'],
                            ];
                        @endphp

                        @foreach ($cards as $card)
                            <div class="col-md-4 mb-4">
                                <a href="{{ $card['route'] }}" class="text-decoration-none">
                                    <div class="card hover-card h-100 text-center py-4" style="cursor: pointer;">
                                        <div class="card-body">
                                            <i class="fas {{ $card['icon'] }} fa-2x text-secondary mb-3"></i>
                                            <h5 class="card-title text-dark">{{ $card['title'] }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
