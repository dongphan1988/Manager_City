@extends('master')
@section('title','list customers')
@section('namepage','List Customers')
@section('content')
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr style="background: #4dc0b5">
                    <th scope="col">STT</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if(count($cities) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($cities as $key => $citie)
                        <tr>
                            <th style="color: black" scope="row">{{ ++$key }}</th>
                            <td style="font-size: 25px">{{ $citie->name }}</td>
                            <td>{{ count($citie->customers) }}</td>
                            <td>
                                <a href="{{route('cities.edit',['id'=>$citie->id])}}">
                                    <button type="button" class="btn btn-outline-secondary">sửa</button>
                                </a>
                                <a href="{{route('cities.destroy',['id'=>$citie->id])}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa City {{$citie->name}}?')">
                                    <button type="button" class="btn btn-outline-danger">xóa</button>

                                </a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
@endsection