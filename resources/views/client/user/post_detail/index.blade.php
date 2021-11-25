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
                        <li class="breadcrumb-item active">Chi tiết bài viết - <span style="text-transform: capitalize">{{ $post->bv_tieude }}</span></li>
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
                <!-- single-categories-1 start -->
                <div class="col-lg-12 col-sm-12 col-12" style="padding-left: 300px;">
                    <div class="single-categories-1 blog-search" style="margin: 30px 0 0 0; border: none">
                        <form action="{{ route('post.find') }}" method="POST" class="blog-search-form">
                            <div class="form-input">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input id="keyword" name="keyword" style="height: 45px" type="text" class="input-text"
                                    placeholder="Nhập vào từ khóa tìm kiếm về bài viết ở diễn đàn....">
                                <button type="submit" class="blog-search-button"><i style="padding-top: 15px"
                                        class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- single-categories-1 end -->
                <div class="col-lg-11 col-sm-12 col-12">
                    <!-- blog-details-area start -->
                    <div class="blog-details-area pt-100" style="padding: 50px 0px 0 100px">
                        @if (session()->has('article'))
                            <i>
                                <div class="alert alert-success">
                                    {{ session()->get('article') }}
                                </div>
                            </i>
                        @endif
                        <!-- single-blog-area start -->
                        @if ($post->bv_tinhtrang == 2)
                            <div style="text-align: center;width: 100%; margin-top: 20px;" class="alert alert-warning">Bài
                                viết đã bị ẩn do báo xấu</div>
                        @else
                            <div class="single-blog-area blog-with-post">
                                <div class="post-category">
                                </div>
                                <div class="blog-titel">
                                    <h1><a href="{{ $post->bv_id }}"><span style="text-transform: capitalize">{{ $post->bv_tieude }}</span></a></h1>
                                </div>
                                <span class="post-author">
                                    <span class="posted-by">Bài viết được đăng bởi </span><span style="text-transform: capitalize">{{ $post->username }}</span>
                                </span>
                                <span class="post-separator"> | </span>
                                <span class="post-date">{{ $post->created_at }}</span>
                                <div class="post-thumbnail">
                                    <a href="{{ route('post.detail', ['id' => $post->bv_id]) }}">
                                        <img alt="" src="img/blog/blog-03.jpg">
                                    </a>
                                </div>
                                <div class="postinfo-wrapper">
                                    <div class="post-info">
                                        <p>{!! $post->bv_noidung !!}</p>
                                    </div>
                                </div>
                                <!-- social-comment start -->
                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1 && $post->bv_tinhtrang == 1)
                                    <div class="social-comment" style="border-top: 1px solid #e7e4dd; padding-top: 30px">
                                        <div class="social-sharing">
                                            <ul class="social-icons">
                                                <!-- Button trigger modal -->
                                                <a style="background: #9d4d4a none repeat scroll 0 0; border-radius: 25px; color: #ffffff; font-size: 14px; font-weight: 500; height: 45px; line-height: 45px; padding: 0 25px; text-transform: capitalize" type="button" class="btn btn-secondary" data-toggle="modal"
                                                    data-target="#exampleModal">Báo xấu
                                                </a>
                                                <!-- Modal -->
                                                <style type="text/css">
                                                    .error-message {
                                                        color: red;
                                                    }

                                                </style>
                                                <form action="{{ route('article.report', ['id' => $post->bv_id]) }}">
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Báo
                                                                        xấu bài viết
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <textarea rows="5" cols="100" name="vipham"
                                                                                class="form-control"
                                                                                placeholder=" Nhập vào lý do báo xấu ..."></textarea>
                                                                            <span
                                                                                class="error-message">{{ $errors->first('vipham') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button
                                                                        onclick="return confirm('Xác nhận báo xấu bài viết {{ $post->bv_tieude }} ?')"
                                                                        type="submit" class="btn btn-primary">Gửi</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <!-- social-comment end -->
                            </div>
                            <!-- single-blog-area end -->

                            <!-- comments-reply-area start -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                        <div class="col-lg-12">
                                            <h3 class="comment-reply-title">Viết bình luận của bạn...</h3>
                                            <form class="comment-form-area"
                                                action="{{ route('comment.post', ['id' => $post->bv_id]) }}"
                                                method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <p class="comment-form-comment">
                                                    <label>Bình luận</label>
                                                    <textarea name="binhluan" placeholder="Nội dung bình luận"></textarea>
                                                    <span class="error-message">{{ $errors->first('binhluan') }}</span>
                                                </p>
                                                </p>
                                                <div class="comment-form-submit">
                                                    <input type="submit" class="comment-submit" value="Gửi bình luận">
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <span style="width: 100%; text-align: center" class="alert alert-warning">Đăng nhập
                                            hoặc
                                            đăng ký tài khoản để bình luận bài viết...</span>
                                    @endif
                                </div>
                            </div>
                            <!-- comments-reply-area end -->
                            <!-- comments-area  start -->
                            <div class="comments-area mt-100">
                                <h4>Có {{ count($parent) + count($child) }} bình luận</h4>
                                @foreach ($parent as $key)
                                    <ol class="commentlist">
                                        <li>
                                            <div class="single-comment">
                                                @if ($key->nd_anh == null)
                                                    <div class="comment-avatar img-full">
                                                        <img style="height: 50px; border-radius: 50%;" alt=""
                                                            src="{{ asset('template_client/img/icon/admin.jpg') }}">
                                                    </div>
                                                @else
                                                    <div class="comment-avatar img-full">
                                                        <img style="height: 50px; border-radius: 50%;" alt=""
                                                            src="{{ asset($key->nd_anh) }}">
                                                    </div>
                                                @endif
                                                <div class="comment-info">
                                                    @if ($post->username == $key->username)
                                                        <i class="fa fa-pencil">&ensp;Tác giả</i>
                                                        <a>{{ $key->username }}</a>
                                                    @else
                                                        <a>{{ $key->username }}</a>
                                                    @endif
                                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                        <div class="reply">
                                                            <a href="#" class="reply-comment"
                                                                data-id="{{ $key->bl_id }}">Trả lời</a>
                                                            @if ($key->username == Auth::guard('nguoi_dung')->user()->username)
                                                                <a href="{{ route('comment.obliterate', ['id' => $key->bl_id]) }}"
                                                                    onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                                                                    href="#" data-id="{{ $key->bl_id }}">Xóa</a>
                                                                <!-- Button trigger modal -->
                                                                <a style="border: 1px solid #9D4D4A; border-radius: 500px; color: #9D4D4A; font-size: 11px;height: 28px; padding: 0 20px; line-height: 26px"
                                                                    type="button" data-toggle="modal"
                                                                    data-target="#exampleModal{{ $key->bl_id }}">
                                                                    Chỉnh sửa
                                                                </a>
                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="exampleModal{{ $key->bl_id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form class="form-edit"
                                                                                action="{{ route('comment.update', ['id' => $key->bl_id]) }}"
                                                                                method="POST">
                                                                                <input type="hidden" name="_token"
                                                                                    value="{{ csrf_token() }}">
                                                                                <div class="modal-body">
                                                                                    <p class="comment-form-comment">
                                                                                        <label>Chỉnh sửa bình
                                                                                            luận</label>
                                                                                        <textarea name="edit"
                                                                                            placeholder="Nội dung trả lời bình luận"
                                                                                            cols="30" rows="10"
                                                                                            class="textarea">{{ $key->bl_noidung }}
                                                                                        </textarea>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Đóng</button>
                                                                                    <button
                                                                                        onclick="return confirm('Bạn có chắc là muốn cập nhật bình luận ?')"
                                                                                        type="submit"
                                                                                        class="btn btn-primary">Cập
                                                                                        nhật</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <span class="date">{{ $key->created_at }}</span>
                                                    <p>{!! $key->bl_noidung !!}</p>
                                                </div>
                                                <form class="formReply form-reply"
                                                    action="{{ route('reply.post', ['idbv' => $post->bv_id, 'idbl' => $key->bl_id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <p class="comment-form-comment">
                                                        <label>Trả lời bình luận</label>
                                                        <textarea name="replies"
                                                            placeholder="Nội dung trả lời bình luận"></textarea>
                                                        <span
                                                            class="error-message">{{ $errors->first('replies') }}</span>
                                                    </p>
                                                    <div class="comment-form-submit">
                                                        <input type="submit" class="comment-submit" value="Gửi bình luận">
                                                    </div>
                                                </form>
                                            </div>
                                            <ol>
                                                @foreach ($child as $c)
                                                    @if ($c->bl_id_reply == $key->bl_id)
                                                        <li>
                                                            <div class="single-comment">
                                                                @if ($c->nd_anh == null)
                                                                    <div class="comment-avatar img-full">
                                                                        <img style="height: 50px; border-radius: 50%;"
                                                                            alt=""
                                                                            src="{{ asset('template_client/img/icon/admin.jpg') }}">
                                                                    </div>
                                                                @else
                                                                    <div class="comment-avatar img-full">
                                                                        <img style="height: 50px; border-radius: 50%;"
                                                                            alt="" src="{{ asset($c->nd_anh) }}">
                                                                    </div>
                                                                @endif
                                                                <div class="comment-info">
                                                                    @if ($post->username == $c->username)
                                                                        <i class="fa fa-pencil">&ensp;Tác giả</i>
                                                                        <a
                                                                            data-id="{{ $c->bl_id_reply }}">{{ $c->username }}</a>
                                                                    @else
                                                                        <a
                                                                            data-id="{{ $c->bl_id_reply }}">{{ $c->username }}</a>
                                                                    @endif
                                                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                                                                        @if ($c->username == Auth::guard('nguoi_dung')->user()->username)
                                                                            <div class="reply">
                                                                                <a href="{{ route('comment.obliterate', ['id' => $c->bl_id]) }}"
                                                                                    onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                                                                                    href="#"
                                                                                    data-id="{{ $c->bl_id }}">Xóa</a>
                                                                                <!-- Button trigger modal -->
                                                                                <a style="border: 1px solid #9D4D4A; border-radius: 500px; color: #9D4D4A;
                                                                                    font-size: 11px;height: 28px; padding: 0 20px; line-height: 26px"
                                                                                    type="button" data-toggle="modal"
                                                                                    data-target="#exampleModal{{ $c->bl_id }}">Chỉnh
                                                                                    sửa
                                                                                </a>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="exampleModal{{ $c->bl_id }}"
                                                                                    tabindex="-1" role="dialog"
                                                                                    aria-labelledby="exampleModalLabel"
                                                                                    aria-hidden="true">
                                                                                    <div class="modal-dialog"
                                                                                        role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="exampleModalLabel">
                                                                                                    Modal title</h5>
                                                                                                <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                    <span
                                                                                                        aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <form class="form-edit"
                                                                                                action="{{ route('comment.update', ['id' => $c->bl_id]) }}"
                                                                                                method="POST">
                                                                                                <input type="hidden"
                                                                                                    name="_token"
                                                                                                    value="{{ csrf_token() }}">
                                                                                                <div
                                                                                                    class="modal-body">
                                                                                                    <p
                                                                                                        class="comment-form-comment">
                                                                                                        <label>Chỉnh sửa
                                                                                                            bình
                                                                                                            luận</label>
                                                                                                        <textarea
                                                                                                            name="edit"
                                                                                                            placeholder="Nội dung trả lời bình luận"
                                                                                                            cols="30"
                                                                                                            rows="10"
                                                                                                            class="textarea">{{ $c->bl_noidung }}
                                                                                                            </textarea>
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary"
                                                                                                        data-dismiss="modal">Đóng</button>
                                                                                                    <button
                                                                                                        onclick="return confirm('Bạn có chắc là muốn cập nhật bình luận ?')"
                                                                                                        type="submit"
                                                                                                        class="btn btn-primary">Cập
                                                                                                        nhật</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                    <span
                                                                        class="date">{{ $c->created_at }}</span>
                                                                    <p>{!! $c->bl_noidung !!}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </li>
                                    </ol>
                                @endforeach
                            </div>
                            <!-- comments-area  end -->
                        @endif
                    </div>
                    <!-- blog-details-area end -->
                </div>
                {{-- <div class="col-lg-3 col-sm-12 col-12">
                    <div class="categories-blog-area pt-100">
                        <!-- single-categories-1 start -->
                        <div class="single-categories-1">
                            <h3 class="blog-categorie-title">Categories</h3>
                            <div class="single-categories-blog">
                                <ul>
                                    <li><a href="#">Creative<span>(3)</span> </a> </li>
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
                                    <input type="text" class="input-text" placeholder="Search...">
                                    <button type="submit" class="blog-search-button"><i class="fa fa-search"></i></button>
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
                                    <li><a href="#">February 2018 <span>(1)</span></a></li>
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
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
    @push('comment-reply')
        <script>
            $(document).ready(function(ev) {
                $('.form-reply').hide();
                $('.reply-comment').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var form_reply = '.form-reply' + id;
                    $('.form-reply').show();
                });
            });
        </script>
    @endpush
@endsection
