
@extends('master')
@section('title', 'update city')
@section('namepage', 'Update City')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('cities.update',['id'=>$city->id])}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$city->id}}"/>

                    <div class="form-group">
                        <label>Tên thành phố</label>
                        <input type="text" class="form-control" name="name" value="{{ $city->name }}" >
                        @if($errors->has('name'))
                            <p style="color: #c51f1a">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection