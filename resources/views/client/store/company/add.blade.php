@extends('client.store.template.master')
@section('title-page')
    Chọn công ty phát hành
@endsection
@section('title-page-detail')
    Công ty phát hành
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('issuer.pick')}}">
                        @csrf
                        @foreach ($checkIssuer as $it)
                            <div class="form-check-inline">
                                    <input name="iss[]" style="margin-left: 20px" class="form-check-input" type="checkbox" id="" value="{{ $it->cty_id }}">
                                    <label class="form-check-label" for=""> {{ $it->cty_ten }}</label>
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
