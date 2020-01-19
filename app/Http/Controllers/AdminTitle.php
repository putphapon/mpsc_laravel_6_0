<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminTitleModel; 

class AdminTitle extends Controller
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
        $data = AdminTitleModel::all()
                ->sortByDesc('updated_at')
                ->toArray();

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
                'nameTitle' => 'required',
                'imageTitle' => 'required'
            ]
        );

        //insert
        $data = new AdminTitleModel;
        $data->title_name = $request->nameTitle;
        $data->title_image = $request->file('imageTitle')->store('public/img');

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
                'nameTitle' => 'required'
            ]
        );

        //search form id
        $data = AdminTitleModel::find($id);

        $data->title_name = $request->nameTitle;
        
        //check image is null?
        if($request->imageTitle != null) {
            //delete file
            Storage::delete($data['title_image']);
            //add file
            $data->title_image = $request->file('imageTitle')->store('public/img');
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
        Storage::delete($data['title_image']);

        //delete
        $data->delete();

        return redirect()->route('title.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
