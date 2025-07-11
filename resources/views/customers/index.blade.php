@extends('layouts.app')

@section('content')

<div class="card py-4 px-4 mx-4 rounded-4">
    <h1>{{ __('Ügyfelek')}}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ __(session('success')) }}
        </div>
    @endif

    <div class="card m-4 rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-secondary">{{ __('Név')}}</th>
                        <th scope="col" class="text-secondary">{{ __('Email') }}</th>
                        <th scope="col" class="text-secondary">{{ __('Telefonszám')}}</th>
                        <th scope="col" class="text-secondary">{{ __('Művelet')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr class="align-middle">
                        <td>
                            <img src="{{ asset('images/avatars/avatar_0' . $customer->avatar . '.png') }}" alt="Avatar" width="50" height="50" class="rounded-circle">
                            <span class="ms-3 font-weight-bold">{{ $customer->name }}</span>
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 m-0 text-black text-uppercase font-weight-bold" style="text-decoration: none;">
                                    {{ __('Törlés') }}
                                </button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center text-small">
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3 text-uppercase px-5">
            <small>{{ __('Új ügyfél hozzáadása') }}</small>
        </a>
    </div>
</div>
@endsection