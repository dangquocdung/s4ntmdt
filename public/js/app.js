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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');
// require('./common.js')
// require('./checkout.js')
__webpack_require__(/*! ./products-add-to-cart */ "./resources/assets/js/products-add-to-cart.js");

__webpack_require__(/*! ./unishop */ "./resources/assets/js/unishop.js"); // require('./customizer.js');


__webpack_require__(/*! ./dungdang */ "./resources/assets/js/dungdang.js"); // window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// const app = new Vue({
//     el: '#app'
// });

/***/ }),

/***/ "./resources/assets/js/dungdang.js":
/*!*****************************************!*\
  !*** ./resources/assets/js/dungdang.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('.product-reviews-content .rating-select .btn').on('mouseover', function () {
  $(this).removeClass('btn-light').addClass('btn-warning');
  $(this).prevAll().removeClass('btn-light').addClass('btn-warning');
  $(this).nextAll().removeClass('btn-warning').addClass('btn-light');
});
$('.product-reviews-content .rating-select').on('mouseleave', function () {
  active = $(this).parent().find('.selected');

  if (active.length) {
    active.removeClass('btn-light').addClass('btn-warning');
    active.prevAll().removeClass('btn-light').addClass('btn-warning');
    active.nextAll().removeClass('btn-warning').addClass('btn-light');
  } else {
    $(this).find('.btn').removeClass('btn-warning').addClass('btn-light');
  }
});
$('.product-reviews-content .rating-select .btn').click(function () {
  if ($(this).hasClass('selected')) {
    $('.product-reviews-content .rating-select .selected').removeClass('selected');
  } else {
    $('.product-reviews-content .rating-select .selected').removeClass('selected');
    $(this).addClass('selected');

    if ($('.product-reviews-content #selected_rating_value').length > 0) {
      $('.product-reviews-content #selected_rating_value').val($(this).data('rating_value'));
    }
  }
});
$('#share-content>a').on('click', function (e) {
  e.preventDefault();
  var share_url = null;
  var window_url = null;
  var product_url = null;
  product_url = window.location.href;

  if ($(this).data('name') == 'fb') {
    share_url = '//www.facebook.com/sharer.php?u=';
  } else if ($(this).data('name') == 'tweet') {
    share_url = '//twitter.com/share?text=' + encodeURI($('#product_title').val()) + '&url=';
  } else if ($(this).data('name') == 'gplus') {
    share_url = '//plus.google.com/share?url=';
  } else if ($(this).data('name') == 'pi') {
    share_url = '//pinterest.com/pin/create/button/?media=' + $('#product_img').val() + '&description=' + encodeURI($('#product_title').val()) + '&url=';
  } else if ($(this).data('name') == 'lin') {
    share_url = '//www.linkedin.com/shareArticle?mini=true&url=';
  }

  if ($(this).data('name') == 'fb' || $(this).data('name') == 'tweet' || $(this).data('name') == 'gplus' || $(this).data('name') == 'pi' || $(this).data('name') == 'lin') {
    window_url = share_url + product_url;
    window.open(window_url, "_blank", "scrollbars=yes, resizable=yes, toolbar=yes, top=50, left=50, width=500, height=500");
  } else if ($(this).data('name') == 'print') {
    window.print();
  }
});

/***/ }),

/***/ "./resources/assets/js/products-add-to-cart.js":
/*!*****************************************************!*\
  !*** ./resources/assets/js/products-add-to-cart.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var frontendLocalizationString;
$(document).ready(function () {
  if ($('#hf_base_url').length > 0 && $('#lang_code').length > 0) {
    $.getJSON($('#hf_base_url').val() + '/resources/lang/' + $('#lang_code').val() + '/frontend_js.json', function (data) {
      frontendLocalizationString = data;
    });
  }
  /**
   * product add to cart
   */
  //ajax request for add to cart


  if ($('.add-to-cart-bg').length > 0 || $('.single-page-add-to-cart').length > 0) {
    dynamicAddToCart();
  }
});

