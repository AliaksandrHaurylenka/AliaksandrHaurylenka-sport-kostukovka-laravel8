<section class="my-5" id="yak1">
    <!-- Form with header -->
    <div class="card feedback">
      <div class="card-body">
        <!-- Header -->
        <div class="form-header blue accent-1">
          <h3 class="mt-2"><i class="fas fa-envelope"></i> Напишите нам:</h3>
        </div>
        <!-- Body -->
        <form id="feedback-form" action="/feedback/process/process.php" enctype="multipart/form-data" novalidate>
            
            
            <div class="md-form pr-3">
                <i class="fas fa-user prefix grey-text"></i>
                <input id="name" type="text" name="name" class="form-control px-2" value="" minlength="2"
                        maxlength="30" required>
                <label for="name" class="control-label">Имя *</label>
                <div class="invalid-feedback"></div>
            </div>

            <div class="md-form pr-3">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input id="email" type="email" name="email" class="form-control px-2" value="" required>
                <label for="email" class="control-label">Email-адрес *</label>
                <div class="invalid-feedback"></div>
            </div>

            <!-- Сообщение пользователя -->
            <div class="md-form pr-3">
                <i class="fas fa-pencil-alt prefix grey-text"></i>
                <textarea id="message" name="message" class="form-control md-textarea px-2" 
                            rows="2" minlength="20" maxlength="500"
                            required></textarea>
                <label for="message">Сообщение *</label>
                <div class="invalid-feedback"></div>
            </div>
            

            <!-- Капча -->
            <div class="form-group form-captcha row">
                <div class="col-sm-6 col-lg-3">
                    <img class="form-captcha__image" src="/feedback/captcha/captcha.php" data-src="/feedback/captcha/captcha.php"
                    width="120" height="46" alt="Капча">
                    <a href="!#" title="Обновить" class="form-captcha__refresh"><i class="fas fa-sync-alt ml-1 btn-form"></i></a>
                </div>

                <div class="form-group form-captcha__input col-sm-6 col-lg-9">
                    <div class="md-form my-0">
                        <input type="text" name="captcha" maxlength="6" required="required" id="captcha"
                                class="form-control captcha" autocomplete="off" value="">
                        <label for="captcha">Код с картинки *</label>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <!-- Пользовательское солашение -->
            <div class="form-group form-agreement">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" name="agree" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Нажимая кнопку, я принимаю условия <a
                    href="{{ route('policy') }}">Пользовательского соглашения</a> и даю своё согласие на обработку моих персональных данных.</label>
                </div>
            </div>

            <!-- Сообщение при ошибке -->
            <div class="form-error d-none">
                Исправьте данные и отправьте форму ещё раз.
            </div>

            <!-- Индикация отправки данных формы на сервер -->
            <div class="progress d-none">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                    style="width: 0"></div>
            </div>

            <!-- Кнопка для отправки формы на сервер -->
            <div class="form-submit text-center">
                <button type="submit" class="btn btn-light-blue btn-form mt-3" disabled>Отправить</button>
            </div>

        </form>
        
        <!-- Сообщение об успешной отправки формы -->
        <div class="form-result-success d-none">
        <div>Форма успешно отправлена. Нажмите на <a href="#" data-target="#feedback-form">ссылку</a>, чтобы отправить ещё
            одно сообщение.
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Contact v.1 -->