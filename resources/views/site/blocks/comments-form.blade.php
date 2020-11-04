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
                <textarea class="form-control" id="replyFormComment" rows="5" name="message"
                          value="{{old('message')}}" required></textarea>
            </div>

            @if(!Auth::check())
            <!-- Name -->
                <label for="replyFormName">Имя</label>
                <input type="text" id="replyFormName" class="form-control" name="name" value="{{old('name')}}">
            @endif
            <br>

            <div class="text-center mt-4">
                <button class="btn btn-info btn-md btn-form" type="submit">Прокомментировать</button>
            </div>
        </form>
        <!-- Default form reply -->

    </div>
</div>
<!--/.Reply-->