@extends('layouts.layout-admin')

@section('title-bar', 'Events')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">กิจกรรม</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- form --}}
    <div class="row">
        <div class="col">
            {{-- Modal Insert --}}
            <div class="modal fade" id="admin-events-form" tabindex="-1" role="dialog" aria-labelledby="admin-events-form" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    {{-- form --}}
                    <form action="{{ '' }}" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="admin-events-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        {{-- name --}}
                                        <div class="form-group">
                                            <label for="nameEvents">ชื่อกิจกรรม</label>
                                            <input type="text" name="nameEvents" value="" class="form-control">
                                        </div>

                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="imageEvents">รูปภาพ</label>                                                               
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="file" class="form-control-file"  name="imageEvents" value="">
                                        </div>
                                        
                                        {{-- Date --}}
                                        <div class="form-group">
                                            <label for="dateEvents">วันที่</label>
                                            <input type="date" name="dateEvents" value="" class="form-control">
                                        </div>

                                        {{-- Where --}}
                                        <div class="form-group">
                                            <label for="whereEvents">สถานที่</label>
                                            <input type="text" name="whereEvents" value="" class="form-control">
                                        </div>

                                        {{-- Register --}}
                                        <div class="form-group">
                                            <label for="regLinkEvents">link ลงทะเบียน</label>
                                            <input type="text" name="regLinkEvents" value="" class="form-control">
                                        </div>

                                        {{-- link image Google Drive --}}
                                        <div class="form-group">
                                            <label for="imageLinkEvents">link แฟ้มรูปภาพ</label>
                                            <input type="text" name="imageLinkEvents" value="" class="form-control">                                    
                                            <small class="form-text text-muted">ลิ้งค์แชร์แฟ้มรูปภาพ จาก Google Drive (*อย่าลืมเปิดแชร์แฟ้มก่อนนำมากรอกลงฟอร์ม)</small>                                            
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-events-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
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
                        <th scope="col">ชื่อกิจกรรม</th>
                        <th scope="col">รูปภาพ</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">สถานที่</th>
                        <th scope="col">link ลงทะเบียน</th>
                        <th scope="col">link รูปภาพ</th>
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
                        {{-- Image --}}
                        <td>                        
                            <img 
                            {{-- cut sting '/public/' --}}
                            src="{{ '' }}" 
                            alt="{{ '' }}"
                            class="rounded" style="height: 100px;">
                        </td>
                        {{-- Date --}}
                        <td>{{ '' }}</td>
                        {{-- Where --}}
                        <td>{{ '' }}</td>
                        {{-- Register --}}
                            {{-- @if( $item['regLinkEvents']) ถ้าไฟล์--}}
                            <td><i class="fa fa-check bg-success p-1" aria-hidden="true"></i>
                            {{-- @else --}}
                            <i class="fa fa-close bg-danger p-1" aria-hidden="true"></i></td>
                            {{-- @endif --}}

                        {{-- link image Google Drive --}}
                            {{-- @if( $item['imageLinkEvents']) ถ้าไฟล์--}}
                            <td><i class="fa fa-check bg-success p-1" aria-hidden="true"></i>
                            {{-- @else --}}
                            <i class="fa fa-close bg-danger p-1" aria-hidden="true"></i></td>
                            {{-- @endif --}}

                        {{-- Edit --}}
                        <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-events-form-edit-{{''}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="admin-events-form-edit-{{''}}" tabindex="-1" role="dialog" aria-labelledby="admin-events-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form action="{{ '' }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="admin-events-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        {{-- name --}}
                                                        <div class="form-group">
                                                            <label for="nameEvents">ชื่อกิจกรรม</label>
                                                            <input type="text" name="nameEvents" value="{{ '' }}" class="form-control">
                                                        </div>

                                                        {{-- image --}}
                                                        <div class="form-group">
                                                            <label for="imageEvents">รูปภาพ :: {{ '' }}</label>
                                                            <input type="hidden" name="_method" value="PUT" > 
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="file" name="imageEvents" value="" class="form-control-file">
                                                            <img src="{{ '' }}" alt="{{ '' }}" class="rounded p-2 " style="height: 100px;">
                                                        </div> 
                                                        
                                                        {{-- Date --}}
                                                        <div class="form-group">
                                                            <label for="dateEvents">วันที่</label>
                                                            <input type="date" name="dateEvents" value="{{ '' }}" class="form-control">
                                                        </div>

                                                        {{-- Where --}}
                                                        <div class="form-group">
                                                            <label for="whereEvents">สถานที่</label>
                                                            <input type="text" name="whereEvents" value="{{ '' }}" class="form-control">
                                                        </div>

                                                        {{-- Register --}}
                                                        <div class="form-group">
                                                            <label for="regLinkEvents">link ลงทะเบียน</label>
                                                            <input type="text" name="regLinkEvents" value="{{ '' }}" class="form-control">
                                                        </div>

                                                        {{-- link image Google Drive --}}
                                                        <div class="form-group">
                                                            <label for="imageLinkEvents">link แฟ้มรูปภาพ</label>
                                                            <input type="text" name="imageLinkEvents" value="{{ '' }}" class="form-control">                                    
                                                            <small class="form-text text-muted">ลิ้งค์แชร์แฟ้มรูปภาพ จาก Google Drive (*อย่าลืมเปิดแชร์แฟ้มก่อนนำมากรอกลงฟอร์ม)</small>                                            
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
@endsection