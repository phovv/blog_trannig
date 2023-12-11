@extends('admin.layouts.main')
@section('content')
@include('admin.partials.alert')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-12">
            <form action="{{isset($user)?route('user.handleUpdate', $user->id):route('user.handleAdd')}}" method="POST" enctype="multipart/form-data" id="form-addupdate-user">
                @csrf
                <div class="row">
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">ID</label>
                            </div>
                            <label class="form-control" {!! !isset($user->id)? 'style="display:none"':'' !!} >{{$user->id??''}}</label>
                        </div>
                        
                    </div>
                    @if($userLogin->position_id!=0)
                    <div class="col-6 form-group" >
                        <div class="input-group " >
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:200px">User Name</label>
                                </div>
                                <input type="text" class="form-control" style="height:auto;" name="name" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Email</label>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" data-label="Email" style="width:356px" readonly>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Division</label>
                            </div>
                            <select class="form-control" name="division_id" style="width:356px" data-label="Division" readonly>
                                <option value="{{$user->division_id}}" readonly>{{$user->division->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Entered Date</label>
                            </div>
                            <input type="text" class="form-control" placeholder="Entered Date" name="entered_date"  value="{{date('Y/m/d', strtotime($user->entered_date))}}" data-label="Entered Date" style="width:356px" readonly >
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Position</label>
                            </div>
                            <select class="form-control" name="position_id" style="width:356px" data-label="Position" readonly>
                                    @switch($user->position_id)
                                        @case(0)
                                        <option value="0" style="height:auto;" readonly>General Director</option>
                                        @break
                                        @case(1)
                                        <option value="1" style="height:auto;" readonly>Group Leader</option>
                                        @break
                                        @case(2)
                                        <option value="2" style="height:auto;" readonly>Leader</option>
                                        @break
                                        @case(3)
                                        <option value="3" style="height:auto;" readonly>Member</option>
                                        @break
                                        @default
                                        <option value="{{$user->position_id}}"></option>
                                    @endswitch
                            </select>
                        </div>
                    </div>
                    @else
                    <div class="col-6 form-group" >
                        <div class="input-group " >
                                <div class="input-group-prepend">
                                    <label class="input-group-text" style="width:200px">User Name</label>
                                </div>
                                <input type="text" class="form-control" placeholder="User Name" name="name" value="{{$user->name ?? old('name')}}" data-label="User Name" style="width:356px" >
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Email</label>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email ?? old('email')}}" data-label="Email" style="width:356px" >
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Division</label>
                            </div>
                            <select class="form-control" name="division_id" style="width:356px" data-label="Division">
                                <option value="{{$user->division_id ??''}}">{{$user->division->name??''}}</option>
                                @if(isset($user))
                                <option></option>
                                    @foreach($divisions as $division)
                                        {!! $user->division_id!=$division->id ? '<option value="'.$division->id.'">'.$division->name.'</option>':'' !!} 
                                    @endforeach
                                @else
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Entered Date</label>
                            </div>
                            <input type="text" class="form-control" placeholder="Entered Date" name="entered_date" id="entered_date" value="{{isset($user->entered_date)? date('Y/m/d', strtotime($user->entered_date)):old('entered_date')}}" data-label="Entered Date" style="width:356px" >
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Position</label>
                            </div>
                            <select class="form-control" name="position_id" style="width:356px" data-label="Position">
                                @if(isset($user))
                                    @switch($user->position_id)
                                        @case(0)
                                        <option value="0">General Director</option>
                                        @break
                                        @case(1)
                                        <option value="1">Group Leader</option>
                                        @break
                                        @case(2)
                                        <option value="2">Leader</option>
                                        @break
                                        @case(3)
                                        <option value="3">Member</option>
                                        @break
                                        @default
                                        <option value="{{$user->position_id}}" ></option>
                                    @endswitch
                                <option></option>
                                <option value="0" {!!$user->position_id == '0'? 'style="display: none;"':''!!}>General Director</option>
                                <option value="1" {!!$user->position_id ==1? 'style="display: none;"':''!!}>Group Leader</option>
                                <option value="2" {!!$user->position_id ==2? 'style="display: none;"':''!!}>Leader</option>
                                <option value="3" {!!$user->position_id ==3? 'style="display: none;"':''!!}>Member</option>
                                @else
                                    <option></option>
                                    <option value="0">General Director</option>
                                    <option value="1">Group Leader</option>
                                    <option value="2">Leader</option>
                                    <option value="3">Member</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Password</label>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" oninput="myFunction()" id="password" data-label="Password" style="width:356px" >
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" style="width:200px">Password Confirmation</label>
                            </div>
                            <input type="password" class="form-control" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" data-label="Password Confirmation" style="width:356px" >
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("password").value;
                                    if(x==''){
                                        $("#password_confirmation").rules('remove','required');
                                    }else{
                                        $("#password_confirmation").rules('add', {
                                        required: true,
                                    });
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-1 form-group">
                    <x-Button class=" btn btn-primary" content="Button" id="buttonUser" hidden/>
                    </div>
                    <script>
                        function click_button() {
                            document.getElementById("buttonUser").click();
                        }
                    </script>
                </div>
            </form>
            <div class="row">
                @if(isset($user->id))
                @else
                <div class="col-1">
                    <x-Button class=" btn btn-primary" content="Register" id="buttonRegister" onclick="click_button()" />
                </div>
                @endif
                @if($userLogin->position_id == 0 && !isset($user->id))
                @else
                <div class="col-1">
                    <x-Button class=" btn btn-primary" content="Update" id="buttonUpdate" onclick="click_button()"/>
                </div>
                @if($userLogin->position_id != 0)
                @else
                <div class="col-1">
                    <x-Button class=" btn btn-primary" content="Delete" id="buttonDelete" onclick="removeRow({{$user->id??''}},'/admin/user/destroy')"/>
                </div>
                @endif
                @endif
                <div class="col-1">
                    <form action="{{route('user.listUser')}}">
                        <x-Button class=" btn btn-primary" content="Cancel" id="buttonCancel" />
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('footer')
@if(isset($user))
<script src="  {{asset('/js/admin/user/user-update.js')}}"></script>
@else
<script src="  {{asset('/js/admin/user/user-add.js')}}"></script>
@endif
<script src="  {{asset('/js/admin/user/user-delete.js')}}"></script>
<script src="  {{asset('/js/admin/common.js')}}"></script>
@endsection