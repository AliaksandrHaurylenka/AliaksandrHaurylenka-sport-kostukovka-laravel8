<div class="col-md-3 col-lg-4 col-xl-3 mx-auto my-4" id="yak1">
	<!-- Content -->
	<h6 class="text-uppercase font-weight-bold">Напишите нам</h6>
	<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

	<!-- Default form group -->
	<form action="/letter" method="post">
			{{ csrf_field() }}
		<div class="form-row mb-4">
			<div class="col">
					<a href="" id="refresh"><img src="{{ Captcha::src('flat') }}" alt="captcha" class="captcha-img" data-refresh-config="default"></a>
			</div>
			<div class="col">
					<input class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" type="text" placeholder="Код*" name="captcha" required>
					@if ($errors->has('captcha'))
						<span class="invalid-feedback"><strong>{{ $errors->first('captcha') }}</strong></span>
					@endif
			</div>
		</div>
		
	  <!-- Default input -->
	  <div class="form-group">
			<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Имя*" name="name" value="{{old('name')}}" required>
			@if ($errors->has('name'))
				<span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
			@endif
	  </div>
	  
	  <!-- Default input -->
	  <div class="form-group">
			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail*" name="email" value="{{old('email')}}" required>
			@if ($errors->has('email'))
				<span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
			@endif
	  </div>
	  
	  	<!--Material textarea-->
		<div class="form-group md-form md-outline">
			<textarea id="form75" class="form-control white {{ $errors->has('text') ? ' is-invalid' : '' }}" rows="3" name="text">{{old('text')}}</textarea>
			@if ($errors->has('text'))
				<span class="invalid-feedback"><strong>{{ $errors->first('text') }}</strong></span>
			@endif
		  <label for="form75">Ваше сообщение*</label>
		</div>
		
		<!-- Sign in button -->
		<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0 btn-form" type="submit">Отправить</button>
	</form>
</div>