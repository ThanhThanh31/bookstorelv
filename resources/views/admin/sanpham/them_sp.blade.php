<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
<div class="container">
    <h1 style="text-align: center; padding-top: 10px;">Thêm sản phẩm </h1>
    <form action="{{ route('sanpham.add') }}" method="POST" style="text-align: center">
        @csrf
        <div class="form-group row">
        <lable for=""> Tên sản phẩm</lable>
        <input type="text" name="tensp">
        </div>
        <br>
        <div class="form-group row">
        <lable for="">Mô tả</lable>
        <textarea name="mota" id="" cols="30" rows="5"></textarea></div>
        <br>
        <div class="form-group row">
        <lable for="">Cách dùng</lable>
        <textarea name="cachdung" id="" cols="30" rows="5"></textarea></div>
        <br>
        <div class="form-group row">
        <lable for="">Trạng thái</lable>
        <input type="text" name="trangthai"></div>
        <br>
        <div class="form-group row">
        <lable for="">Loại sản phẩm</lable>
        <select name="LoaiSanPham">
        @foreach ($danhSach as $item => $key)
        <option value="{{ $key->l_id }}">{{$key->l_ten}}</option>
        @endforeach
        </select></div>
        <br>
    <button type="submit">Thêm</button>
</form>
</div>
</body>
</html>
