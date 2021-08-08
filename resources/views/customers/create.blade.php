@extends('layout.app')
@section('content')
<h1 align="center">thêm khách hàng</h1>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-3"></div>
    </div>
</div>

<form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1" align="center">
        <tr>
            <td>
                Họ và tên <input type="text" name="full_name">
            </td>
        </tr>
        <tr>
            <td>
                Email <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>
                giới tính <input type="radio" name="gender" value="1"> nam
                <input type="radio" name="gender" value="0"> nữ
            </td>
        </tr>
        <tr>
            <td>
                Phone <input type="text" name="phone">
            </td>
        </tr>
        <tr>
            <td>
                avatar <input type="file" name="image">
            </td>
        </tr>
        <tr>
            <td>
                <button>thêm</button>
            </td>
        </tr>
    </table>
</form>
@endsection