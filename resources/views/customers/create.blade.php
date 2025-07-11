@extends('layouts.app')

@section('content')

<div class="card py-4 px-4 mx-4 rounded-4">
    <h1>{{ __('Új ügyfél hozzáadása')}}</h1>

    <div class="card m-4 rounded-4">
        <div class="card-body p-4 mx-auto">
            <form action="{{ route('customers.store') }}" method="POST" id="createForm">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Név') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Add meg a teljes nevet">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                        value="{{ old('email') }}" placeholder="Add meg az emailt">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('Telefonszám') }}</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" 
                        value="{{ old('phone') }}" placeholder="Add meg a telefonszámot">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Profilkép') }}</label>
                    <div class="d-flex gap-3">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="form-check text-center">
                                <input class="form-check-input visually-hidden" type="radio" name="avatar" value="{{ $i }}" id="avatar{{ $i }}" {{ $i === 1 ? 'checked' : '' }}>
                                <label class="form-check-label avatar-label" for="avatar{{ $i }}">
                                    <img src="{{ asset('images/avatars/avatar_0' . $i . '.png') }}" width="60" height="60" alt="Avatar {{ $i }}" class="rounded-circle">
                                </label>
                            </div>
                        @endfor
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary px-5" form="createForm">
            {{ __('Ügyfél mentése') }}
        </button>
    </div>
</div>
@endsection