var dynamicAddToCart = function dynamicAddToCart() {
  $('.add-to-cart-bg, .single-page-add-to-cart').on('click', function (e) {
    e.preventDefault();
    var dataObj = {};
    var selected_option = {};
    dataObj['product_id'] = $(this).data('id');

    if ($('#quantity').length > 0) {
      dataObj['qty'] = parseInt($('#quantity').val());
    } else {
      dataObj['qty'] = 1;
    }

    if ($('#backorder_val').length > 0 && ($('#backorder_val').val() == 'not_allow' || $('#backorder_val').val() == 'variation_not_allow') && $('#available_stock_val').val() > 0 && dataObj.qty > $('#available_stock_val').val()) {
      alert("Maximum quantity allow " + $('#available_stock_val').val());
      return false;
    }

    if ($('#selected_variation_id').length > 0 && $('#selected_variation_id').val()) {
      dataObj['variation_id'] = parseInt($('#selected_variation_id').val());
    }

    if ($('.variations-content-main').length > 0) {
      $('.variations-content-main .variations-line').each(function () {
        selected_option[$(this).find('.variation-attr-name').html()] = $(this).find('.variation-attr-value input[type="radio"]:checked:checked').data('value');
      });
    }

    dataObj['selected_option'] = selected_option;
    $('#shadow-layer, .add-to-cart-loader').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/add-to-cart',
      type: 'POST',
      cache: false,
      datatype: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: dataObj,
      success: function success(data) {
        if (data && data == 'zero_price') {
          $('#shadow-layer, .add-to-cart-loader').hide();
          swal("", frontendLocalizationString.price_can_not_be_zero);
        } else if (data && data == 'out_of_stock') {
          $('#shadow-layer, .add-to-cart-loader').hide();
          swal("", frontendLocalizationString.product_out_of_stock);
        } else if (data && data == 'vendor_not_same') {
          $('#shadow-layer, .add-to-cart-loader').hide();
          swal("", frontendLocalizationString.vendor_not_same_msg);
        } else if (data && data == 'stock_over') {
          $('#shadow-layer, .add-to-cart-loader').hide();
          swal("", 'May be you try with over quantity!');
        } else if (data && data == 'item_added') {
          var get_mini_cart_id = $('.show-mini-cart').data('id');
          $.ajax({
            url: $('#hf_base_url').val() + '/ajax/get-mini-cart-data',
            type: 'POST',
            cache: false,
            data: {
              mini_cart_id: get_mini_cart_id
            },
            datatype: 'json',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function success(data) {
              if (data.status && data.status == 'success' && data.type == 'mini_cart_data' && data.html) {
                $('.mini-cart-content').html(data.html);
                $('#shadow-layer, .add-to-cart-loader').hide();

                if (get_mini_cart_id == 1) {
                  if ($('.show-mini-cart').length > 0) {
                    $('.show-mini-cart').off('click').on('click', function (e) {
                      e.preventDefault();
                      e.stopPropagation();
                      $('#list_popover').fadeToggle();
                      return false;
                    });
                  }
                } else if (get_mini_cart_id == 2) {
                  $body = $('body');
                  $body.on('click', 'header .mini-cart-content', function (e) {
                    $('header .mini-cart-content').find(".mini-cart-dropdown").addClass('open');
                    e.preventDefault();
                  });
                  $body.on('click', 'header .mini-cart-content .close-cart', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $('header .mini-cart-content').find(".mini-cart-dropdown").removeClass('open');
                  });
                  $body.on('click', 'header .mini-cart-content .title, header .mini-cart-content .img, header .mini-cart-content .delete, header .mini-cart-content .cart-bottom .checkout, header .mini-cart-content .cart-bottom .cart', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    window.location.href = $(this).find('a').attr('href');
                  });
                }

                if (get_mini_cart_id == 1) {
                  $('#list_popover').fadeIn();
                } else if (get_mini_cart_id == 2) {
                  $('header .mini-cart-content').find(".mini-cart-dropdown").addClass('open');
                }

                $("html, body").animate({
                  scrollTop: 0
                }, "slow");
                return false;
              }
            },
            error: function error() {}
          });
        }
      },
      error: function error() {}
    });
  });
};

