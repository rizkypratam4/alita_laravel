<x-layout>
    <x-breadcrumb :title="'Edit User Info'" />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update.info', $user->username) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Form User Info --}}
                @include('profiles._form_user_info', ['user' => $user])
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
