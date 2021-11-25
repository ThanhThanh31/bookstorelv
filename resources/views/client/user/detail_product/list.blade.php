@foreach ($list as $key)
    <ol class="commentlist">
        <li>
            <div class="single-comment">
                @if ($key->cus->nd_anh == null)
                    <div class="comment-avatar img-full">
                        <img style="height: 50px; border-radius: 50%;"
                            alt=""
                            src="{{ asset('template_client/img/icon/admin.jpg') }}">
                    </div>
                @else
                    <div class="comment-avatar img-full">
                        <img style="height: 50px; border-radius: 50%;"
                            alt="" src="{{ asset($key->cus->nd_anh) }}">
                    </div>
                @endif
                <div class="comment-info">
                    <a href="#">{{ $key->username }}</a>
                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->q_id == 1)
                    <div class="reply">
                        <a href="#">Trả lời</a>
                    </div>
                    @endif
                    <span class="date">{{ $key->created_at }}</span>
                    <p>{!! $key->bs_noidung !!}</p>
                </div>
            </div>
            <form class="form-review" action="">
                <div class="review-wrap">
                    <h2>Viết bình luận của bạn...</h2>
                    <div class="form-group row">
                        <div class="col">
                            <label class="control-label">Bình luận</label>
                            <input type="hidden" name="sp_id" value="">
                            <textarea id="" name="content" class="form-control" placeholder="Nhập nội dung bình luận..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <div class="pul-right">
                        <button id="" class="button-review" type="submit">Gửi</button>
                    </div>
                </div>
            </form>
            <hr>
            <!-- bình luận con -->
            @foreach ($key->replies as $child)
            <ol>
                <li>
                    <div class="single-comment">
                        @if ($child->cus->nd_anh == null)
                        <div class="comment-avatar img-full">
                            <img style="height: 50px; border-radius: 50%;"
                            alt=""
                            src="{{ asset('template_client/img/icon/admin.jpg') }}">
                        </div>
                        @else
                        <div class="comment-avatar img-full">
                            <img style="height: 50px; border-radius: 50%;"
                                alt="" src="{{ asset($child->cus->nd_anh) }}">
                        </div>
                        @endif
                        <div class="comment-info">
                            <a href="#">{{ $child->username }}</a>
                            <div class="reply">
                                <a href="#">Trả lời</a>
                            </div>
                            <span class="date">October 6, 2014 at 1:38 am</span>
                            <p>just a nice post</p>
                        </div>
                    </div>
                </li>
            </ol>
            @endforeach
        </li>
    </ol>
@endforeach
