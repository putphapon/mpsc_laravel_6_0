<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminManuscriptsCategoryModel;

class AdminManuscriptsCategory extends Controller
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
        //
        return route('manuscripts.index');
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
                'nameManuscriptsCategory' => 'required',
                'detailManuscriptsCategory' => 'required',
                'imageManuscriptsCategory' => 'required'
            ]
        ); 

        //insert
        $data = new AdminManuscriptsCategoryModel;
        $data->manuscripts_category_name = $request->nameManuscriptsCategory;
        $data->manuscripts_category_detail = $request->detailManuscriptsCategory;
        $data->manuscripts_category_image = $request->file('imageManuscriptsCategory')->store('public/img');
        
        //save
        $data->save();

        return  redirect()->route('manuscripts.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameManuscriptsCategory' => 'required',
                'detailManuscriptsCategory' => 'required'
                // 'imageManuscriptsCategory' => 'required'
            ]
        );

        //search form id
        $data = AdminManuscriptsCategoryModel::find($id);

        //add form id
        $data->manuscripts_category_name = $request->nameManuscriptsCategory;
        $data->manuscripts_category_detail = $request->detailManuscriptsCategory;
        // $data->manuscripts_category_image = $request->file('imageManuscriptsCategory')->store('public/img');
        
        //check image is null?
        if($request->imageManuscriptsCategory != null) {
            //delete file
            Storage::delete($data['manuscripts_category_image']);
            //add file
            $data->manuscripts_category_image = $request->file('imageManuscriptsCategory')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('manuscripts.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $data = AdminManuscriptsCategoryModel::find($id);

        //delete file
        Storage::delete($data['manuscripts_category_image']);

        //delete
        $data->delete();

        return redirect()->route('manuscripts.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
