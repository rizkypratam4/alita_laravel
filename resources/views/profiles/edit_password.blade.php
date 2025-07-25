<x-layout>
    <x-breadcrumb :title="'Change password'" />
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.change.password', $user->username) }}" method="POST">
                @csrf
                @method('PUT')

                @include('profiles._form_edit_password', ['user' => $user])

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
