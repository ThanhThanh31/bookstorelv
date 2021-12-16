@extends('admin.template.master')
@section('title-page')
Thống kê bài viết
@endsection
@section('title-page-detail')
Thống kê bài viết
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('admin.embattle') }}" type="button" class="btn btn-secondary">Trở về</a>
            </div>
            <br>
            <!-- LINE CHART -->
            <div class="card card-info">
                <!-- /.chartjs - start -->
                <div class="card-body">
                    <!-- /.lọc bài viet - start -->
                    <div class="row">
                        <div class="col-md-12">
                            <label class="title_thongke">Thống kê bài viết</label>
                            <form>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <p>Từ ngày <input name="from_date" type="date" id="from_date" class="form-control"></p>
                                        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm"
                                            value="Lọc kết quả"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Đến ngày <input name="to_date" type="date" id="to_date" class="form-control"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>
                                            Lọc theo
                                            <select class="dashboard-filter form-control">
                                                <option>--- Chọn ---</option>
                                                <option value="7ngay">7 ngày qua</option>
                                                <option value="thangtruoc">Tháng trước</option>
                                                <option value="thangnay">Tháng này</option>
                                                <option value="thang10">Trong tháng 10</option>
                                                <option value="365ngayqua">365 ngày qua</option>
                                            </select>
                                        </p>
                                    </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                                <div id="chart" style="height: 250px"></div>
                        </div>
                    </div>
                    <!-- /.lọc bài viet - end -->
                </div>
                <!-- /.chartjs - end -->
            </div>
            <!-- LINE CHART -->
        </div>
    </section>
    @push('statistical-post')
        <script>
            $(document).ready(function() {
                chart100dayspost();
                var chart = new Morris.Bar({
                element: 'chart',
                //option chart
                lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3'],
                xkey: ['created_at'],
                parseTime: false,
                ykeys: ['bai_viet'],
                hideHover: 'auto',
                labels: ['bài viết']
                });

                function chart100dayspost(){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "/admin/days-post",
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

                $('#btn-dashboard-filter').click(function(e) {
                    e.preventDefault();
                    var _token = $('input[name="_token"]').val();
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();

                    $.ajax({
                        url: "/admin/filter-by-date",
                        type: "get",
                        dataType: "json",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            _token: _token
                        },

                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                });

                $('.dashboard-filter').change(function(e){
                    e.preventDefault();
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    // alert(dashboard_value);
                    $.ajax({
                        url: "/admin/dashboard-filter",
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
