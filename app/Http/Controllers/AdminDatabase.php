<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminDatabaseModel;

class AdminDatabase extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select
        $data = AdminDatabaseModel::all()->toArray();

        return view('admin.database-admin', compact('data'));
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
                'titleDatabase' => 'required'
            ]
        );

        //insert
        $data = new AdminDatabaseModel;
        $data->admin_databases_name = $request->titleDatabase;

        if(isset($request->linkDatabase)) {
            $data->admin_databases_link = $request->linkDatabase;
        }

        if(isset($data->admin_databases_image)) {
            $data->admin_databases_image = $request->file('imageDatabase')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('database.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'titleDatabase' => 'required',
                'linkDatabase' => 'required',
                'imageDatabase' => 'required'
            ]
        );

        //search form id
        $data = AdminDatabaseModel::find($id);

        $data->admin_databases_name = $request->titleDatabase;
        $data->admin_databases_link = $request->linkDatabase;
        $data->admin_databases_image = $request->file('imageDatabase')->store('public/img');

        //save
        $data->save();

        return  redirect()->route('database.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
        $data = AdminDatabaseModel::find($id);

        //delete file
        Storage::delete($data['admin_database_image']);

        //delete
        $data->delete();

        return redirect()->route('database.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
