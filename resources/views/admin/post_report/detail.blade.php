@extends('admin.template.master')
@section('title-page')
    Chi tiết báo cáo bài viết
@endsection
@section('title-page-detail')
    Báo Cáo Vi Phạm - Bài Viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('post.report') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>STT</th>
                            <th>Tên bài viết</th>
                            <th>Tên người báo cáo</th>
                            <th>Nội dung báo cáo</th>
                            <th>Thời gian báo cáo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($list as $item)
                            <tr style="text-align: center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $item->bv_tieude }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->bb_noidung }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
