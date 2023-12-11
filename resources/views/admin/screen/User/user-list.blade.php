@extends('admin.layouts.main')
@section('content')
@if (Session::has('error'))
<div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if (Session::has('success'))
<div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
<div class="container pt-5">
    <div class="row ">
        <div class="col-md-12">
            <form action="{{route('user.search')}}" method="GET" enctype="multipart/form-data" id="form-search-user">
                
                <div class="row">
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" >
                                <label class="input-group-text" style="width:180px">User Name</label>
                            </div>
                            <input type="text" class="form-control" placeholder="User Name"  name="name" data-label="User Name" value="{{ $request->name ?? ''}}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:180px">Entered Date From</label>
                            </div>
                                <input  type="text" class="form-control datepicker" placeholder="Entered Date From" id = "entered_date_from"  name="entered_date_from" value="{{ $request->entered_date_from ?? ''}}" data-label="Entered Date From"><br>
                        </div>
                        @if ($errors->has('entered_date_from'))
                            <span class="text-danger">{{ $errors->first('entered_date_from') }}</span>
                        @endif
                    </div>
                    <div class="col-5 form-group">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:180px">Entered Date To</label>
                            </div>
                                <input type="text" class="form-control datepicker" placeholder="Entered Date To" id = "entered_date_to" name="entered_date_to" value="{{ $request->entered_date_to ?? ''}}" data-label="Entered Date To">
                        </div>
                        @if ($errors->has('entered_date_to'))
                            <span class="text-danger">{{ $errors->first('entered_date_to') }}</span>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                    </div>
                    <div class="col-6 form-group">
                        <x-Button class=" btn btn-primary" content="Search" id="btn_search" hidden/>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-6 d-flex justify-content-end">
                        <x-Button class=" btn btn-primary" content="Clear" id="clear"/>
                        <script>
                            $('#clear').click(function(){
                                $('input').val('');
                            })
                        </script>
                </div>
                <div class="col-6">
                    <x-Button class=" btn btn-primary" content="Search" id="buttonSearch" onclick="click_button()"/>
                    <script>
                        function click_button() {
                            document.getElementById("btn_search").click();
                        }
                    </script>
                </div>
            </div>
        </div>
        @if(!empty($users))
            @if(count($users)>0)
            <div class="col-6 form-group">
            </div>
            <div class="col-6 form-group mt-5">
                <div class="d-flex justify-content-start">
                    {{$users->appends(Request::all())->links('vendor.pagination.custom')}}
                </div>
            </div>
            <div class="col-md-12 " >
                <table class="table" style="width:1140px" style="1px solid black">
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Division Name</th>
                                <th>Entered Date</th>
                                <th>Position</th>
                            </tr>
                        @foreach($users as  $user)
                            <tr>
                                <td scope="col" style="width:198px; height: 60px;">
                                    @if ($userLogin->position_id == 0)
                                    <a href="{{route('user.update',$user->id)}}">{{Str::limit($user->name,20)}}</a></td>
                                    @else
                                    <label>{{Str::limit($user->name,20)}}</label>
                                    @endif
                                <td style="width:198px; height: 60px;"> {{Str::limit($user->email,20)}}</td>
                                <td style="width:198px; height: 60px;">{{Str::limit($user->division->name,20)}}</td>
                                <td>{{date('Y/m/d', strtotime($user->entered_date))}}</td>
                                <td>
                                    @switch($user->position_id)
                                        @case(0)
                                            <span class="status">General Director</span>
                                            @break
                            
                                        @case(1)
                                            <span class="status">Group Leader</span>
                                            @break
                                        @case(2)
                                            <span class="status">Leader</span>
                                            @break
                                        @case(3)
                                            <span class="status">Member</span>
                                            @break
                                        @default
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                </table>  
            </div> 
            @else
            <div class="col-12 alert alert-danger">
                <span>No Record</span>
            </div>       
            @endif
        @else    
        @endif 
               
    </div>
    <div class="row" {!!$userLogin->position_id != 0 ? 'style="display: none;"':''!!}>
        <div class="col-md-1 " >
            <form action="{{route('user.add')}}">
                <x-Button class=" btn btn-primary" content="Add New"/>
            </form>
        </div>
        @if(isset($users) && count($users)>0)
        <div class="col-md-1" >
            <form action="{{route('user.export')}}">
                <x-Button class="btn btn-primary" content="Output CSV"/>
            </form>
        </div>
        @endif
    </div>     
</div>
@endsection
@section('footer')
<script src="  {{asset('/js/admin/user/user-search.js')}}"></script>
<script src="  {{asset('/js/admin/common.js')}}"></script>
@endsection