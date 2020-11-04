<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 my-4">

  <!-- Links -->
  <h6 class="text-uppercase font-weight-bold">Контакты</h6>
  <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
  <p><i class="fas fa-home mr-3"></i>{{Config::get('myconfig.address')}}</p>
  <p>
    <a href="mailto:{{Config::get('myconfig.email_sok')}}" class="text-white">
      <i class="fas fa-envelope mr-3"></i> {{Config::get('myconfig.email_sok')}}
    </a>
  </p>
  <p>
    <a href="tel:{{Config::get('myconfig.phone_administrator')}}" class="text-white">
      <i class="fas fa-phone mr-3"></i>{{Config::get('myconfig.phone_administrator')}}
    </a>
  </p>
  <p>
    <a href="tel:{{Config::get('myconfig.phone_administrator')}}" class="text-white">
      <i class="fas fa-print mr-3"></i>{{Config::get('myconfig.phone_fax_sok')}}
    </a>
  </p>

</div>