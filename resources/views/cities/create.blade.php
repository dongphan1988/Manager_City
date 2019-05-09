@extends('master')
@section('title', 'Thêm mới tỉnh thành')
@section('namepage', 'Thêm mới tỉnh thành')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route("cities.store")}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên thành phố</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name">
                        @if($errors->has('name'))
                            <p style="color: #c51f1a">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>

                </div>
            </div>
        </div>

    @endsection