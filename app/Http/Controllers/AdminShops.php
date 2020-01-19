<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminShopsModel; 

class AdminShops extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select
        $data = AdminShopsModel::all()
        ->sortByDesc('updated_at')
        ->toArray();

        return view('admin.shops-admin', compact('data'));
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
        //validate
        $this->validate($request,
            [
                'nameShops' => 'required',
                'imageShops' => 'required',
                'linkShops' => 'required'
            ]
        );

        //insert
        $data = new AdminShopsModel;
        $data->shops_name = $request->nameShops;
        $data->shops_link = $request->linkShops;
        $data->shops_image = $request->file('imageShops')->store('public/img');

        //save
        $data->save();

        return  redirect()->route('shops.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        //validate
        $this->validate($request,
            [
                'nameShops' => 'required',
                //'imageShops' => 'required',
                'linkShops' => 'required'
            ]
        );
    
        //search form id
        $data = AdminShopsModel::find($id);

        //add form id
        $data->shops_name = $request->nameShops;
        $data->shops_link = $request->linkShops;
        // $data->shops_image = $request->file('imageShops')->store('public/img');
        
        //check image is null?
        if($request->imageShops != null) {
            //delete file
            Storage::delete($data['shops_image']);

            //add file
            $data->shops_image = $request->file('imageShops')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('shops.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //search form id
        $data = AdminShopsModel::find($id);

        //delete file
        Storage::delete($data['shops_image']);

        //delete
        $data->delete();

        return redirect()->route('shops.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
