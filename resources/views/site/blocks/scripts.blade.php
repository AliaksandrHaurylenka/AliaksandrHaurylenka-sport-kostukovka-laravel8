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
 
 
 <script>

function refreshCaptcha(){
      $.ajax({
        url: "/refereshcapcha",
        type: 'get',
        dataType: 'html',
        success: function(json) {
          $('.refereshrecapcha').html(json);
        },
        error: function(data) {
          alert('Что-то пошло не так!');
        }
      });
    }

</script>


<script>
// Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
</script>


{{-- <script src="/feedback/vendors/jquery/jquery-3.4.1.min.js"></script> --}}
<script src="/feedback/js/process-forms.js"></script>
<script>
    //после загрузки DOM
    $(function () {
        /*
        Параметры указываются в виде:
        {
        ключ: значение;
        ключ: значение;
        ...
        }
        Основные параметры
        selector - селектор формы (по умолчанию '#feedback-form')
        attachmentsMaxFileSize - максимальный размер файла в Кбайтах (по умолчанию 512)
        attachmentsFileExt - допустимые расширения файлов для загрузки (по умолчанию 'jpg','jpeg','bmp','gif','png')
        isUseDefaultSuccessMessage - отображать дефолтное сообщение после отправки
        */
        var form1 = new ProcessForm();
        form1.init();

    });
</script>