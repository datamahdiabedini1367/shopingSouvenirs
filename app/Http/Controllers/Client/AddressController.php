<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        return User::query()->where('id', auth()->user()->id)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = $this->getUser()->addresses;
        return view('client.profile.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddressStoreRequest $request)
    {
        if ($this->getUser()->addresses()->count() === 0) {
            $slug = 1;
        } else {
            $slug = $request->get('default', null);
        }

        $address = $this->getUser()->addresses()->create([
            'title' => $request->get('title'),
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'postal_code' => $request->get('postal_code'),
            'receiver' => $request->get('receiver'),
            'phone_number' => $request->get('phone_number'),
            'slug' => Str::random(8),
            'default' => $slug,
        ]);

        if ($this->getUser()->addresses()->count() > 1 && $request->filled('default')) {
            $this->getUser()->addresses()->where('id', '!=', $address->id)->update([
                'default' => null,
            ]);
        }

        return redirect()->route('client.profile.address.index')->with('success', 'آدرس با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $addresses = $this->getUser()->addresses;

        return view('client.profile.addresses.index', compact('address', 'addresses'));

    }

    public function change_default(Address $address)
    {
        $this->getUser()->addresses()->where('id', '!=', $address->id)->update(['default'=> null]);
        $address->update([
            'default' => 1
        ]);

        return redirect()->route('client.profile.address.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressUpdateRequest $request, Address $address)
    {
        $address->update([
            'title' => $request->get('title', $address->title),
            'state' => $request->get('state', $address->state),
            'city' => $request->get('city', $address->city),
            'address' => $request->get('address', $address->address),
            'postal_code' => $request->get('postal_code', $address->postal_code),
            'receiver' => $request->get('receiver', $address->receiver),
            'phone_number' => $request->get('phone_number', $address->phone_number),
            'default' => $request->get('default', $address->default),
        ]);
        return redirect()->route('client.profile.address.index')->with('success', 'آدرس با موفقیت ویرایش شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('client.profile.address.index')->with('success', 'آدرس با موفقیت حذف شد.');

    }
}
