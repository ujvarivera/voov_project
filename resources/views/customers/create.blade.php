@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card rounded-4 p-3">
        <h1 class="text-center text-md-start mt-md-4 ms-md-4">{{ __('Új ügyfél hozzáadása') }}</h1>

        <div class="card my-4 rounded-4">
            <div class="card-body px-3 py-4 mx-auto" style="max-width: 600px;">
                <form action="{{ route('customers.store') }}" method="POST" id="createForm">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">{{ __('Név') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Add meg a teljes nevet">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">{{ __('Email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Add meg az emailt">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">{{ __('Telefonszám') }}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone') }}" placeholder="Add meg a telefonszámot">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('Profilkép') }}</label>
                        <div class="d-flex flex-wrap gap-3">
                            @for ($i = 1; $i <= 3; $i++)
                                <div class="form-check text-center">
                                    <input class="form-check-input visually-hidden" type="radio" name="avatar"
                                        value="{{ $i }}" id="avatar{{ $i }}"
                                        {{ old('avatar', 1) == $i ? 'checked' : '' }}>
                                    <label class="form-check-label avatar-label" for="avatar{{ $i }}">
                                        <img src="{{ asset('images/avatars/avatar_0' . $i . '.png') }}" width="60"
                                            height="60" alt="Avatar {{ $i }}" class="rounded-circle">
                                    </label>
                                </div>
                            @endfor
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 text-uppercase" form="createForm">
                {{ __('Ügyfél mentése') }}
            </button>
        </div>
    </div>
</div>
@endsection
