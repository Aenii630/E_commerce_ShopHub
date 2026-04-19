<x-guest-layout>
    <h4 class="fw-bold mb-4 text-center">Create Account</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Full Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter your name" value="{{ old('name') }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Email Address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter your email" value="{{ old('email') }}" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter password" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="Confirm password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-lg">
            <i class="fas fa-user-plus me-2"></i>Register
        </button>
        <p class="text-center mt-3 mb-0">
            Already have an account? 
            <a href="{{ route('login') }}" style="color:#e94560">Login here</a>
        </p>
    </form>
</x-guest-layout>