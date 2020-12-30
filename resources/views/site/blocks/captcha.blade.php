<div class="form-row mb-4">
  <div class="col">
      <a href=""><img src="{{ Captcha::src('flat') }}" alt="captcha" class="captcha-img" data-refresh-config="default"></a>
  </div>
  <div class="col">
      <input class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" type="text" placeholder="Код*" name="captcha" required>
      @if ($errors->has('captcha'))
        <span class="invalid-feedback"><strong>{{ $errors->first('captcha') }}</strong></span>
      @endif
  </div>
</div>