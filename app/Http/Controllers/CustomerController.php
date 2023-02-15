<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // có paginate thì k cần get()
        $customer = Customer::orderBy('created_at','DESC')->paginate(10);
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $province = Province::all();
        return view('customer.add',compact('province'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = '';
        }
        $request->merge(['image'=>$file_name]);
        try{
            Customer::create($request->all());
            return redirect()->route('customers.index');
        }
        catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
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
        $customer = Customer::find($id);
        $province = Province::all();
        return view('customer.edit',compact('customer','province'));
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
        $customer = Customer::find($id);
        if($request->hasFile('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$file_name);
        }else{
            $file_name = $customer->image ;
        }
        $request->merge(['image'=>$file_name]);
        try{
        
            $customer::update($request->all());
            return redirect()->route('customers.index');
        }
        catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect()->back();
    }
}
