@extends('layout.app')
@section('content')
<h1>danh sách khách hàng</h1>
<a href="{{route('customers.create')}}">them khách hàng</a>
<form action="" method="get">
    <input type="text" name="search" value="{{$search}}">
    <button class="btn btn-info">
    search
</button>


</form>
<div class="table-responsive">
            <table border="1" width="50%" class="table">
                <tr>
                    <th>
                        Họ và tên
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Giới tính
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Ảnh đại diện
                    </th>
                </tr>
                @foreach($listCustomer as $customer)
                <tr>
                    <td>
                        {{$customer->full_name}}
                    </td>
                    <td>
                        {{$customer->email}}
                    </td>
                    <td>
                        {{$customer->gioitinh}}
                    </td>
                    <td>
                        {{$customer->phone}}
                    </td>
                    <td width="20%">
                        <img src="{{ asset('images/' . $customer->image) }}" width="100px">
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
@endsection