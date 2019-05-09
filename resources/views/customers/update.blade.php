@extends('master')
@section('title','cập nhật khách hàng')
@section('pagename','Cập nhật khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('customers.update',['id'=>$customer->id])}}" enctype="multipart/form-data">
                    @csrf
{{--                    tạo ô input ẩn id để loại trừ validate ở trường hợp trùng--}}
                    <input type="hidden" name="id" value="{{$customer->id}}">
                    <div class="form-group">
                        <label class="form-group">customer name</label>
                        <input type="text" class="form-control" name="name" value="{{$customer->name}}">
                        @if($errors->has('name'))
                            <p style="color: #c51f1a">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">dob</label>
                        <input type="date" class="form-control" name="dob" value="{{$customer->dob}}">
                    </div>

                    <div class="form-group">
                        <label class="form-group">customer mail</label>
                        <input type="text" class="form-control" name="email" value="{{$customer->email}}">update

                        @if($errors->has('email'))
                            <p style="color: #c51f1a">{{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">city</label>
                        <select name="city_id">
                            @foreach($cities as $key=>$city)
                                <option value="{{$city->id}}"
                                {{$city->id == $customer->city_id ? "selected":""}}
                                 >{{$city->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-group">image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div>
                        <button type="submit" class="btn-outline-success">UPDATE</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection