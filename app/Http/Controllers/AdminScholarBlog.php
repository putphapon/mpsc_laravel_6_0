<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AdminScholarBlogModel;

class AdminScholarBlog extends Controller
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
        return route('scholar.index');
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
                'nameScholarBlog' => 'required',
                'authorScholarBlog' => 'required',
                'idScholarCategory' => 'required',
                'linkScholarBlog' => 'required'
            ]
        );

        //insert
        $data = new AdminScholarBlogModel;
        $data->scholar_blog_name = $request->nameScholarBlog;
        $data->scholar_blog_author = $request->authorScholarBlog;
        $data->scholar_category_id = $request->idScholarCategory;
        $data->scholar_blog_link = $request->linkScholarBlog;
    
        //save
        $data->save();

        return  redirect()->route('scholar.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameScholarBlog' => 'required',
                'authorScholarBlog' => 'required',
                'idScholarCategory' => 'required',
                'linkScholarBlog' => 'required'
            ]
        );

        //search form id
        $data = AdminScholarBlogModel::find($id);

        //add form id
        $data->scholar_blog_name = $request->nameScholarBlog;
        $data->scholar_blog_author = $request->authorScholarBlog;
        $data->scholar_category_id = $request->idScholarCategory;
        $data->scholar_blog_link = $request->linkScholarBlog;
    
        //save
        $data->save();

        return  redirect()->route('scholar.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $data = AdminScholarBlogModel::find($id);
        
        //delete
        $data->delete();

        return redirect()->route('manuscripts.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
