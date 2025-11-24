<style>
    .m-header {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border-radius: 8px;
        gap: 10px;
        font-family: 'Segoe UI', 'Roboto', sans-serif;
    }

    .m-header:hover {
        background-color: rgba(59, 130, 246, 0.1);
        /* Biru soft */
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    /* Logo Gambar */
    .logo-img {
        width: 40px;
        height: 40px;
        object-fit: contain;
        border-radius: 6px;
        background: #fff;
        padding: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Teks Logo */
    .logo-text {
        font-size: 23px;
        font-weight: 600;
        color: #1e40af;
        /* Biru modern */
        text-decoration: none;
        letter-spacing: -0.3px;
        white-space: nowrap;
    }

    .m-header:hover .logo-text {
        color: #1e3a8a;
    }

    /* Optional: Jika sidebar collapsible (hanya icon) */
    .sidebar-collapsed .logo-text {
        display: none;
    }

    .sidebar-collapsed .m-header {
        justify-content: center;
        padding: 12px;
    }

    .sidebar-collapsed .logo-img {
        width: 36px;
        height: 36px;
    }
</style>
<x-layout>
    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form flex-column">


                <div class="card">

                    <div class="m-header mt-5">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo-img">
                        <a href="#" class="b-brand logo-text">
                            Production Tracking
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="Email Address">
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                        checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">Keep me sign
                                        in</label>
                                </div>
                                <h5 class="text-secondary f-w-400">Forgot Password?</h5>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
