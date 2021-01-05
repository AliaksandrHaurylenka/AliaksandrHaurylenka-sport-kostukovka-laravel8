<!--Reply-->
<div class="card mb-3 wow fadeIn">
    <div class="card-header font-weight-bold">Оставить отзыв</div>
    <div class="card-body">

        <!-- Default form reply -->
        <form action="/comment" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value={{$post->id}}>

            <!-- Comment -->
            <div class="form-group">
                <label for="replyFormComment">Ваш комментарий</label>
                <textarea class="form-control" id="replyFormComment" rows="5" name="message" required>{{ old('message') }}</textarea>
            </div>

            @if(!Auth::check())
            <!-- Name -->
                <label for="replyFormName">Имя</label>
                <input type="text" id="replyFormName" class="form-control" name="name" value="{{ old('name') }}" required>
            @endif
            <br>

            <div class="form-row">
                <div class="col-sm-6">
                    <div class="md-form">
                        <img src="{{ Captcha::src('flat') }}" alt="comment_captcha" class="captcha-img" data-refresh-config="default">
                        <a href="" id="refreshh" title="Обновить"><i class="fas fa-sync-alt ml-1 btn-form"></i></a>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="md-form">
                        <input class="form-control {{ $errors->has('comment_captcha') ? ' is-invalid' : '' }}" type="text" name="comment_captcha" required>
                        <label for="comment_captcha">Код с картинки *</label>
                        @if ($errors->has('comment_captcha'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('comment_captcha') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>


            {{-- @include('site.blocks.captcha') --}}

            <div class="text-center mt-4">
                <button class="btn btn-info btn-md btn-form" type="submit">Прокомментировать</button>
            </div>
        </form>
        <!-- Default form reply -->

    </div>
</div>
<!--/.Reply-->