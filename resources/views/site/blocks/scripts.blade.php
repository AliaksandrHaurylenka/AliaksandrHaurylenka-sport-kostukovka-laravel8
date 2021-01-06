<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<script src="{{ mix('js/app.js', 'build') }}"></script>


<!-- Bootstrap tooltips -->
<script src="/js/mdb_pro.min.js"></script>


<script>
  // Animations initialization
  new WOW().init();
</script>

{{-- Открытие страницы после перезагрузки в том месте где остановились просматривать --}}
{{-- <script>
  let cords = ['scrollX','scrollY'],
      submits = document.querySelectorAll('.btn-form');
  // console.log(submits);
  // Перед закрытием записываем в локалсторадж window.scrollX и window.scrollY как scrollX и scrollY
  submits.forEach(function(submit, i , submits){
    submit.addEventListener('click', e => cords.forEach(cord => localStorage[cord] = window[cord]));
  })
  // Прокручиваем страницу к scrollX и scrollY из localStorage (либо 0,0 если там еще ничего нет)
  window.scroll(...cords.map(cord => localStorage[cord]));
  //Удаляем сразу ключи, чтобы при клике на другие ссылки страница открывалась сверху
  localStorage.removeItem('scrollY');
  localStorage.removeItem('scrollX');
</script> --}}


<script>
  $(document).ready(function(){

    // Плавная прокрутка к сообщению при выводе ошибок
     $(".form").on("click","a", function (event) {
         event.preventDefault();
         var id  = $(this).attr('href'),
             top = $(id).offset().top;
         $('body, html').animate({scrollTop: top}, 1500);
     });


    //Флеш сообщения
     $(".flash.message").children('.alert').css({"padding-left": "21%", "padding-right": "22%"});


    //Просмотр галереи
     $("a[rel^='prettyPhoto']").prettyPhoto(
        theme="facebook"
     );

 });
 </script>


 {{-- <script>
    $('#refresh').on('click',function(){
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });
    });
</script> --}}


{{-- <script>

function refreshCaptcha(){
      $.ajax({
        url: "/refereshcapcha",
        type: 'get',
        dataType: 'html',
        success: function(json) {
          $('.refereshrecapcha').html(json);
        },
        error: function(data) {
          alert('Try Again.');
        }
      });
    }

</script> --}}