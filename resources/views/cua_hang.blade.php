<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <h1>Thêm tỉnh thành phố </h1>
    <form action="{{ route('tinh_thanhpho.store') }}" method="POST">
        @csrf
        <!-- <lable for=""> Tỉnh thành phố</lable>
        <input type="text" name="tenCH">
        <br> -->
        <lable for="">Tên tỉnh</lable>
    <!-- <textarea name="mota" id="" cols="30" rows="10"></textarea> -->
    <input type="text" name="tenTinh">
    <br>
    <button type="submit">Thêm</button>
</form>
</body>
</html>