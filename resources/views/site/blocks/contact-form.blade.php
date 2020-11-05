<section class="my-5" id="yak1">
    <!-- Form with header -->
    <div class="card">
      <div class="card-body">
        <!-- Header -->
        <div class="form-header blue accent-1">
          <h3 class="mt-2"><i class="fas fa-envelope"></i> Напишите нам:</h3>
        </div>
        <!-- Body -->
        <form action="/letter" method="post">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="col-sm-6">
              <div class="md-form">
                <img src="{{ Captcha::src('flat') }}" alt="captcha" class="captcha-img" data-refresh-config="default">
                <a href="" id="refresh" title="Обновить"><i class="fas fa-sync-alt ml-1 btn-form"></i></a>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="md-form">
                <input id="captcha" class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" type="text" name="captcha" required>
                <label for="captcha">Код с картинки *</label>
                @if ($errors->has('captcha'))
                  <span class="invalid-feedback"><strong>{{ $errors->first('captcha') }}</strong></span>
                @endif
              </div>
            </div>
          </div>
          
          <div class="md-form">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="form-name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{old('name')}}" required>
            <label for="form-name">Ваше имя *</label>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
          </div>

          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" id="form-email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}" required>
            <label for="form-email">Ваш e-mail *</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
          </div>

          <div class="md-form">
            <i class="fas fa-pencil-alt prefix grey-text"></i>
            <textarea id="form-text" class="form-control md-textarea {{ $errors->has('text') ? ' is-invalid' : '' }}" rows="3" name="text" required>{{old('text')}}</textarea>
            <label for="form-text">Сообщение *</label>
            @if ($errors->has('text'))
                <span class="invalid-feedback"><strong>{{ $errors->first('text') }}</strong></span>
            @endif
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-light-blue btn-form">Отправить</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Section: Contact v.1 -->