<x-layout>
  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login</b></h3>
            </div>

            <form method="POST" action="/login">
              @csrf
              <div class="form-group mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Address">
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
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                  <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
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