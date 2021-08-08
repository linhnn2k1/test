<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listCustomer = customer::where('full_name', 'like', "%$search%")
            ->orwhere('phone', 'like', "%$search%")->paginate(10);
        return view(
            'customers.index',
            compact($listCustomer),
            [
                "listCustomer" => $listCustomer,
                "search" => $search
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:customer',
            'image' => 'required'
        ], [
            'email.required' => "Email không được để trống",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Số điện thoại không được để trống",
            'image.required' => "Ảnh chưa có mục được chọn",
            'full_name.required' => "Họ tên không được để trống",
        ]);

        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        $full_name = $request->get('full_name');
        $email = $request->get('email');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $customer = new customer();
        $customer->full_name = $full_name;
        $customer->email = $email;
        $customer->phone = $phone;
        $customer->gender = $gender;
        $customer->image = $newImageName;
        $customer->save();
        return Redirect::route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
