@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-5">
            <h2 class="fw-bold mb-3">Get In <span style="color:#e94560">Touch</span></h2>
            <p class="text-muted mb-4">We are here to help you. Send us a message and we will get back to you as soon as possible.</p>
            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="p-3 rounded-3" style="background:#e94560">
                    <i class="fas fa-map-marker-alt text-white"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Location</h6>
                    <p class="text-muted mb-0">Sadiqabad, Punjab, Pakistan</p>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="p-3 rounded-3" style="background:#e94560">
                    <i class="fas fa-envelope text-white"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Email</h6>
                    <p class="text-muted mb-0">aenagul561@gmail.com</p>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="p-3 rounded-3" style="background:#e94560">
                    <i class="fas fa-clock text-white"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Working Hours</h6>
                    <p class="text-muted mb-0">Monday - Saturday: 9AM - 9PM</p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card p-4">
                <h4 class="fw-bold mb-4">Send Message</h4>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Your Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="John Doe" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Your Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="john@example.com" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Subject *</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                   placeholder="How can we help?" value="{{ old('subject') }}" required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Message *</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                      rows="5" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection