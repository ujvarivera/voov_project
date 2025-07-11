@extends('layouts.app')

@section('content')

<div class="card py-2 px-4 mx-3 mx-md-4 rounded-4">
    <h1 class="text-center text-md-start mt-2 mt-md-4 ms-md-4">{{ __('Ügyfelek') }}</h1>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ __(session('success')) }}
        </div>
    @endif

    <div class="card m-0 mt-4 rounded-4">
        <div class="card-body p-3 p-md-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="text-nowrap">
                        <tr>
                            <th scope="col" class="text-secondary">{{ __('Név') }}</th>
                            <th scope="col" class="text-secondary">{{ __('Email') }}</th>
                            <th scope="col" class="text-secondary">{{ __('Telefonszám') }}</th>
                            <th scope="col" class="text-secondary">{{ __('Művelet') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td class="d-flex align-items-center">
                                <img src="{{ asset('images/avatars/avatar_0' . $customer->avatar . '.png') }}" alt="Avatar" width="40" height="40" class="rounded-circle">
                                <span class="ms-2 fw-bold">{{ $customer->name }}</span>
                            </td>
                            <td class="text-nowrap">{{ $customer->email }}</td>
                            <td class="text-nowrap">{{ $customer->phone }}</td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Biztos törölni szeretnéd?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 m-0 text-black text-uppercase fw-bold" style="text-decoration: none;">
                                        {{ __('Törlés') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3 text-uppercase px-5">
            <small>{{ __('Új ügyfél hozzáadása') }}</small>
        </a>
    </div>
</div>
@endsection