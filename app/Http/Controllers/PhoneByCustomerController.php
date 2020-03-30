<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneByCustomerFormRequest;
use App\Models\PhoneByCustomer;
use Illuminate\Http\Request;

class PhoneByCustomerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phoneByCustomer = PhoneByCustomer::findOrFail($id);

        $this->authorize('update', $phoneByCustomer);

        return view('phones.edit', ['phoneByCustomer' => $phoneByCustomer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GroupFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneByCustomerFormRequest $request, $id)
    {
        $phoneByCustomer = PhoneByCustomer::findOrFail($id);

        $this->authorize('update', $phoneByCustomer);

        $phoneByCustomer->fill($request->validated())
            ->save();

        return redirect()->route('customers.show', ['customer' => $phoneByCustomer->customer_id]);
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
