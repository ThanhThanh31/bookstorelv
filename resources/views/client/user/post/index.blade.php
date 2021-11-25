@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Diễn đàn</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- main-content-wrap start -->
    <div class="main-content-wrap">
        <div class="container">
            <div class="row">
                @if (count($showPost) == 0)
                    <div style="text-align: center;width: 100%; margin-top: 20px;" class="alert alert-warning">Chưa có
                        bài viết nào được đăng tải</div>
                @else
                    <!-- single-categories-1 start -->
                    <div class="col-lg-12 col-sm-12 col-12" style="padding-left: 300px;">
                        <div class="single-categories-1 blog-search" style="margin: 30px 0 0 0; border: none">
                            <form action="{{ route('post.find') }}" method="POST" class="blog-search-form">
                                <div class="form-input">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="keyword" name="keyword" style="height: 45px" type="text"
                                        class="input-text"
                                        placeholder="Nhập vào từ khóa tìm kiếm về bài viết ở diễn đàn....">
                                    <button type="submit" class="blog-search-button"><i style="padding-top: 15px"
                                            class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box" style="padding-left: 540px;">
                            <div class="product-short">
                                <label for="amount">Sắp xếp theo: </label>
                                <form action="" method="GET">
                                    <select name="sort" id="sort" class="nice-select">
                                        <option value="">Mặc định</option>
                                        <option value="{{ Request::url() }}?sort_by=latest">Mới nhất
                                        </option>
                                        <option value="{{ Request::url() }}?sort_by=oldest">Cũ nhất
                                        </option>
                                        <option value="{{ Request::url() }}?sort_by=title_A_Z">Tên bài viết (A - Z)
                                        </option>
                                        <option value="{{ Request::url() }}?sort_by=title_Z_A">Tên bài viết (Z - A)
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- single-categories-1 end -->
                    <div class="col-lg-11 col-sm-12 col-12">
                        <div class="main-blog-wrap pt-100" style="padding: 50px 0px 0 100px">
                            <!-- single-blog-area start -->
                            @foreach ($showPost as $key)
                                <div class="single-blog-area" id="listPost">
                                    <div class="post-category">
                                    </div>
                                    <div class="blog-titel blog-image">
                                        <h1><a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"><span style="text-transform: capitalize">{{ $key->bv_tieude }}</span></a>
                                        </h1>
                                    </div>
                                    <span class="post-author">
                                        <span class="posted-by">Bài viết được đăng bởi </span><span style="text-transform: capitalize">{{ $key->username }}</span>
                                    </span>
                                    <span class="post-separator"> | </span>
                                    <span class="post-date">{{ \Carbon\Carbon::parse($key->created_at)->toDateString() }}</span>
                                    <div class="post-thumbnail">
                                        <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}">
                                            <img src="{{ asset($key->bv_hinhanh) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="postinfo-wrapper">
                                        <p class="mb-30">{!! $key->bv_tomtat !!}</p>
                                        <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"
                                            class="readmore button" title="{{ $key->bv_tieude }}">Đọc bài viết</a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- single-blog-area end -->
                            @if (count($showPost) != 0)
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col">
                                            <ul class="pagination-box">
                                                @if ($showPost->currentPage() != 1)
                                                    <li>
                                                        <a class="Pre" href="{!! str_replace('/?', '?', $showPost->url($showPost->currentPage() - 1)) !!}">|< </a>
                                                    </li>
                                                @endif
                                                @for ($i = 1; $i <= $showPost->lastPage(); $i = $i + 1)
                                                    <li>
                                                        <a class="{!! $showPost->currentPage() == $i ? 'active' : ' ' !!}"
                                                            href="{!! str_replace('/?', '?', $showPost->url($i)) !!}">{!! $i !!}</a>
                                                    </li>
                                                @endfor
                                                @if ($showPost->currentPage() != $showPost->lastPage())
                                                    <li>
                                                        <a class="Next" href="{!! str_replace('/?', '?', $showPost->url($showPost->currentPage() + 1)) !!}"> >|</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-12 col-12">
                        <div class="categories-blog-area pt-100">
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1">
                                <h3 class="blog-categorie-title">Categories</h3>
                                <div class="single-categories-blog">
                                    <ul>
                                        <li><a href="#">Creative (3)</a> </li>
                                        <li><a href="#">Fashion <span>(1)</span></a></li>
                                        <li><a href="#">Image <span>(1)</span></a></li>
                                        <li><a href="#">Photography <span>(1)</span></a></li>
                                        <li><a href="#">Travel <span>(5)</span></a></li>
                                        <li><a href="#">Videos <span>(1)</span></a></li>
                                        <li><a href="#">WordPress <span>(2)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-categories-1 end -->
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1 blog-search">
                                <h3 class="blog-categorie-title">Tìm kiếm bài viết</h3>
                                <form action="#" class="blog-search-form">
                                    <div class="form-input">
                                        <input type="text" class="input-text"
                                            placeholder="Nhập vào từ khóa tìm kiếm về bài viết...">
                                        <button type="submit" class="blog-search-button"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- single-categories-1 end -->
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1">
                                <h3 class="blog-categorie-title">Recent Posts</h3>
                                <div class="single-categories-blog">
                                    <ul>
                                        <li><a href="#">Post With Audio</a></li>
                                        <li><a href="#">Blog image post</a></li>
                                        <li><a href="#">Post with Gallery</a></li>
                                        <li><a href="#">Post with Video</a></li>
                                        <li><a href="#">Maecenas ultricies</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-categories-1 end -->
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1">
                                <h3 class="blog-categorie-title">Blog Archives</h3>
                                <div class="single-categories-blog">
                                    <ul>
                                        <li><a href="#">February 2018 <span>(1)</span></a> </li>
                                        <li><a href="#">March 2015 <span>(1)</span></a></li>
                                        <li><a href="#">December 2014 <span>(2)</span></a></li>
                                        <li><a href="#">November 2014 <span>(1)</span></a></li>
                                        <li><a href="#">September 2014 <span>(1)</span></a></li>
                                        <li><a href="#">August 2014 <span>(1)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-categories-1 end -->
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1 tag-area">
                                <h3 class="blog-categorie-title">Tags</h3>
                                <div class="tagcloud">
                                    <a href="#">asian</a>
                                    <a href="#">brown</a>
                                    <a href="#">euro</a>
                                    <a href="#">fashion</a>
                                    <a href="#">france</a>
                                    <a href="#">hat</a>
                                    <a href="#">t-shirt</a>
                                    <a href="#">teen</a>
                                    <a href="#">travel</a>
                                    <a href="#">white</a>
                                </div>
                            </div>
                            <!-- single-categories-1 end -->
                            <!-- single-categories-1 start -->
                            <div class="single-categories-1">
                                <h3 class="blog-categorie-title">instagram</h3>
                                <div class="instagram-ara">
                                    <ul id="instagram-feed" class="ht-sidebar-three-instagram"></ul>
                                </div>
                            </div>
                            <!-- single-categories-1 end -->

                            <!-- single-banner-image start -->
                            <div class="single-banner-image">
                                <a href="#"><img src="img/banner/4.jpg" alt=""></a>
                            </div>
                            <!-- single-banner-image end -->
                        </div>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
    @push('filter-posts')
        <script>
            $(document).ready(function() {
                $('#sort').on('change', function() {
                    var sort = $(this).val();
                    if (sort) {
                        window.location = sort;
                    }
                    return false;
                });
                // $('#keyword').on('keyup', function() {
                //     var keyword = $(this).val();
                //     $.ajax({
                //         type: "get",
                //         url: "/client/post-find",
                //         data: {
                //             'keyword': $keyword
                //         },
                //         dataType: "json",
                //         success: function(response) {
                //             $('#listPost').html(response);
                //         }
                //     });
                // });
            });
        </script>
    @endpush
@endsection
