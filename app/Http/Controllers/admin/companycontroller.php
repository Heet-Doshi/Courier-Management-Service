<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class companycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $companies = companymasters::all();
        if(count($companies)>0)
        {
            $company = companymasters::find(1);
            return view('admin.company.index ',compact('companies','company'));
        }

        else{
            return view('admin.company.index ',compact('companies'));
        }
        
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|string',
            'company_logo' => 'required|image|memes:jpeg,jpg,png',
            'address' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_pin' => 'required',
            'company_country'=>'required|string',
            'company_phone' =>'required|string',
            'company_email' =>'required|email',
            'company_gst'=>'required|string',
        ]);

        $slug = Str::slug($request->company_name);
        $image = $request->file('company_logo');
        if(isset($image))
        {
                $date =Carbon::now()->toDatestring();
                $imagename = $slug . '-'.$date. '-' . $unique() . '.' . $image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('company'))
                {
                    Storage::disk('public')->makeDirectory('company');
                }

                $companyLogo = Image::make('$image')->save($image->getClientOriginalExtension());
                Storage::disk('public')->put('company/'.$imagename,$companyLogo);

        }

        else
        {
            $imagename = 'default.png';

        }

        $company = new companymasters();
        $company->company_name = $request->company_name;
        $company->company_logo = $imagename;
        $company->address = $request->address;
        $company->company_city = $request->company_city;
        $company->company_state = $request->company_state;
        $company->company_pin = $request->company_pin;
        $company->company_country = $request->company_country;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_gst = $request->company_gst;
        $company->save();
        return redirect()->back()->with('success','Company Details has been saved');


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
        $this->validate($request,[
            'company_name' => 'required|string',
            'company_logo' => 'image|memes:jpeg,jpg,png',
            'address' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_pin' => 'required',
            'company_country'=>'required|string',
            'company_phone' =>'required|string',
            'company_email' =>'required|email',
            'company_gst'=>'required|string',
        ]);
        $company =  companymasters::find(1);
        $slug = Str::slug($request->company_name);
        $image = $request->file('company_logo');
        if(isset($image))
        {
                $date =Carbon::now()->toDatestring();
                $imagename = $slug . '-'.$date. '-' . $unique() . '.' . $image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists('company'))
                {
                    Storage::disk('public')->makeDirectory('company');
                }

                if(Storage::disk('public')->exists('company/'.$company->company_logo))
                {
                    Storage::disk('public')->delete('company/'.$company->company_logo);
                }

                $companyLogo = Image::make('$image')->save($image->getClientOriginalExtension());
                Storage::disk('public')->put('company/'.$imagename,$companyLogo);

        }

        else
        {
            $imagename = $company->company_logo;

        }

        
        $company->company_name = $request->company_name;
        $company->company_logo = $imagename;
        $company->address = $request->address;
        $company->company_city = $request->company_city;
        $company->company_state = $request->company_state;
        $company->company_pin = $request->company_pin;
        $company->company_country = $request->company_country;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_gst = $request->company_gst;
        $company->save();
        return redirect()->back()->with('success','Company Details has been updatedsn');
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
