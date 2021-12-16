@extends('admin.template.master')
@section('title-page')
    Thống kê người dùng
@endsection
@section('title-page-detail')
    Thống kê người dùng
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('admin.list') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <!-- LINE CHART -->
            <div class="card card-info">
                <!-- /.chartjs - start -->
                <div class="card-body">
                    <!-- /.lọc bài viet - start -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="title_thongke">Thống kê người dùng</p>
                            <form>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <p>Từ ngày <input name="tu_ngay" type="date" id="tu_ngay" class="form-control"></p>
                                        <input type="button" id="btn-dashboard-choose" class="btn btn-primary btn-sm"
                                            value="Lọc kết quả"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Đến ngày <input name="den_ngay" type="date" id="den_ngay" class="form-control"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>
                                            Lọc theo
                                            <select class="dashboard-choose form-control">
                                                <option>--- Chọn ---</option>
                                                <option value="7ngay">7 ngày qua</option>
                                                <option value="thangtruoc">Tháng trước</option>
                                                <option value="thangnay">Tháng này</option>
                                                <option value="thang8">Trong tháng 8<</option>
                                                <option value="365ngayqua">365 ngày qua</option>
                                            </select>
                                        </p>
                                    </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                                <div id="charts" style="height: 250px"></div>
                        </div>
                    </div>
                    <!-- /.lọc bài viet - end -->
                </div>
                <!-- /.chartjs - end -->
            </div>
            <!-- LINE CHART -->
        </div>
    </section>
    @push('statistical-user')
        <script>
            $(document).ready(function() {
                chart120daysuser();
                var chart = new Morris.Bar({
                element: 'charts',
                //option chart
                lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3'],
                xkey: ['created_at'],
                parseTime: false,
                ykeys: ['nguoi_dung'],
                hideHover: 'auto',
                labels: ['người dùng']
                });

                // mac dinh bieu do hien thi du lieu trong 120 day
                function chart120daysuser(){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "/admin/days-user",
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

                $('#btn-dashboard-choose').click(function(e) {
                    e.preventDefault();
                    var _token = $('input[name="_token"]').val();
                    var tu_ngay = $('#tu_ngay').val();
                    var den_ngay = $('#den_ngay').val();

                    $.ajax({
                        url: "/admin/choose-by-date",
                        type: "get",
                        dataType: "json",
                        data: {
                            tu_ngay: tu_ngay,
                            den_ngay: den_ngay,
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                });

                $('.dashboard-choose').change(function(e){
                    e.preventDefault();
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "/admin/dashboard-choose",
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
