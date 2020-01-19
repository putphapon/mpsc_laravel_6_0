<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminEventsModel;

class AdminEvents extends Controller
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
        $data = AdminEventsModel::all()
        ->sortByDesc('events_date')
        ->toArray();

        return view('admin.events-admin', compact('data'));
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
                'nameEvents' => 'required',
                'imageEvents' => 'required',
                'dateEvents' => 'required',
                'whereEvents' => 'required',
                'linkRegEvents' => 'required',
                'linkImageEvents' => 'required'
            ]
        );

        //insert
        $data = new AdminEventsModel;
        $data->events_name = $request->nameEvents;
        $data->events_image = $request->file('imageEvents')->store('public/img');
        $data->events_date = $request->dateEvents;
        $data->events_where = $request->whereEvents;
        $data->events_linkReg = $request->linkRegEvents;
        $data->events_linkImage = $request->linkImageEvents;

        //save
        $data->save();

        return  redirect()->route('events.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameEvents' => 'required',
                //'imageEvents' => 'required',
                'dateEvents' => 'required',
                'whereEvents' => 'required',
                'linkRegEvents' => 'required',
                'linkImageEvents' => 'required'
            ]
        );

        //search form id
        $data = AdminEventsModel::find($id);

        //add form id
        $data->events_name = $request->nameEvents;
        $data->events_date = $request->dateEvents;
        $data->events_where = $request->whereEvents;
        $data->events_linkReg = $request->linkRegEvents;
        $data->events_linkImage = $request->linkImageEvents;
        // $data->events_image = $request->file('imageEvents')->store('public/img');
        
        //check image is null?
        if($request->imageEvents != null) {
            //delete file
            Storage::delete($data['events_image']);
            //add file
            $data->events_image = $request->file('imageEvents')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('events.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
        $data = AdminEventsModel::find($id);

        //delete file
        Storage::delete($data['events_image']);

        //delete
        $data->delete();

        return redirect()->route('events.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
