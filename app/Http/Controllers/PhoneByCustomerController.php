<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneByCustomerFormRequest;
use App\Models\Customer;
use App\Models\PhoneByCustomer;
use Illuminate\Http\Request;

class PhoneByCustomerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        $this->authorize('create', new PhoneByCustomer());

        return view('phones.create-edit', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CustomerFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneByCustomerFormRequest $request, $customerId)
    {
        $customer = Customer::findOrFail($customerId);

        $this->authorize('create', new Customer());

        PhoneByCustomer::create(array_merge($request->validated(), ['customer_id' => $customer->id]));

        return redirect()->route('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $customerId
     * @param  int  $phoneByCustomerId
     * @return \Illuminate\Http\Response
     */
    public function edit($customerId, $phoneByCustomerId)
    {
        $customer = Customer::findOrFail($customerId);
        $phoneByCustomer = PhoneByCustomer::findOrFail($phoneByCustomerId);

        $this->authorize('update', $phoneByCustomer);

        return view('phones.create-edit', ['customer' => $customer, 'phoneByCustomer' => $phoneByCustomer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GroupFormRequest  $request
     * @param  int  $customerId
     * @param  int  $phoneByCustomerId
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneByCustomerFormRequest $request, $customerId, $phoneByCustomerId)
    {
        $customer = Customer::findOrFail($customerId);
        $phoneByCustomer = PhoneByCustomer::findOrFail($phoneByCustomerId);

        $this->authorize('update', $phoneByCustomer);

        $phoneByCustomer->fill($request->validated())
            ->save();

        return redirect()->route('customers.show', ['customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phoneByCustomer = PhoneByCustomer::findOrFail($id);

        $this->authorize('delete', $phoneByCustomer);

        $customerId = $phoneByCustomer->customer_id;
        $phoneByCustomer->delete();

        return redirect()->route('customers.show', ['customer' => $customerId]);
    }
}
