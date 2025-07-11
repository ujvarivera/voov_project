<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $avatars = [
            0 => 'avatar_1.png',
            1 => 'avatar_2.png',
            2 => 'avatar_3.png',
        ];

        return view('customers.create', compact('avatars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20|unique:customers,phone',
            'avatar' => 'required|integer|between:1,3',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', __('Ügyfél sikeresen hozzáadva'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', __('Ügyfél sikeresen törölve'));
    }
}
