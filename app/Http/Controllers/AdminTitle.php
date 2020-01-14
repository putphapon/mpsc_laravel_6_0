<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminTitleModel;

class AdminTitle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select
        $data = AdminTitleModel::all()->toArray();

        return view('admin.title-admin', compact('data'));
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
                'titleImage' => 'required',
                'fileImage' => 'required'
            ]
        );

        //insert
        $data = new AdminTitleModel;
        $data->admin_titles_name = $request->titleImage;
        $data->admin_titles_image = $request->file('fileImage')->store('public/img');

        //save
        $data->save();

        return  redirect()->route('title.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'titleImage' => 'required'
            ]
        );

        //search form id
        $data = AdminTitleModel::find($id);

        $data->admin_titles_name = $request->titleImage;
        if(!isset($data->admin_titles_image)) {
            $data->admin_titles_image = $request->file('fileImage')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('title.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
        $data = AdminTitleModel::find($id);

        //delete file
        Storage::delete($data['admin_titles_image']);

        //delete
        $data->delete();

        return redirect()->route('title.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