/***/ }),

/***/ "./resources/assets/js/unishop.js":
/*!****************************************!*\
  !*** ./resources/assets/js/unishop.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 * Unishop | Universal E-Commerce Template
 * Copyright 2018 rokaux
 * Theme Custom Scripts
 */

/*global jQuery, iziToast, noUiSlider*/
jQuery(document).ready(function ($) {
  'use strict'; // Check if Page Scrollbar is visible
  //------------------------------------------------------------------------------

  var hasScrollbar = function hasScrollbar() {
    // The Modern solution
    if (typeof window.innerWidth === 'number') {
      return window.innerWidth > document.documentElement.clientWidth;
    } // rootElem for quirksmode


    var rootElem = document.documentElement || document.body; // Check overflow style property on body for fauxscrollbars

    var overflowStyle;

    if (typeof rootElem.currentStyle !== 'undefined') {
      overflowStyle = rootElem.currentStyle.overflow;
    }

    overflowStyle = overflowStyle || window.getComputedStyle(rootElem, '').overflow; // Also need to check the Y axis overflow

    var overflowYStyle;

    if (typeof rootElem.currentStyle !== 'undefined') {
      overflowYStyle = rootElem.currentStyle.overflowY;
    }

    overflowYStyle = overflowYStyle || window.getComputedStyle(rootElem, '').overflowY;
    var contentOverflows = rootElem.scrollHeight > rootElem.clientHeight;
    var overflowShown = /^(visible|auto)$/.test(overflowStyle) || /^(visible|auto)$/.test(overflowYStyle);
    var alwaysShowScroll = overflowStyle === 'scroll' || overflowYStyle === 'scroll';
    return contentOverflows && overflowShown || alwaysShowScroll;
  };

  if (hasScrollbar()) {
    $('body').addClass('hasScrollbar');
  } // Disable default link behavior for dummy links that have href='#'
  //------------------------------------------------------------------------------


  var $emptyLink = $('a[href="#"]');
  $emptyLink.on('click', function (e) {
    e.preventDefault();
  }); // Sticky Navbar
  //------------------------------------------------------------------------------

  function stickyHeader() {
    var $body = $('body');
    var $navbar = $('.navbar-sticky');
    var $topbarH = $('.topbar').outerHeight();
    var $navbarH = $navbar.find('.navbar').outerHeight();

    if ($navbar.length) {
      $(window).on('scroll', function () {
        if ($(this).scrollTop() > $topbarH) {
          $navbar.addClass('navbar-stuck');
          $body.css('padding-top', $navbarH);
        } else {
          $navbar.removeClass('navbar-stuck');
          $body.css('padding-top', 0);
        }
      });
    }
  }

  stickyHeader(); // Mobile Menu Toggle
  //-----------------------------------------------------------

  function mobileMenu(trigger, target) {
    $(trigger).on('click', function () {
      $(this).toggleClass('active');
      $(this).find('i').toggleClass('icon-x');
      $(target).toggleClass('open');
    });
  }

  mobileMenu('.mobile-menu-toggle', '.mobile-menu'); // Slidable (Mobile) Menu
  //---------------------------------------------------------

  var backBtnText = 'Back',
      subMenu = $('.slideable-menu .slideable-submenu');
  subMenu.each(function () {
    $(this).prepend('<li class="back-btn"><a href="#">' + backBtnText + '</a></li>');
  });
  var hasChildLink = $('.has-children .sub-menu-toggle'),
      backBtn = $('.slideable-menu .slideable-submenu .back-btn');
  backBtn.on('click', function (e) {
    var self = this,
        parent = $(self).parent(),
        siblingParent = $(self).parent().parent().siblings().parent(),
        menu = $(self).parents('.menu'),
        menuInitHeight = $('.slideable-menu .menu').attr('data-initial-height');
    parent.removeClass('in-view');
    siblingParent.removeClass('off-view');

    if (siblingParent.attr('class') === 'menu') {
      menu.css('height', menuInitHeight);
    } else {
      menu.css('height', siblingParent.height());
    }

    e.preventDefault();
  });
  hasChildLink.on('click', function (e) {
    var self = this,
        parent = $(self).parent().parent().parent(),
        menu = $(self).parents('.menu');
    parent.addClass('off-view');
    $(self).parent().parent().find('> .slideable-submenu').addClass('in-view');
    menu.css('height', $(self).parent().parent().find('> .slideable-submenu').height());
    e.preventDefault();
    return false;
  }); // Off-Canvas Sidebar
  //-----------------------------------------------------------

  function offcanvasSidebar(triggerOpen, target, triggerClose) {
    $(triggerOpen).on('click', function () {
      $(this).addClass('sidebar-open');
      $(target).addClass('open');
    });
    $(triggerClose).on('click', function () {
      $(triggerOpen).removeClass('sidebar-open');
      $(target).removeClass('open');
    });
  }

  offcanvasSidebar('.sidebar-toggle', '.sidebar-offcanvas', '.sidebar-close'); // Animated Scroll to Top Button
  //------------------------------------------------------------------------------

  var $scrollTop = $('.scroll-to-top-btn');

  if ($scrollTop.length > 0) {
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 600) {
        $scrollTop.addClass('visible');
      } else {
        $scrollTop.removeClass('visible');
      }
    });
    $scrollTop.on('click', function (e) {
      e.preventDefault();
      $('html').velocity('scroll', {
        offset: 0,
        duration: 1200,
        easing: 'easeOutExpo',
        mobileHA: false
      });
    });
  } // Smooth scroll to element
  //---------------------------------------------------------


  $(document).on('click', '.scroll-to', function (event) {
    var target = $(this).attr('href');

    if ('#' === target) {
      return false;
    }

    var $target = $(target);

    if ($target.length > 0) {
      var $elemOffsetTop = $target.data('offset-top') || 65;
      $('html').velocity('scroll', {
        offset: $(this.hash).offset().top - $elemOffsetTop,
        duration: 1000,
        easing: 'easeOutExpo',
        mobileHA: false
      });
    }

    event.preventDefault();
  }); // Filter List Groups
  //---------------------------------------------------------

  function filterList(trigger) {
    trigger.each(function () {
      var self = $(this),
          target = self.data('filter-list'),
          search = self.find('input[type=text]'),
          filters = self.find('input[type=radio]'),
          list = $(target).find('.list-group-item'); // Search

      search.keyup(function () {
        var searchQuery = search.val();
        list.each(function () {
          var text = $(this).text().toLowerCase();
          text.indexOf(searchQuery.toLowerCase()) == 0 ? $(this).show() : $(this).hide();
        });
      }); // Filters

      filters.on('click', function (e) {
        var targetItem = $(this).val();

        if (targetItem !== 'all') {
          list.hide();
          $('[data-filter-item=' + targetItem + ']').show();
        } else {
          list.show();
        }
      });
    });
  }

  filterList($('[data-filter-list]')); // Form Validation
  //------------------------------------------------------------------------------

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation'); // Loop over them and prevent submission

    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false); // Countdown Function
  //------------------------------------------------------------------------------

  function countDownFunc(items, trigger) {
    items.each(function () {
      var countDown = $(this),
          dateTime = $(this).data('date-time');
      var countDownTrigger = trigger ? trigger : countDown;
      countDownTrigger.downCount({
        date: dateTime,
        offset: +10
      });
    });
  }

  countDownFunc($('.countdown')); // Toast Notifications
  //------------------------------------------------------------------------------

  $('[data-toast]').on('click', function () {
    var self = $(this),
        $type = self.data('toast-type'),
        $icon = self.data('toast-icon'),
        $position = self.data('toast-position'),
        $title = self.data('toast-title'),
        $message = self.data('toast-message'),
        toastOptions = '';

    switch ($position) {
      case 'topRight':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'topRight',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInLeft',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      case 'bottomRight':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'bottomRight',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInLeft',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      case 'topLeft':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'topLeft',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInRight',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      case 'bottomLeft':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'bottomLeft',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInRight',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      case 'topCenter':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'topCenter',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInDown',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      case 'bottomCenter':
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'bottomCenter',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInUp',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
        break;

      default:
        toastOptions = {
          "class": 'iziToast-' + $type || false,
          title: $title || 'Title',
          message: $message || 'toast message',
          animateInside: false,
          position: 'topRight',
          progressBar: false,
          icon: $icon,
          timeout: 3200,
          transitionIn: 'fadeInLeft',
          transitionOut: 'fadeOut',
          transitionInMobile: 'fadeIn',
          transitionOutMobile: 'fadeOut'
        };
    }

    iziToast.show(toastOptions);
  }); // Launch defaul BS Toasts on click

  $('[data-toggle="toast"]').on('click', function () {
    var target = '#' + $(this).data('toast-id');
    $(target).toast('show');
  }); // Isotope Grid / Filters (Gallery)
  //------------------------------------------------------------------------------
  // Isotope Grid

  if ($('.isotope-grid').length) {
    var $grid = $('.isotope-grid').imagesLoaded(function () {
      $grid.isotope({
        itemSelector: '.grid-item',
        transitionDuration: '0.7s',
        masonry: {
          columnWidth: '.grid-sizer',
          gutter: '.gutter-sizer'
        }
      });
    });
  } // Filtering


  if ($('.filter-grid').length > 0) {
    var $filterGrid = $('.filter-grid');
    $('.nav-pills').on('click', 'a', function (e) {
      e.preventDefault();
      $('.nav-pills a').removeClass('active');
      $(this).addClass('active');
      var $filterValue = $(this).attr('data-filter');
      $filterGrid.isotope({
        filter: $filterValue
      });
    });
  } // Shop Categories Widget
  //------------------------------------------------------------------------------


  var categoryToggle = $('.widget-categories .has-children > a');

  function closeCategorySubmenu() {
    categoryToggle.parent().removeClass('expanded');
  }

  categoryToggle.on('click', function (e) {
    if ($(e.target).parent().is('.expanded')) {
      closeCategorySubmenu();
    } else {
      closeCategorySubmenu();
      $(this).parent().addClass('expanded');
    }
  }); // Tooltips
  //------------------------------------------------------------------------------

  $('[data-toggle="tooltip"]').tooltip(); // Popovers
  //------------------------------------------------------------------------------

  $('[data-toggle="popover"]').popover(); // Range Slider
  //------------------------------------------------------------------------------

  $('.price-range-slider').each(function () {
    var self = $(this);
    var rangeSlider = self.find('.ui-range-slider');
    var options = {
      dataStartMin: parseInt(rangeSlider.parent().data('start-min'), 10),
      dataStartMax: parseInt(rangeSlider.parent().data('start-max'), 10),
      dataMin: parseInt(rangeSlider.parent().data('min'), 10),
      dataMax: parseInt(rangeSlider.parent().data('max'), 10),
      dataStep: parseInt(rangeSlider.parent().data('step'), 10),
      valueMin: self.find('.ui-range-value-min span'),
      valueMax: self.find('.ui-range-value-max span'),
      valueMinInput: self.find('.ui-range-value-min input'),
      valueMaxInput: self.find('.ui-range-value-max input')
    };
    noUiSlider.create(rangeSlider[0], {
      start: [options.dataStartMin, options.dataStartMax],
      connect: true,
      step: options.dataStep,
      range: {
        'min': options.dataMin,
        'max': options.dataMax
      }
    });
    rangeSlider[0].noUiSlider.on('update', function (values, handle) {
      var value = values[handle];

      if (handle) {
        options.valueMax.text(Math.round(value));
        options.valueMaxInput.val(Math.round(value));
      } else {
        options.valueMin.text(Math.round(value));
        options.valueMinInput.val(Math.round(value));
      }
    });
  }); // Interactive Credit Card
  //------------------------------------------------------------------------------

  var $creditCard = $('.interactive-credit-card');

  if ($creditCard.length) {
    $creditCard.card({
      form: '.interactive-credit-card',
      container: '.card-wrapper'
    });
  } // Gallery (Photoswipe)
  //------------------------------------------------------------------------------


  if ($('.gallery-wrapper').length) {
    var initPhotoSwipeFromDOM = function initPhotoSwipeFromDOM(gallerySelector) {
      // parse slide data (url, title, size ...) from DOM elements
      // (children of gallerySelector)
      var parseThumbnailElements = function parseThumbnailElements(el) {
        var thumbElements = $(el).find('.gallery-item:not(.isotope-hidden)').get(),
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for (var i = 0; i < numNodes; i++) {
          figureEl = thumbElements[i]; // <figure> element
          // include only element nodes

          if (figureEl.nodeType !== 1) {
            continue;
          }

          linkEl = figureEl.children[0]; // <a> element
          // create slide object

          if ($(linkEl).data('type') == 'video') {
            item = {
              html: $(linkEl).data('video')
            };
          } else {
            size = linkEl.getAttribute('data-size').split('x');
            item = {
              src: linkEl.getAttribute('href'),
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10)
            };
          }

          if (figureEl.children.length > 1) {
            item.title = $(figureEl).find('.caption').html();
          }

          if (linkEl.children.length > 0) {
            item.msrc = linkEl.children[0].getAttribute('src');
          }

          item.el = figureEl; // save link to element for getThumbBoundsFn

          items.push(item);
        }

        return items;
      }; // find nearest parent element


      var closest = function closest(el, fn) {
        return el && (fn(el) ? el : closest(el.parentNode, fn));
      };

      function hasClass(element, cls) {
        return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
      } // triggers when user clicks on thumbnail


      var onThumbnailsClick = function onThumbnailsClick(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        var eTarget = e.target || e.srcElement; // find root element of slide

        var clickedListItem = closest(eTarget, function (el) {
          return hasClass(el, 'gallery-item');
        });

        if (!clickedListItem) {
          return;
        } // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute


        var clickedGallery = clickedListItem.closest('.gallery-wrapper'),
            childNodes = $(clickedListItem.closest('.gallery-wrapper')).find('.gallery-item:not(.isotope-hidden)').get(),
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
          if (childNodes[i].nodeType !== 1) {
            continue;
          }

          if (childNodes[i] === clickedListItem) {
            index = nodeIndex;
            break;
          }

          nodeIndex++;
        }

        if (index >= 0) {
          // open PhotoSwipe if valid index found
          openPhotoSwipe(index, clickedGallery);
        }

        return false;
      }; // parse picture index and gallery index from URL (#&pid=1&gid=2)


      var photoswipeParseHash = function photoswipeParseHash() {
        var hash = window.location.hash.substring(1),
            params = {};

        if (hash.length < 5) {
          return params;
        }

        var vars = hash.split('&');

        for (var i = 0; i < vars.length; i++) {
          if (!vars[i]) {
            continue;
          }

          var pair = vars[i].split('=');

          if (pair.length < 2) {
            continue;
          }

          params[pair[0]] = pair[1];
        }

        if (params.gid) {
          params.gid = parseInt(params.gid, 10);
        }

        return params;
      };

      var openPhotoSwipe = function openPhotoSwipe(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;
        items = parseThumbnailElements(galleryElement); // define options (if needed)

        options = {
          closeOnScroll: false,
          // define gallery index (for URL)
          galleryUID: galleryElement.getAttribute('data-pswp-uid'),
          getThumbBoundsFn: function getThumbBoundsFn(index) {
            // See Options -> getThumbBoundsFn section of documentation for more info
            var thumbnail = items[index].el.getElementsByTagName('img')[0]; // find thumbnail

            if ($(thumbnail).length > 0) {
              var pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                  rect = thumbnail.getBoundingClientRect();
              return {
                x: rect.left,
                y: rect.top + pageYScroll,
                w: rect.width
              };
            }
          }
        }; // PhotoSwipe opened from URL

        if (fromURL) {
          if (options.galleryPIDs) {
            // parse real index when custom PIDs are used
            // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
            for (var j = 0; j < items.length; j++) {
              if (items[j].pid == index) {
                options.index = j;
                break;
              }
            }
          } else {
            // in URL indexes start from 1
            options.index = parseInt(index, 10) - 1;
          }
        } else {
          options.index = parseInt(index, 10);
        } // exit if index not found


        if (isNaN(options.index)) {
          return;
        }

        if (disableAnimation) {
          options.showAnimationDuration = 0;
        } // Pass data to PhotoSwipe and initialize it


        gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
        gallery.listen('beforeChange', function () {
          var currItem = $(gallery.currItem.container);
          $('.pswp__video').removeClass('active');
          var currItemIframe = currItem.find('.pswp__video').addClass('active');
          $('.pswp__video').each(function () {
            if (!$(this).hasClass('active')) {
              $(this).attr('src', $(this).attr('src'));
            }
          });
        });
        gallery.listen('close', function () {
          $('.pswp__video').each(function () {
            $(this).attr('src', $(this).attr('src'));
          });
        });
      }; // loop through all gallery elements and bind events


      var galleryElements = document.querySelectorAll(gallerySelector);

      for (var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i + 1);
        galleryElements[i].onclick = onThumbnailsClick;
      } // Parse URL and open gallery if it contains #&pid=3&gid=1


      var hashData = photoswipeParseHash();

      if (hashData.pid && hashData.gid) {
        openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
      }
    }; // execute above function


    initPhotoSwipeFromDOM('.gallery-wrapper');
  } // Product Gallery
  //------------------------------------------------------------------------------


  var $productCarousel = $('.product-carousel');

  if ($productCarousel.length) {
    var activeHash = function activeHash(e) {
      var i = e.item.index;
      var $activeHash = $('.owl-item').eq(i).find('[data-hash]').attr('data-hash');
      $('.product-thumbnails li').removeClass('active');
      $('[href="#' + $activeHash + '"]').parent().addClass('active');
      $('[data-hash="' + $activeHash + '"]').parent().addClass('active');
    };

    // Carousel init
    $productCarousel.owlCarousel({
      items: 1,
      loop: false,
      dots: false,
      URLhashListener: true,
      startPosition: 'URLHash',
      onTranslate: activeHash
    });
  } // Google Maps API
  //------------------------------------------------------------------------------


  var $googleMap = $('.google-map');

  if ($googleMap.length) {
    $googleMap.each(function () {
      var mapHeight = $(this).data('height'),
          address = $(this).data('address'),
          zoom = $(this).data('zoom'),
          controls = $(this).data('disable-controls'),
          scrollwheel = $(this).data('scrollwheel'),
          marker = $(this).data('marker'),
          markerTitle = $(this).data('marker-title'),
          styles = $(this).data('styles');
      $(this).height(mapHeight);
      $(this).gmap3({
        marker: {
          address: address,
          data: markerTitle,
          options: {
            icon: marker
          },
          events: {
            mouseover: function mouseover(marker, event, context) {
              var map = $(this).gmap3('get'),
                  infowindow = $(this).gmap3({
                get: {
                  name: 'infowindow'
                }
              });

              if (infowindow) {
                infowindow.open(map, marker);
                infowindow.setContent(context.data);
              } else {
                $(this).gmap3({
                  infowindow: {
                    anchor: marker,
                    options: {
                      content: context.data
                    }
                  }
                });
              }
            },
            mouseout: function mouseout() {
              var infowindow = $(this).gmap3({
                get: {
                  name: 'infowindow'
                }
              });

              if (infowindow) {
                infowindow.close();
              }
            }
          }
        },
        map: {
          options: {
            zoom: zoom,
            disableDefaultUI: controls,
            scrollwheel: scrollwheel,
            styles: styles
          }
        }
      });
    });
  }
});
/*Document Ready End*/

/***/ }),

/***/ "./resources/assets/sass/styles.scss":
/*!*******************************************!*\
  !*** ./resources/assets/sass/styles.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/sass/styles.scss ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\project\s4ntmdt\resources\assets\js\app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! D:\project\s4ntmdt\resources\assets\sass\styles.scss */"./resources/assets/sass/styles.scss");


/***/ })

/******/ });