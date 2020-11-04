<div class="primary-color-dark">
  <div class="container">
    <div class="row text-white py-2">
      <div class="col-sm-4"><i class="far fa-clock fa-lg mr-1"></i>
        Время работы: {{Config::get('myconfig.time_work')}}
      </div>
      <div class="col-sm-4">
        <a href="mailto:{{Config::get('myconfig.email_sok')}}" class="text-white" target="_blank">
          <i class="far fa-envelope fa-lg mr-1"></i>E-mail: {{Config::get('myconfig.email_sok')}}
        </a>
      </div>
      <div class="col-sm-4">
        <a href="tel:{{Config::get('myconfig.phone_administrator_mobil')}}" class="text-white">
          <i class="fas fa-phone fa-lg mr-1"></i>{{Config::get('myconfig.phone_administrator_mobil')}}
        </a>
      </div>
    </div>
  </div>
</div>