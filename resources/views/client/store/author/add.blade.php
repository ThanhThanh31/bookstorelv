@extends('client.store.template.master')
@section('title-page')
    Chọn tác giả
@endsection
@section('title-page-detail')
    Tác giả
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('writer.choice')}}">
                        @csrf
                        @foreach ($checkAuthor as $item)
                            <div class="form-check-inline">
                                    <input name="effect[]" style="margin-left: 20px" class="form-check-input" type="checkbox" id="" value="{{ $item->tg_id }}">
                                    <label class="form-check-label" for=""> {{ $item->tg_ten }}</label>
                            </div>
                            <br>
                        @endforeach
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
