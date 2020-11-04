{{--<form id="contactform" method="POST" class="validateform">
    {{ csrf_field() }}
 
    <div id="sendmessage">
        Ваше сообщение отправлено!
    </div>
    <div id="senderror">
        При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора <span>{{ env('MAIL_ADMIN') }}</span>
    </div>
    <div class="row">
        <div class="col-lg-4 field">
            <input type="text" name="name" placeholder="* Введите ваше имя" required />
        </div>
        <div class="col-lg-4 field">
            <input type="email" name="email" placeholder="* Введите ваш email" required />
        </div>
        <div class="col-lg-4 field">
            <input type="text" name="subject" placeholder="* Введите тему сообщения" required />
        </div>
        <div class="col-lg-12 margintop10 field">
            <textarea rows="12" name="message" class="input-block-level" placeholder="* Ваше сообщение..." required></textarea>
            <p>
                <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
                <span class="pull-right margintop20">* Заполните, пожалуйста, все обязательные поля!</span>
            </p>
        </div>
    </div>
</form>--}}

<form id="contactform" method="POST" class="validateform" action="">
	    {{ csrf_field() }}
    <div id="sendmessage">
    	Ваше сообщение отправлено!
	</div>
    <div id="senderror">
        При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора <span>{{ env('MAIL_ADMIN') }}</span>
    </div>
	  <!-- Default input -->
	  <div class="form-group">
	    <input type="text" class="form-control" placeholder="Имя*" name="name" value="{{old('name')}}">
	  </div>
	  
	  <!-- Default input -->
	  <div class="form-group">
	    <input type="email" class="form-control" placeholder="E-mail*" name="email" value="{{old('email')}}">
	  </div>
	  
	  	<!--Material textarea-->
		<!--<div class="form-group md-form md-outline white">-->
		<div class="form-group md-form md-outline">
		  <textarea id="form75" class="form-control white" rows="3" name="text">{{old('text')}}</textarea>
		  <label for="form75">Ваше сообщение*</label>
		</div>
		
		<!-- Sign in button -->
		<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Отправить</button>
	</form>