@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ __('Új ügyfél hozzáadása')}}</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Név') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ _('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">{{ _('Telefonszám') }}</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ _('Profilkép') }}</label>
            <div class="d-flex gap-3">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="form-check text-center">
                        <input class="form-check-input" type="radio" name="avatar" value="{{ $i }}" id="avatar{{ $i }}" {{ $i === 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="avatar{{ $i }}">
                            <img src="{{ asset('images/avatars/avatar_0' . $i . '.png') }}" width="60" height="60" alt="Avatar {{ $i }}">
                        </label>
                    </div>
                @endfor
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ _('Ügyfél mentése') }}</button>
    </form>
</div>
@endsection