@if(!Auth::check())
	<!--Newsletter-->
	<section class="mt-5 wow fadeIn">

			<!--/ Card -->
			<div class="card card-body pb-0">
					<div class="single-post">

							<h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
									<strong>НОВОСТНАЯ РАССЫЛКА</strong>
							</h6>
							
							
						<form class="row g-3 needs-validation my_form" novalidate action="/subscribe" method="post">
    						@csrf
    						<div class="col-12">
    							<label for="validationCustomUsername" class="form-label grey-text">Email</label>
    							<div class="input-group form-outline">
    								<span class="input-group-text" id="inputGroupPrepend">@</span>
    									<input
    										type="email"
    										class="form-control"
    										id="validationCustomUsername"
    										aria-describedby="inputGroupPrepend"
    										required
    										name="email"
    										value="{{old('email')}}"
    									/>
    								<div class="invalid-feedback">Пожалуйста, введите свой E-mail!</div>
    							</div>
    						</div>
    
    						<div class="col-12 mt-3  policy">
    							<div class="form-check">
    							<input
    								class="form-check-input checkbox__policy"
    								type="checkbox"
    								value=""
    								id="invalidCheck"
    								required
    								name="politica"
    								onchange="formSend()"
    							/>
    							<label class="form-check-label" for="invalidCheck">
    								Я согласен(а) с
    							</label>
    							<a href="{{ route('policy') }}">политикой конфидиальности</a>
    							<div class="invalid-feedback">Необходимо согласиться с политикой конфидиальности!</div>
    							</div>
    						</div>
    
    						<div class="col-12">
    							<button class="btn btn-grey btn-block mb-4 mt-4" type="submit">Подписаться</button>
    						</div>
							
							<div class="form-row mb-4">
                    			<div class="col">
                    					<a href="javascript:void(0)" onclick="refreshCaptcha()" title="Обновить" class="refereshrecapcha">{!! captcha_img('flat') !!}</a>
                    			</div>
                    			<div class="col">
                    					<input class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" type="text" placeholder="Код*" name="captcha" required>
                    					@if ($errors->has('captcha'))
                    						<span class="invalid-feedback"><strong>{{ $errors->first('captcha') }}</strong></span>
                    					@endif
                    			</div>
                    		</div>
						</form>
					</div>
			</div>

	</section>
	<!--Newsletter-->
@endif