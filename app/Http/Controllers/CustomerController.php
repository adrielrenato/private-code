<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\PhoneByCustomer;
use App\Http\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', new Customer());

        $customers = Customer::where(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('name', 'like', '%'.$request->get('search').'%')
                    ->orWhere('email', 'like', '%'.$request->get('search').'%')
                    ->orWhereExists(function ($query) use ($request) {
                        $query->from('phone_by_customers')
                            ->select(DB::raw(1))
                            ->where('phone', 'like', '%'.$request->get('search').'%');
                    });
            }
        })->orderBy('name', 'asc')
        ->get();

        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Customer());

        return view('customers.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CustomerFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFormRequest $request)
    {
        $this->authorize('create', new Customer());

        DB::transaction(function () use ($request) {
            $customer = Customer::create($request->validated());

            $this->storePhones($request, $customer);
        });

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with(['phonesByCustomer'])
            ->where('id', $id)
            ->firstOrFail();

        $this->authorize('view', $customer);

        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::with(['phonesByCustomer'])
            ->where('id', $id)
            ->firstOrFail();

        $this->authorize('update', $customer);

        return view('customers.create-edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CustomerFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerFormRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $this->authorize('update', $customer);

        $customer->fill($request->validated())
            ->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::with(['phonesByCustomer'])
            ->where('id', $id)
            ->firstOrFail();

        $this->authorize('delete', $customer);

        DB::transaction(function () use ($customer) {
            foreach ($customer->phonesByCustomer as $phone) {
                $phone->delete();
            }

            $customer->delete();
        });

        return redirect()->route('customers.index');
    }

    private function storePhones($request, $customer)
    {
        foreach ($request->validated()['phone'] as $phone) {
            PhoneByCustomer::create([
                'customer_id' => $customer->id,
                'phone' => $phone
            ]);
        }
    }
}
