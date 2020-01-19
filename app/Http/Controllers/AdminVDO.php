<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminVDOModel; 


class AdminVDO extends Controller
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
        $data = AdminVDOModel::all()
        ->sortByDesc('updated_at')
        ->toArray();

        return view('admin.vdo-admin', compact('data'));
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
                'nameVDO' => 'required',
                'detailVDO' => 'required',
                'linkVDO' => 'required'
            ]
        );

        //insert
        $data = new AdminVDOModel;
        $data->vdo_name = $request->nameVDO;
        $data->vdo_detail = $request->detailVDO;
        $data->vdo_link = $request->linkVDO;

        //save
        $data->save();

        return  redirect()->route('vdo.index')->with('success','บันทึกข้อมูลเรียบร้อย');
   
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
                'nameVDO' => 'required',
                'detailVDO' => 'required',
                'linkVDO' => 'required'
            ]
        );
        
        //search form id
        $data = AdminVDOModel::find($id);

        //add form id
        $data->shops_name = $request->nameVDO;
        $data->shops_detail = $request->detailVDO;
        $data->shops_link = $request->linkVDO;
    
        //save
        $data->save();

        return  redirect()->route('vdo.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
  
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
        $data = AdminVDOModel::find($id);

        //delete
        $data->delete();

        return redirect()->route('vdo.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
