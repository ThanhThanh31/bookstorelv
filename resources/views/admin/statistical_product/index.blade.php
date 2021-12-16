@extends('admin.template.master')
@section('title-page')
Thống kê sản phẩm
@endsection
@section('title-page-detail')
Thống kê sản phẩm
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('admin.align') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <!-- LINE CHART -->
            <div class="card card-info">
                <!-- /.chartjs - start -->
                <div class="card-body">
                    <!-- /.lọc bài viet - start -->
                    <div class="row">
                        <div class="col-md-12">
                            <label class="title_thongke">Thống kê sản phẩm</label>
                            <form>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <p>Từ ngày <input name="tuNgay" type="date" id="tuNgay" class="form-control"></p>
                                        <input type="button" id="btn-dashboard-filters" class="btn btn-primary btn-sm"
                                            value="Lọc kết quả"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Đến ngày <input name="denNgay" type="date" id="denNgay" class="form-control"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>
                                            Lọc theo
                                            <select class="dashboard-filters form-control">
                                                <option>--- Chọn ---</option>
                                                <option value="7ngay">7 ngày qua</option>
                                                <option value="thangtruoc">Tháng trước</option>
                                                <option value="thangnay">Tháng này</option>
                                                <option value="thang9">Trong tháng 9</option>
                                                <option value="365ngayqua">365 ngày qua</option>
                                            </select>
                                        </p>
                                    </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                                <div id="chartjs" style="height: 250px"></div>
                        </div>
                    </div>
                    <!-- /.lọc bài viet - end -->
                </div>
                <!-- /.chartjs - end -->
            </div>
            <!-- LINE CHART -->
        </div>
    </section>
    @push('statistical-product')
        <script>
            $(document).ready(function() {
                chart90dayspost();
                var chart = new Morris.Bar({
                element: 'chartjs',
                //option chart
                lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3'],
                xkey: ['created_at'],
                parseTime: false,
                ykeys: ['san_pham'],
                hideHover: 'auto',
                labels: ['sản phẩm']
                });

                function chart90dayspost(){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "/admin/days-product",
                        method: "POST",
                        dataType: "json",
                        data:{
                            _token:_token
                        },

                        success:function(data)
                            {
                                chart.setData(data);
                            }
                    });
                }

                $('#btn-dashboard-filters').click(function(e) {
                    e.preventDefault();
                    var _token = $('input[name="_token"]').val();
                    var tuNgay = $('#tuNgay').val();
                    var denNgay = $('#denNgay').val();

                    $.ajax({
                        url: "/admin/filter-product-by-date",
                        type: "get",
                        dataType: "json",
                        data: {
                            tuNgay: tuNgay,
                            denNgay: denNgay,
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                });

                $('.dashboard-filters').change(function(e){
                    e.preventDefault();
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    // alert(dashboard_value);
                    $.ajax({
                        url: "/admin/dashboard-filter-product",
                        method:"POST",
                        dataType: "json",
                        data: {
                            dashboard_value:dashboard_value,
                            _token:_token
                        },

                        success:function(data)
                            {
                                chart.setData(data);
                            }
                        });

                });
            });
        </script>
    @endpush
@endsection
