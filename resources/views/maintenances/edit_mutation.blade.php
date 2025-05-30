<x-layout>
    <x-breadcrumb title="Edit Mutasi" />

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Mutasi {{ $maintenance->name }}</h5>
                </div>
                <div class="card-body">
                    @include('maintenances._form_mutation', [
                        'action' => route('maintenances.update.mutation', $maintenance->id),
                        'method' => 'PUT',
                        'mutation' => $lastMutation
                    ])
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    new TomSelect('#select-departements');
</script>
