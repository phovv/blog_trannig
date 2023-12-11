@extends('admin.layouts.main')
@section('content')
@include('admin.partials.alert')
@if (Session::has('failures'))
<div class="alert alert-danger">
    @foreach (Session::get('failures') as $validate)
    <p>Dòng: {{$validate->row()}}@foreach($validate->errors() as $e){{$e}}@endforeach</p>
    @endforeach
    </div>
@endif
<div class="container pt-5">
    <div class="row ">
        <div class="col-6">
        </div>
        <div class="col-6 mt-5">
            <div class="d-flex justify-content-end">
                {{$divisions->appends(Request::all())->links('vendor.pagination.custom')}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12 " >
                <table class="table" style="width:1140px" style="1px solid black">
                    <tr>
                        <th>ID</th>
                        <th>Division Name</th>
                        <th>Division Note</th>
                        <th>Dividion Leader</th>
                        <th>Floor Number</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Deleted Date</th>
                    </tr>
                     @if(count($divisions)>0)
                        @foreach($divisions as  $division)
                            <tr>
                                <td scope="col" style="width:198px; height: 60px;">{{$division->id}}</td>
                                <td style="width:198px; height: 60px;">{{Str::limit($division->name,20)}}</td>
                                <td style="width:198px; height: 60px;">{{Str::limit($division->note,20)}}</td>
                                <td style="width:198px; height: 60px;">{{Str::limit($division->user->name,20)}}</td>
                                <td style="width:198px; height: 60px;">{{$division->division_floor_num}}</td>
                                <td style="width:198px; height: 60px;">{{date('Y/m/d', strtotime($division->created_date))}}</td>
                                <td style="width:198px; height: 60px;">{{date('Y/m/d', strtotime($division->updated_date))}}</td>
                                <td style="width:198px; height: 60px;">{{isset($division->deleted_date) ? date('Y/m/d', strtotime($division->deleted_date)) : ''}}</td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="8">
                                    <div class="col-12 alert alert-danger">
                                        <span>No Record</span>
                                    </div>
                                </td>
                            </tr>   
                    @endif
                </table>  
            </div> 
        </div>    
    </div>
    <div class="row">
        <div class="col-md-1 " >
            <form action="{{ route('division.import') }}" method="POST" enctype="multipart/form-data" id="import-division">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" class="form-control" id="file" data-label="customFile" hidden>
                    <button class="btn btn-primary" id="btn_import" onclick="open_file()" hidden></button>
                </div>
            </form>
            <button class="btn btn-primary" onclick="open_file()">Import CSV</button>
        </div>
    </div>     
</div>
@if (Session::has('errorImport'))
<script>alert("IDが存在しておりません。"); </script>
@endif
@endsection
@section('footer')
<script src="{{asset('/js/admin/common.js')}}"></script>
<script src="{{asset('/js/admin/division/division-import.js')}}"></script>
@endsection