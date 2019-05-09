@extends('master')
@section('title','tạo mới khách hàng')
@section('pagename','tạo mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label class="form-group">customer name</label>
                        <input type="text" class="form-control" name="name">
                        @if($errors->has('name'))
                            <p style="color: #c51f1a">{{$errors->first('name')}}</p>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">dob</label>
                        <input type="date" class="form-control" name="dob">
                    </div>

                    <div class="form-group">
                        <label class="form-group">customer mail</label>
                        <input type="text" class="form-control" name="email">
                        @if($errors->has('email'))
                            <p style="color: #c51f1a">{{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">city</label>
                        <select name="city_id">
                            @foreach($cities as $key=>$city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-group">image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div>
                        <button type="submit" class="btn-outline-success">ADD CUSTOMER</button>
                        <a href="{{route('customers.index')}}">
                        <button type="button" class="btn-outline-primary">BACK HOME</button>
                        </a>
                    </div>
                </form>
{{--@if(isset($errors))--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        <p>{{$error}}</p>--}}
{{--        @endforeach--}}
{{--    @endif--}}
            </div>

        </div>

    </div>
    @endsection