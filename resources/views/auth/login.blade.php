<x-guest-layout>
    <h4 class="fw-bold mb-4 text-center">Welcome Back!</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
        <div class="mb-4 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-lg">
            <i class="fas fa-sign-in-alt me-2"></i>Login
        </button>
        <p class="text-center mt-3 mb-0">
            Don't have an account? 
            <a href="{{ route('register') }}" style="color:#e94560">Register here</a>
        </p>
    </form>
</x-guest-layout>