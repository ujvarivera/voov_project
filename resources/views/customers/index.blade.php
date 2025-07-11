@extends('layouts.app')

@section('content')

<h1>{{ __('Ügyfelek')}}</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">{{ __('Név')}}</th>
      <th scope="col">{{ __('Email') }}</th>
      <th scope="col">{{ __('Telefonszám')}}</th>
      <th scope="col">{{ __('Művelet')}}</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($customers as $customer)
      <tr>
          <td>
            <img src="{{ asset('images/avatars/avatar_0' . $customer->avatar . '.png') }}" alt="Avatar" width="50" height="50">
            {{ $customer->name }}
          </td>
          <td>{{ $customer->email }}</td>
          <td>{{ $customer->phone }}</td>
          <td>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0 m-0 text-black" style="text-decoration: none;">
                    {{ __('Törlés') }}
                </button>
            </form>
          </td>
        </tr>
        @endforeach
  </tbody>
</table>

<a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">
    {{ __('ÚJ ÜGYFÉL HOZZÁADÁSA') }}
</a>

@endsection