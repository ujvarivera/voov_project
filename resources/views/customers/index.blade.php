@extends('layouts.app')

@section('content')

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
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email }}</td>
          <td>{{ $customer->phone }}</td>
          <td>{{ __('Törlés') }}</td>
        </tr>
        @endforeach
  </tbody>
</table>


@endsection