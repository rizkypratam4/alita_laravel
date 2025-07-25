<x-layout>
    <x-breadcrumb :title="'Edit Work Experience'" />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update.work', $user->username) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Form User Info --}}
                @include('profiles._form_work_experience', ['user' => $user])

                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
