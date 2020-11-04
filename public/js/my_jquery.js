/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ({

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),

/***/ 49:
/***/ (function(module, exports) {

$(document).ready(function () {

  $('#carousel-example-4 .carousel-item:first-child').addClass('active');

  $("a[data-gal^='prettyPhoto']").prettyPhoto({
    hook: 'data-gal',
    animation_speed: 'fast', /* fast/slow/normal */
    slideshow: 5000, /* false OR interval time in ms */
    autoplay_slideshow: false, /* true/false */
    opacity: 0.80, /* Value between 0 and 1 */
    show_title: true, /* true/false */
    allow_resize: true, /* Resize the photos bigger than viewport. true/false */
    default_width: 500,
    default_height: 344,
    counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
    // theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
    theme: 'dark_rounded', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
    horizontal_padding: 20, /* The padding on each side of the picture */
    hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
    wmode: 'opaque', /* Set the flash wmode attribute */
    autoplay: true, /* Automatically start videos: True/False */
    modal: false, /* If set to true, only the close button will close the window */
    deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
    overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
    keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
    changepicturecallback: function changepicturecallback() {}, /* Called everytime an item is shown/changed */
    callback: function callback() {}, /* Called when prettyPhoto is closed */
    ie6_fallback: true,
    markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#">next</a> \
											<a class="pp_previous" href="#">previous</a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous">Previous</a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next">Next</a> \
											</div> \
											<p class="pp_description"></p> \
											{pp_social} \
											<a class="pp_close" href="#">Close</a> \
										</div> \
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>',
    gallery_markup: '<div class="pp_gallery"> \
								<a href="#" class="pp_arrow_previous">Previous</a> \
								<div> \
									<ul> \
										{gallery} \
									</ul> \
								</div> \
								<a href="#" class="pp_arrow_next">Next</a> \
							</div>',
    image_markup: '<img id="fullResImage" src="{path}" />',
    flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
    quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
    iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
    inline_markup: '<div class="pp_inline">{content}</div>',
    custom_markup: '',
    social_tools: '<div class="pp_social"><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href=' + location.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div></div>' /* html or false to disable */
  });

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

/***/ })

/******/ });