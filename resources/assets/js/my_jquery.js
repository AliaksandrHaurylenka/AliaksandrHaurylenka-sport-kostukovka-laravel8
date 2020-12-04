$(document).ready(function () {


  $('#carousel-example-4 .carousel-item:first-child').addClass('active');



  /**
   * Активные вкладки
   * @param id
   * @param tag
   * @param cls
   */
  function activeLinks(id, tag, cls) {
    try {
      var el = document.getElementById(id).getElementsByTagName(tag); //ищем элемент
      var url = document.location.href; //палим текущий урл
      for (var i = 0; i < el.length; i++) {
        if (url === el[i].href) {
          //el[i].className = 'pl-1';//если урл==текущий, добавляем класс
          el[i].parentElement.className = cls; //если урл==текущий, добавляем родителю класс
        }
      }
    } catch (e) {}
  }

  /**
   * Активные вкладки
   * @param id
   * @param tag
   * @param cls
   */
  function activeButton(id, tag, cls) {
    try {
      var el = document.getElementById(id).getElementsByTagName(tag); //ищем элемент
      var url = document.location.href; //палим текущий урл
      for (var i = 0; i < el.length; i++) {
        if (url === el[i].href) {
          el[i].className = cls; //если урл==текущий, добавляем класс
        }
      }
    } catch (e) {}
  }

  activeLinks('main', 'a', 'nav-item menu-active');
  activeLinks('menu-footer', 'a', 'menu-active pl-1');
  activeLinks('menu-sport-sections-footer', 'a', 'menu-active pl-1');
  activeButton("navbarNav", 'a', 'btn btn-primary btn-md');

  /**
   * Активные вкладки "Новости"
   * при просмотре одного поста,
   * при выводе категорий,
   * при выводе постов автора и т.п.
   */
  function activeNews(x, y, str) {
    var url = document.location.pathname.substr(x, y);
    if (url === str) {
      $('.novosti').parent().addClass('menu-active');
      $('.footer-novosti').parent().addClass('menu-active pl-1');
    }
    //alert(url);
  }

  activeNews(0, 5, '/post');
  activeNews(0, 9, '/category');
  activeNews(0, 12, '/no-category');
  activeNews(0, 11, '/user_posts');
  activeNews(0, 4, '/tag');
  activeNews(0, 8, '/archive');

  /**
   * Условие:
   * если активен элемент выпадающего списка, меню,
   * то родителю выпадающего списка, меню
   * присваивается также класс 'active'
   */
  if ($('.dropdown-menu p').hasClass('menu-active')) {
    $('ul > li.dropdown').first().addClass('menu-active');
  }

  // Скролинг вверх
  $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    scrollDistance: 300, // Distance from top/bottom before showing element (px)
    scrollFrom: 'top', // 'top' or 'bottom'
    scrollSpeed: 300, // Speed back to top (ms)
    easingType: 'linear', // Scroll to top easing (see http://easings.net/)
    animation: 'fade', // Fade, slide, none
    animationSpeed: 200, // Animation speed (ms)
    scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
    scrollTarget: false, // Set a custom target element for scrolling to. Can be element or number
    scrollText: '', // Text for element, can contain HTML
    scrollTitle: false, // Set a custom <a> title if required.
    scrollImg: false, // Set true to use image
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    zIndex: 2147483647 // Z-Index for the overlay
  });

  // Настройка FlexSlider
  $(window).load(function () {
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: true,
      itemWidth: 186,
      itemMargin: 1,
      minItems: 2,
      maxItems: 6
    });
  });

  //Активность вкладок объявлений
  $('.nav.nav-tabs a').first().addClass('nav-item nav-link active');
  $('.tab-content div').first().addClass('tab-pane fade show active');

  /*$('#contactform').on('submit', function (e) {
      e.preventDefault();

      $.ajax({
          type: 'POST',
          url: '/letter',
          data: $('#contactform').serialize(),
          success: function (data) {
              if (data.data) {
                  $('#senderror').hide();
                  $('#sendmessage').show();
              } else {
                  $('#senderror').show();
                  $('#sendmessage').hide();
              }
          },
          error: function () {
              $('#senderror').show();
              $('#sendmessage').hide();
          }
      });
  });*/
});