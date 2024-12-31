<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::all();
        return view ('payments.index')->with('payments', $payments);
    }

    public function create(): View
    {
        return view('payments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'Payment Added!');
    }

   
    public function show(string $id): View
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    public function edit(string $id): view
    {
        $payments = Payment::find($id);
        return view('payments.edit')->with('payments', $payments);
    }

   
    public function update(Request $request, string $id): RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'payments Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted!'); 
    }
}
?>