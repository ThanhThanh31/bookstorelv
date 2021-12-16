@extends('client.template.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ptb-30 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Diễn đàn</a></li>
                        <li class="breadcrumb-item active">Kết quả tìm kiếm bài viết với từ khóa '{{ $keyword }}'</li>
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
                @if (count($search_post) == 0)
                    <div style="text-align: center;width: 100%; margin-top: 20px;" class="alert alert-warning">Rất tiếc, không tìm thấy bài viết phù hợp với lựa chọn của bạn !!!</div>
                @else
                <?php
                    function prominente($str, $keyword){
                        return str_replace($keyword, "<span style='color: red;'>$keyword</span>", $str);
                    }
                ?>
                    <!-- single-categories-1 start -->
                    <div class="col-lg-12 col-sm-12 col-12" style="padding-left: 300px;">
                        <div class="single-categories-1 blog-search" style="margin: 30px 0 0 0; border: none">
                            <form action="{{ route('post.find') }}" method="POST" class="blog-search-form">
                                <div class="form-input">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="keyword" name="keyword" style="height: 45px" type="text"
                                        class="input-text" placeholder="Nhập vào từ khóa tìm kiếm về bài viết ở diễn đàn....">
                                    <button type="submit" class="blog-search-button"><i style="padding-top: 15px"
                                            class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- single-categories-1 end -->
                    <div class="col-lg-11 col-sm-12 col-12">
                        <div class="main-blog-wrap pt-100" style="padding: 50px 0px 0 100px">
                            <!-- single-blog-area start -->
                            @foreach ($search_post as $key)
                                <div class="single-blog-area" id="listPost">
                                    <div class="post-category">
                                    </div>
                                    <div class="blog-titel blog-image">
                                        <h1><a style="text-transform: capitalize"
                                                href="{{ route('post.detail', ['id' => $key->bv_id]) }}">{!! prominente($key->bv_tieude, $keyword) !!}</a>
                                        </h1>
                                    </div>
                                    <span class="post-author">
                                        <span class="posted-by">Bài viết được đăng bởi </span>{!! prominente($key->username, $keyword) !!}
                                    </span>
                                    <span class="post-separator"> | </span>
                                    <span class="post-date">{{ \Carbon\Carbon::parse($key->created_at)->toDateString() }}</span>
                                    <div class="post-thumbnail">
                                        <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}">
                                            <img src="{{ asset($key->bv_hinhanh) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="postinfo-wrapper">
                                        <p class="mb-30">{!! prominente($key->bv_tomtat, $keyword) !!}</p>
                                        <a href="{{ route('post.detail', ['id' => $key->bv_id]) }}"
                                            class="readmore button" title="{{ $key->bv_tieude }}">Đọc bài viết</a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- single-blog-area end -->
                            @if (count($search_post) != 0)
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col">
                                            <ul class="pagination-box">
                                                @if ($search_post->currentPage() != 1)
                                                    <li>
                                                        <a class="Pre" href="{!! str_replace('/?', '?', $search_post->url($search_post->currentPage() - 1)) !!}">|< </a>
                                                    </li>
                                                @endif
                                                @for ($i = 1; $i <= $search_post->lastPage(); $i = $i + 1)
                                                    <li>
                                                        <a class="{!! $search_post->currentPage() == $i ? 'active' : ' ' !!}"
                                                            href="{!! str_replace('/?', '?', $search_post->url($i)) !!}">{!! $i !!}</a>
                                                    </li>
                                                @endfor
                                                @if ($search_post->currentPage() != $search_post->lastPage())
                                                    <li>
                                                        <a class="Next" href="{!! str_replace('/?', '?', $search_post->url($search_post->currentPage() + 1)) !!}"> >|</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
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
            });
        </script>
    @endpush
@endsection
