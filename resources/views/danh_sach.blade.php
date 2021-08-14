<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
</head>
<body>
    <h1>Danh sách Tỉnh</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Tên tỉnh</th>
        </tr>
        <?php $stt =1; ?>
        @foreach ($danhSachTinh as $item)
        <tr>
            <td>{{ $stt ++ }}</td>
            <td>{{ $item->ttp_ten }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>