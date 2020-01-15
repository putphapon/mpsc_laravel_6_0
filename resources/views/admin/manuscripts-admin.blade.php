@extends('layouts.layout-admin')

@section('title-bar', 'Manuscripts')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">ธารความรู้</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- tabs tabHead --}}
    <ul class="nav nav-tabs" id="tabHead" role="tablist">
        {{-- tab-1 --}}
        <li class="nav-item">
            <a class="nav-link active" id="tab-1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">บทความ</a>
        </li>

        {{-- tab-2 --}}
        <li class="nav-item">
            <a class="nav-link" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">หมวด</a>
        </li>

        {{-- tab-3 --}}
        <li class="nav-item">
            <a class="nav-link" id="tab-3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">แท๊ก</a>
        </li>
        
    </ul>
    {{-- ------------------------------------------------------------------ --}}
    {{-- tabs tabsBody --}}
    <div class="tab-content" id="tabBody">
        {{-- tab-1 --}}
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">บทความ</h3>
                    </div>
                </div>
               
                {{-- form --}}
                <div class="row">
                    <div class="col">
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-manuscripts-blog-form" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-blog-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ '' }}" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-manuscripts-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- name --}}
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsBlog">ชื่อบทความ</label>
                                                        <input type="text" name="nameManuscriptsBlog" value="" class="form-control">
                                                    </div>
                                                    
                                                    {{-- detial --}}
                                                    <div class="form-group">
                                                        <label for="detialManuscriptsBlog">คำเกริ่น</label>
                                                        <textarea name="detialManuscriptsBlog" value="" class="form-control" row="5"></textarea>
                                                    </div>

                                                    {{-- image --}}
                                                    <div class="form-group">
                                                        <label for="imageManuscriptsBlog">รูปภาพบทความ</label>                                                               
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="file" class="form-control-file"  name="imageManuscriptsBlog" value="">
                                                    </div>

                                                    {{-- catagory --}}
                                                    <div class="form-group">
                                                        <label for="catagoryManuscriptsBlog">หมวด</label>
                                                        <select class="custom-select" name="categoryManuscriptsBlog">
                                                            <option selected>เลือกหมวด</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>                                   
                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                    </div>

                                                    {{-- tag --}}
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsBlog">แท๊ก</label>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            เลือกแท๊ก
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                {{-- @foreach ( as ) --}}
                                                                    <div class="form-check dropdown-item">
                                                                        <input class="form-check-input" type="checkbox" name="tagManuscriptsBlog" value="">
                                                                        <label class="form-check-label">แท๊ก 1</label>
                                                                    </div>
                                                                {{-- @endforeach --}}
                                                            </div>
                                                        </div>
                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มแท๊ก ให้ไปที่แทบ 'แท๊ก'</small>
                                                    </div>

                                                    {{-- link --}}
                                                    <div class="form-group">
                                                        <label for="linkManuscriptsBlog">ลิ้งค์ดาวน์โหลดไฟล์</label>
                                                        <input type="text" name="linkManuscriptsBlog" value="" class="form-control">                                    
                                                        <small class="form-text text-muted">ลิ้งค์แชร์ไฟล์ จาก Google Drive (*อย่าลืมเปิดแชร์ไฟล์ก่อนนำมากรอกลงฟอร์ม)</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- button Insert --}}
                        <div class="row float-right mr-1">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-manuscripts-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        </div>
                        
                    </div>
                </div>
                <br>
                
                {{-- data --}}
                <div class="row">    
                    <div class="col">
                        <table class="table table-sm table-hover">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อบทความ</th>
                                    <th scope="col">คำเกริ่น</th>
                                    <th scope="col">รูปภาพบทความ</th>
                                    <th scope="col">หมวด</th>
                                    <th scope="col">แท๊ก</th>
                                    <th scope="col">ไฟล์</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $item)  --}}
                                <tr>
                                    {{-- No. $loop->iteration--}}
                                    <th scope="row">{{ '' }}</th>
                                    {{-- Name --}}
                                    <td>{{ '' }}</td>
                                    {{-- Detial --}}
                                    <td>{{ '' }}</td>
                                    {{-- Image --}}
                                    <td>                        
                                        <img 
                                        {{-- cut sting '/public/' --}}
                                        src="{{ '' }}" 
                                        alt="{{ '' }}"
                                        class="rounded" style="height: 100px;">
                                    </td>
                                    
                                    {{-- Category --}}
                                    <td>{{ '' }}</td>
                                    
                                    {{-- Tag --}}
                                    <td>
                                        {{-- @foreach ( as )
                                            {{ '' }}<br>
                                        @endforeach --}}
                                    </td>

                                    {{-- Link --}}
                                        {{-- @if('') ถ้าไฟล์--}}
                                    <td><i class="fa fa-check bg-success p-1" aria-hidden="true"></i>
                                    {{-- @else --}}
                                    <i class="fa fa-close bg-danger p-1" aria-hidden="true"></i></td>
                                    {{-- @endif --}}

                                    {{-- Edit --}}
                                    <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-manuscripts-blog-form-edit-{{''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-manuscripts-blog-form-edit-{{''}}" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-blog-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ '' }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-manuscripts-blog-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    {{-- name --}}
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsBlog">ชื่อบทความ</label>
                                                                        <input type="text" name="nameManuscriptsBlog" value="{{ '' }}" class="form-control">
                                                                    </div>
            
                                                                    {{-- detial --}}
                                                                    <div class="form-group">
                                                                        <label for="detialManuscriptsBlog">คำเกริ่น</label>
                                                                        <textarea name="detialManuscriptsBlog" value="{{ '' }}" class="form-control" row="5"></textarea>
                                                                    </div>

                                                                    {{-- image --}}
                                                                    <div class="form-group">
                                                                        <label for="imageManuscriptsBlog">รูปภาพบทความ :: {{ '' }}</label>
                                                                        <input type="hidden" name="_method" value="PUT" > 
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="file" name="imageManuscriptsBlog" value="" class="form-control-file">
                                                                        <img src="{{ '' }}" alt="{{ '' }}" class="p-2 rounded" style="height: 100px;">
                                                                    </div> 
                                                                    
                                                                    {{-- category --}}
                                                                    <div class="form-group">
                                                                        <label for="categoryManuscriptsBlog">หมวด</label>
                                                                        <select class="custom-select" name="categoryManuscriptsBlog">
                                                                            <option selected>เลือกหมวด</option>
                                                                            {{-- @foreach ( as ) --}}
                                                                                <option value="{{ '' }}">One</option>
                                                                            {{-- @endforeach --}}
                                                                        </select>                                   
                                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                                    </div>

                                                                    {{-- tag --}}
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsBlog">แท๊ก</label>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            เลือกแท๊ก
                                                                            </button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                {{-- @foreach ( as ) --}}
                                                                                    <div class="form-check dropdown-item">
                                                                                        <input class="form-check-input" type="checkbox" name="tagManuscriptsBlog" value="{{ '' }}">
                                                                                        <label class="form-check-label">{{ '' }}แท๊ก 1</label>
                                                                                    </div>
                                                                                {{-- @endforeach --}}
                                                                            </div>
                                                                        </div>
                                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มแท๊ก ให้ไปที่แทบ 'แท๊ก'</small>
                                                                    </div>
                
                                                                    {{-- link --}}
                                                                    <div class="form-group">
                                                                        <label for="linkManuscriptsBlog">ลิ้งค์ดาวน์โหลดไฟล์</label>
                                                                        <input type="text" name="linkManuscriptsBlog" value="{{ '' }}" class="form-control">                                    
                                                                        <small class="form-text text-muted">ลิ้งค์แชร์ไฟล์ จาก Google Drive (*อย่าลืมเปิดแชร์ไฟล์ก่อนนำมากรอกลงฟอร์ม)</small>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" value="Submit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete --}}
                                    <td>
                                        <form class="delete_form" action="{{ '' }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">                            
                                            <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            
                {{-- page nav --}}
                {{-- <div class="row">
                    <div class="col">
                        <div aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><<</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- tab-2 --}}
        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">หมวด</h3>
                    </div>
                </div>
            
                {{-- form --}}
                <div class="row">
                    <div class="col">
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-manuscripts-category-form" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-category-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ '' }}" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-manuscripts-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsCategory">ชื่อหมวด</label>
                                                        <input type="text" name="nameManuscriptsCategory" value="" class="form-control">
                                                    </div>
            
                                                    <div class="form-group">
                                                        <label for="linkManuscriptsCategory">คำเกริ่น</label>
                                                        <textarea name="linkManuscriptsCategory" value="" class="form-control" row="5"></textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="imageManuscriptsCategory">รูปภาพหมวด</label>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="file" name="imageManuscriptsCategory" value="" class="form-control-file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- button Insert --}}
                        <div class="row float-right mr-1">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-manuscripts-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        </div>
                        
                    </div>
                </div>
                <br>
                
                {{-- data --}}
                <div class="row">    
                    <div class="col">
                        <table class="table table-sm table-hover">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อหมวด</th>
                                    <th scope="col">คำเกริ่น</th>
                                    <th scope="col">รูปภาพหมวด</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $item)  --}}
                                <tr>
                                    {{-- No. $loop->iteration--}}
                                    <th scope="row">{{ '' }}</th>
                                    {{-- Name --}}
                                    <td>{{ '' }}</td>
                                    {{-- URL link --}}
                                    <td>{{ '' }}</td>
                                    {{-- Image --}}
                                    <td>                        
                                        <img 
                                        {{-- cut sting '/public/' --}}
                                        src="{{ '' }}" 
                                        alt="{{ '' }}"
                                        class="rounded" style="height: 100px;">
                                    </td>
                                    {{-- Edit --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-manuscripts-category-form-edit-{{''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-manuscripts-category-form-edit-{{''}}" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-category-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ '' }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-manuscripts-category-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsCategory">ชื่อหมวด</label>
                                                                        <input type="text" name="nameManuscriptsCategory" value="{{ '' }}" class="form-control">
                                                                    </div>
            
                                                                    <div class="form-group">
                                                                        <label for="linkManuscriptsCategory">คำเกริ่น</label>
                                                                        <textarea name="linkManuscriptsCategory" value="{{ '' }}" class="form-control" row="5"></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="imageManuscriptsCategory">รูปภาพหมวด :: {{ '' }}</label>
                                                                        <input type="hidden" name="_method" value="PUT" > 
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <input type="file" name="imageManuscriptsCategory" value="" class="form-control-file">
                                                                        <img src="{{ '' }}" alt="{{ '' }}" class="p-2 rounded" style="height: 100px;">
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" value="Submit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete --}}
                                    <td>
                                        <form class="delete_form" action="{{ '' }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">                            
                                            <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            
                {{-- page nav --}}
                {{-- <div class="row">
                    <div class="col">
                        <div aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><<</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        
        {{-- tab-3 --}}
        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">แท๊ก</h3>
                    </div>
                </div>
            
                {{-- form --}}
                <div class="row">
                    <div class="col">
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-manuscripts-tag-form" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-tag-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ '' }}" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-manuscripts-tag-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsTag">ชื่อแท๊ก</label>
                                                        <input type="text" name="nameManuscriptsTag" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- button Insert --}}
                        <div class="row float-right mr-1">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-manuscripts-tag-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        </div>
                        
                    </div>
                </div>
                <br>
                
                {{-- data --}}
                <div class="row">    
                    <div class="col">
                        <table class="table table-sm table-hover">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อแท๊ก</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $item)  --}}
                                <tr>
                                    {{-- No. $loop->iteration--}}
                                    <th scope="row">{{ '' }}</th>

                                    {{-- Name --}}
                                    <td>{{ '' }}</td>

                                    {{-- Edit --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-manuscripts-tag-form-edit-{{''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-manuscripts-tag-form-edit-{{''}}" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-tag-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ '' }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-manuscripts-tag-form-edit-{{''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsTag">ชื่อแท๊ก</label>
                                                                        <input type="text" name="nameManuscriptsTag" value="{{ '' }}" class="form-control">
                                                                    </div>
                                                                                                                                      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" value="Submit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete --}}
                                    <td>
                                        <form class="delete_form" action="{{ '' }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">                            
                                            <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            
                {{-- page nav --}}
                {{-- <div class="row">
                    <div class="col">
                        <div aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><<</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</div>
@endsection