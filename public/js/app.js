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
__webpack_require__(/*! ./common.js */ "./resources/assets/js/common.js");

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

/***/ "./resources/assets/js/common.js":
/*!***************************************!*\
  !*** ./resources/assets/js/common.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var frontendLocalizationString;
/*scroll to top*/

$(document).ready(function () {
  $('.shopist-iCheck').iCheck({
    // checkboxClass: 'icheckbox_square',
    checkboxClass: 'icheckbox_square-purple',
    radioClass: 'iradio_square-purple',
    increaseArea: '20%'
  });
  shopist_frontend.init.pageLoad();
  $('#productRequest').on('hidden.bs.modal', function () {
    $('.subscribe-message').text('');
    $('#subscribe_email').val('');
  });

  if ($('#hf_base_url').length > 0 && $('#lang_code').length > 0) {
    $.getJSON('/resources/lang/' + $('#lang_code').val() + '/frontend_js.json', function (data) {
      frontendLocalizationString = data;
    });
  } //upload profile image


  if ($('#frontend_user_profile_picture_uploader').length > 0) {
    Dropzone.autoDiscover = false;
    $("#frontend_user_profile_picture_uploader").dropzone({
      url: $('#hf_base_url').val() + "/upload/product-related-image",
      paramName: "profile_picture",
      acceptedFiles: "image/*",
      uploadMultiple: false,
      maxFiles: 1,
      autoProcessQueue: true,
      parallelUploads: 100,
      addRemoveLinks: true,
      maxFilesize: 1,
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      init: function init() {
        this.on("maxfilesexceeded", function (file) {
          swal("", frontendLocalizationString.maxfilesexceeded_msg);
        });
        this.on("error", function (file, message) {
          if (file.size > 1 * 1024 * 1024) {
            swal("", frontendLocalizationString.file_larger);
            this.removeFile(file);
            return false;
          }

          if (!file.type.match('image.*')) {
            swal("", frontendLocalizationString.image_file_validation);
            this.removeFile(file);
            return false;
          }
        });
        this.on("success", function (file, responseText) {
          if (responseText.status === 'success') {
            $('.profile-picture').find('img').attr('src', $('#hf_base_url').val() + '/uploads/' + responseText.name);
            $('.profile-picture').show();
            $('.no-profile-picture').hide();
            $('#frontendUserUploadProfilePicture').modal('hide');
            $('#hf_frontend_profile_picture').val('/uploads/' + responseText.name);
            this.removeAllFiles();
          }
        });
      }
    });
  }

  if ($('.remove-frontend-profile-picture').length > 0) {
    $('.remove-frontend-profile-picture').on('click', function () {
      $('.no-profile-picture').show();
      $('.profile-picture').hide();
      $('#hf_frontend_profile_picture').val('');
    });
  }

  $('.products-brands-list .carousel[data-type="multi"] .item').each(function () {
    var next = $(this).next();

    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
      next = next.next();

      if (!next.length) {
        next = $(this).siblings(':first');
      }

      next.children(':first-child').clone().appendTo($(this));
    }
  }); //cat accordian

  if ($('#product-category .category-accordian').length > 0) {
    var selectIds = $('#product-category .category-accordian .panel-collapse');
    selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
      $(this).prev().find('span i').toggleClass('fa-plus fa-minus');
    });
  }

  if ($('#store_details .category-accordian').length > 0) {
    var selectIds = $('#store_details .category-accordian .panel-collapse');
    selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
      $(this).prev().find('span i').toggleClass('fa-plus fa-minus');
    });
  }

  if ($('#blog-cat-content-main .category-accordian').length > 0) {
    var selectIds = $('#blog-cat-content-main .category-accordian .panel-collapse');
    selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
      $(this).prev().find('span i').toggleClass('fa-plus fa-minus');
    });
  }

  if ($('#product-category #price_range').length > 0) {
    $('#product-category #price_range').slider().on('slideStop', function (ev) {
      $('#price_min').val(ev.value[0]);
      $('#price_max').val(ev.value[1]);
      $('.price-slider-option .tooltip-inner').html(ev.value[0] + ':' + ev.value[1]);
    });
  }

  if ($('.products-list-top .product-views').length > 0) {
    $('.products-list-top .product-views [data-toggle="tooltip"]').tooltip();
  }

  if ($('#product-category .product-categories-accordian h2 span').length > 0) {
    $('#product-category .product-categories-accordian h2 span').click(function () {
      $('#product-category .product-categories-accordian .category-accordian').slideToggle("slow");
      $('#product-category .product-categories-accordian h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#blog-cat-content-main .blog-categories-accordian h2 span').length > 0) {
    $('#blog-cat-content-main .blog-categories-accordian h2 span').click(function () {
      $('#blog-cat-content-main .blog-categories-accordian .category-accordian').slideToggle("slow");
      $('#blog-cat-content-main .blog-categories-accordian h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#product-category .price-filter h2 span').length > 0) {
    $('#product-category .price-filter h2 span').click(function () {
      $('#product-category .price-filter .price-slider-option').slideToggle("slow");
      $('#product-category .price-filter h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#product-category .sort-filter h2 span').length > 0) {
    $('#product-category .sort-filter h2 span').click(function () {
      $('#product-category .sort-filter .sort-filter-option').slideToggle("slow");
      $('#product-category .sort-filter h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#product-category .colors-filter h2 span').length > 0) {
    $('#product-category .colors-filter h2 span').click(function () {
      $('#product-category .colors-filter .colors-filter-option').slideToggle("slow");
      $('#product-category .colors-filter h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#product-category .size-filter h2 span').length > 0) {
    $('#product-category .size-filter h2 span').click(function () {
      $('#product-category .size-filter .size-filter-option').slideToggle("slow");
      $('#product-category .size-filter h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  if ($('#tag_single_page_main .tags-product-list h2 span').length > 0) {
    $('#tag_single_page_main .tags-product-list h2 span').click(function () {
      $('#tag_single_page_main .tags-product-list .tag-list').slideToggle("slow");
      $('#tag_single_page_main .tags-product-list h2 span').toggleClass('responsive-accordian responsive-accordian-open');
    });
  }

  $(window).resize(function () {
    if ($(window).width() > 768) {
      $('#product-category .product-categories-accordian .category-accordian, #blog-cat-content-main .blog-categories-accordian .category-accordian, .price-filter .price-slider-option, .sort-filter .sort-filter-option, .colors-filter .colors-filter-option, .size-filter .size-filter-option, #tag_single_page_main .tags-product-list .tag-list').removeAttr('style');
    }
  });

  if ($('#table_user_account_order_list').length > 0 || $('#coupons_list').length > 0 || $('#table_user_account_download_list').length > 0) {
    $('#table_user_account_order_list, #coupons_list, #table_user_account_download_list').DataTable();
  }

  if ($('#product_single_page').find('.read-review .reviews').length > 0) {
    $('#product_single_page').find('.read-review .reviews').on('click', function () {
      product_review_tab_control_with_hashtag();
    });
  }

  if ($('#product_single_page').find('.write-review .open-comment-form').length > 0) {
    $('#product_single_page').find('.write-review .open-comment-form').on('click', function () {
      product_review_tab_control_with_hashtag();
    });
  }

  $('.blog-reviews-content .rating-select .btn').on('mouseover', function () {
    $(this).removeClass('btn-light').addClass('btn-warning');
    $(this).prevAll().removeClass('btn-light').addClass('btn-warning');
    $(this).nextAll().removeClass('btn-warning').addClass('btn-light');
  });
  $('.blog-reviews-content .rating-select').on('mouseleave', function () {
    active = $(this).parent().find('.blog-selected');

    if (active.length) {
      active.removeClass('btn-light').addClass('btn-warning');
      active.prevAll().removeClass('btn-light').addClass('btn-warning');
      active.nextAll().removeClass('btn-warning').addClass('btn-light');
    } else {
      $(this).find('.btn').removeClass('btn-warning').addClass('btn-light');
    }
  });
  $('.blog-reviews-content .rating-select .btn').click(function () {
    if ($(this).hasClass('blog-selected')) {
      $('.blog-reviews-content .rating-select .blog-selected').removeClass('blog-selected');
    } else {
      $('.blog-reviews-content .rating-select .blog-selected').removeClass('blog-selected');
      $(this).addClass('blog-selected');

      if ($('.blog-reviews-content #selected_rating_value').length > 0) {
        $('.blog-reviews-content #selected_rating_value').val($(this).data('rating_value'));
      }
    }
  });

  if ($('#product_single_page').length > 0) {
    var hash = window.location.hash;

    if (hash && (hash == '#product_description_bottom_tab' || hash == '#new_comment_form')) {
      product_review_tab_control_with_hashtag();
    }
  }

  if ($('#subscribtion_submit').length > 0) {
    $('#subscribtion_submit').on('click', function () {
      var obj = $(this);
      var str = false;

      if ($('#subscribe_options_name').length > 0 && ($('#subscribe_options_name').val().length == 0 || $('#subscribe_options_name').val() == "")) {
        $('#subscribe_options_name').css('border', '2px solid #FF0000');
        str = true;
      } else {
        $('#subscribe_options_name').css('border', 'none');
      }

      if ($('#subscribe_options_email').length > 0 && ($('#subscribe_options_email').val().length == 0 || $('#subscribe_options_email').val() == "" || !isValidEmail($('#subscribe_options_email').val()))) {
        $('#subscribe_options_email').css('border', '2px solid #FF0000');
        str = true;
      } else {
        $('#subscribe_options_email').css('border', 'none');
      }

      if (!str) {
        var name = '';
        var email = '';
        var type = '';

        if ($('#subscribe_options_name').length > 0 && $('#subscribe_options_name').val().length > 0) {
          name = $('#subscribe_options_name').val();
        }

        if ($('#subscribe_options_email').length > 0 && $('#subscribe_options_email').val().length > 0) {
          email = $('#subscribe_options_email').val();
        }

        if ($('#subscription_type').length > 0 && $('#subscription_type').val().length > 0) {
          type = $('#subscription_type').val();
        }

        shopist_frontend.ajaxCall.sendSubscriptionData(obj, name, email, type);
      }
    });
  } //checkout multistep


  var current = 1;
  var is_enable_selected = false;
  widget = $("#checkout_page .step");
  btnnext = $("#checkout_page .next");
  btnsubmit = $("#checkout_page .submit"); // Init buttons and UI

  widget.not(':eq(0)').hide();
  hideButtons(current);
  setProgress(current); // Next button click action

  btnnext.click(function (e) {
    e.preventDefault();

    if (checkoutStepValidation()) {
      if (current < widget.length) {
        widget.show(); //alert($('#checkout_page .checkout-content').find('#guest_user_address').index());

        if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'login_user' && !is_enable_selected && $('#is_user_login').val() == false) {
          var get_authentication_index = parseInt($('#checkout_page .checkout-content').find('#authentication').index()) - 1;
          widget.not(':eq(' + get_authentication_index + ')').hide();
          is_enable_selected = true;
        } else if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'login_user' && !is_enable_selected && $('#is_user_login').val() == true) {
          var get_login_user_address_index = parseInt($('#checkout_page .checkout-content').find('#login_user_address').index()) - 1;
          var get_payment_index = parseInt($('#checkout_page .checkout-content').find('#payment').index()) - 1;
          widget.not(':eq(' + get_login_user_address_index + ')').hide();
          is_enable_selected = true;
          current = get_payment_index;
        } else if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'guest' && !is_enable_selected) {
          var get_guest_user_address_index = parseInt($('#checkout_page .checkout-content').find('#guest_user_address').index()) - 1;
          var get_payment_index = parseInt($('#checkout_page .checkout-content').find('#payment').index()) - 1;
          widget.not(':eq(' + get_guest_user_address_index + ')').hide();
          is_enable_selected = true;
          current = get_payment_index;
        } else {
          widget.not(':eq(' + current++ + ')').hide();
        }

        setProgress(current);
      }

      hideButtons(current);
    }
  });

  if ($('#checkout_page #user_mode .checkout-process-user-mode').length > 0) {
    $('#checkout_page #user_mode .checkout-process-user-mode input[type="radio"]').on('ifClicked', function (event) {
      $('#selected_user_mode').val(this.value);
    });
  }

  if ($('#account_bill_phone_number').length > 0 || $('#account_shipping_phone_number').length > 0 || $('#account_bill_zip_or_postal_code').length > 0 || $('#account_shipping_zip_or_postal_code').length > 0 || $('#account_bill_fax_number').length > 0 || $('#account_shipping_fax_number').length > 0) {
    $("#account_bill_phone_number, #account_shipping_phone_number, #account_bill_zip_or_postal_code, #account_shipping_zip_or_postal_code, #account_bill_fax_number, #account_shipping_fax_number").ForceNumericOnly();
  }

  if ($('#apply_coupon_post').length > 0) {
    $('#apply_coupon_post').on('click', function (e) {
      e.preventDefault();

      if ($('#apply_coupon_code').val().length == 0 && $('#apply_coupon_code').val() == '') {
        $('#apply_coupon_code').css({
          'border': '1px solid #f06953'
        });
        return false;
      } else {
        $('#apply_coupon_code').css({
          'border': '1px solid #cccccc'
        });
        shopist_frontend.ajaxCall.applyCoupon($('#apply_coupon_code').val());
      }
    });
  }

  if ($('.delete_item_from_wishlist').length > 0) {
    $('.delete_item_from_wishlist').on('click', function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.wishlistItemDelete($(this).data('id'));
    });
  }

  if ($('.chk-colors-filter').length > 0) {
    $('.chk-colors-filter').on('ifChanged', function (event) {
      if (event.currentTarget.checked) {
        if ($('#selected_colors').length > 0 && $('#selected_colors').val().length > 0) {
          $('#selected_colors').val($('#selected_colors').val() + ',' + event.currentTarget.value);
        } else {
          $('.filter-panel .colors-filter').append('<input name="selected_colors" id="selected_colors" type="hidden">');
          $('#selected_colors').val(event.currentTarget.value);
        }
      } else if (!event.currentTarget.checked) {
        if ($('#selected_colors').length > 0 && $('#selected_colors').val().length > 0) {
          var selected_colors = '';
          var parse = $('#selected_colors').val().split(',');

          if (parse.length > 0) {
            for (var i = 0; i < parse.length; i++) {
              if (event.currentTarget.value != parse[i]) {
                selected_colors += parse[i] + ',';
              }
            }
          }

          if (selected_colors && selected_colors != '') {
            $('#selected_colors').val(selected_colors.replace(/,\s*$/, ""));
          } else {
            $('#selected_colors').remove();
          }
        }
      }
    });
  }

  if ($('.chk-size-filter').length > 0) {
    $('.chk-size-filter').on('ifChanged', function (event) {
      if (event.currentTarget.checked) {
        if ($('#selected_sizes').length > 0 && $('#selected_sizes').val().length > 0) {
          $('#selected_sizes').val($('#selected_sizes').val() + ',' + event.currentTarget.value);
        } else {
          $('.filter-panel .size-filter').append('<input name="selected_sizes" id="selected_sizes" type="hidden">');
          $('#selected_sizes').val(event.currentTarget.value);
        }
      } else if (!event.currentTarget.checked) {
        if ($('#selected_sizes').length > 0 && $('#selected_sizes').val().length > 0) {
          var selected_sizes = '';
          var parse = $('#selected_sizes').val().split(',');

          if (parse.length > 0) {
            for (var i = 0; i < parse.length; i++) {
              if (event.currentTarget.value != parse[i]) {
                selected_sizes += parse[i] + ',';
              }
            }
          }

          if (selected_sizes && selected_sizes != '') {
            $('#selected_sizes').val(selected_sizes.replace(/,\s*$/, ""));
          } else {
            $('#selected_sizes').remove();
          }
        }
      }
    });
  } //if($('.mini-cart-content').length>0){
  //shopist_frontend.ajaxCall.getMiniCartContent();
  //}


  if ($('#different_shipping_address').length > 0) {
    $('#different_shipping_address').on('ifChecked', function (event) {
      $('.different-shipping-address').show();
    });
    $('#different_shipping_address').on('ifUnchecked', function (event) {
      $('.different-shipping-address').hide();
    });
  } //slick start


  if ($('.upsell-products').length > 0) {
    $('.upsell-products').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.crosssell-products').length > 0) {
    $('.crosssell-products').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.vendor-top-collection').length > 0) {
    $('.vendor-top-collection').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: false,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.latest-items').length > 0) {
    $('.latest-items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.best-sales-items').length > 0) {
    $('.best-sales-items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.featured-items').length > 0) {
    $('.featured-items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.recommended-items').length > 0) {
    $('.recommended-items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if ($('.vendor-special-products-menu').length > 0) {
    $('#vendor_home_content ul.vendor-special-products-menu li a').on('click', function () {
      $(this).parents('.vendor-special-products-menu').find('.active').removeClass('active');
      $(this).addClass('active');
    });
  }
});
var shopist_frontend = shopist_frontend || {};
shopist_frontend.init = {
  pageLoad: function pageLoad() {
    $('.category-products .collapse').on('shown.bs.collapse', function () {
      $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
    }).on('hidden.bs.collapse', function () {
      $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
    });
    shopist_frontend.event.filterProducts();

    if (jQuery('#productVideoDisplay iframe').length > 0) {
      jQuery('#productVideoDisplay iframe').removeAttr('width');
      jQuery('#productVideoDisplay iframe').removeAttr('height');
      $('#productVideoDisplay').on('hidden.bs.modal', function () {
        var video = $("#productVideoDisplay iframe").attr("src");
        $("#productVideoDisplay iframe").attr("src", "");
        $("#productVideoDisplay iframe").attr("src", video);
      });
    }

    if (jQuery('#productVideoDisplay video').length > 0) {
      $('#productVideoDisplay').on('hidden.bs.modal', function () {
        var mediaElement = document.getElementById("product_video");
        mediaElement.pause();
        mediaElement.currentTime = 0;
      });
    }

    if ($('#shipping_method_dropdown').length > 0) {
      $("#shipping_method_dropdown").select2();
      shopist_frontend.event.shipping_method_dropdown_option();
    }

    if ($('#product-category').length > 0) {
      $(".sort-by-filter").select2();
      $('.sort-by-filter').select2().on('change', function () {
        window.location.href = commonReplaceUrlParam(window.location.href, "sort_by", $(this).val());
      });
    }

    if ($('#cart_page .cart-total-content input[type="radio"]').length > 0 || $('#checkout_page .cart-total-content input[type="radio"]').length > 0) {
      shopist_frontend.event.shipping_method_radio_option();
    } //    if($('#bill_select_country').length>0)
    //    {
    //      $("#bill_select_country").select2();
    //    }


    if ($('.view-customize-images').length > 0) {
      $('.view-customize-images').on('click', function (e) {
        e.preventDefault();
        var images = $(this).data('images');
        var html = '';

        if (images.length > 0) {
          for (var count = 0; count < images.length; count++) {
            html += '<img src= "' + $('#hf_base_url').val() + '/uploads/' + images[count] + '">';
          }
        }

        $('#customizeImages .modal-body').html(html);
        $('#customizeImages').modal('show');
      });
    }

    $('#customizeImages').on('hidden.bs.modal', function () {
      $('#customizeImages .modal-body').html('');
    });

    if ($('.payment-options').length > 0) {
      $('.payment-options input[type="radio"]').on('ifClicked', function (event) {
        if (this.value === 'paypal') {
          $('.place-order').text(frontendLocalizationString.proceed_to_payPal);
          $('#bacsPopover, #codPopover, #stripePopover, #twocheckoutPopover').hide();
          $('#paypalPopover').show();
        } else if (this.value === 'bacs') {
          $('.place-order').text(frontendLocalizationString.place_order);
          $('#paypalPopover, #codPopover, #stripePopover, #twocheckoutPopover').hide();
          $('#bacsPopover').show();
        } else if (this.value === 'cod') {
          $('.place-order').text(frontendLocalizationString.place_order);
          $('#paypalPopover, #bacsPopover, #stripePopover, #twocheckoutPopover').hide();
          $('#codPopover').show();
        } else if (this.value === 'stripe') {
          $('.place-order').text(frontendLocalizationString.proceed_to_stripe);
          $('#paypalPopover, #bacsPopover, #codPopover, #twocheckoutPopover').hide();
          $('#stripePopover').show();
        } else if (this.value === '2checkout') {
          $('.place-order').text(frontendLocalizationString.proceed_to_2checkout);
          $('#paypalPopover, #bacsPopover, #codPopover, #stripePopover').hide();
          $('#twocheckoutPopover').show();
        }

        $('#selected_payment_method').val(this.value);
      });
    }

    if ($('.frontend-user-logout').length > 0) {
      $('.frontend-user-logout').on('click', function (e) {
        e.preventDefault();
        $.ajax({
          url: $('#hf_base_url').val() + '/ajax/frontend-user-logout',
          type: 'POST',
          cache: false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function success(data) {
            if (data) {
              window.location.href = decodeURIComponent(data);
            }
          },
          error: function error() {}
        });
      });
    }

    if ($('.product-wishlist').length > 0) {
      shopist_frontend.event.user_wishlist_process();
    }

    if ($('.product-compare').length > 0) {
      shopist_frontend.event.product_comparison();
    }

    if ($('.language-list').length > 0) {
      shopist_frontend.event.multi_lang_process();
    }

    if ($('.change-multi-currency').length > 0) {
      shopist_frontend.event.multi_currency_process();
    }

    shopist_frontend.event.manageRequestProducts();
    shopist_frontend.event.remove_user_coupon();
  }
};
shopist_frontend.event = {
  filterProducts: function filterProducts() {
    if ($('#filterProductsByName').length > 0) {
      $('#filterProductsByName').click(function () {
        shopist_frontend.ajaxCall.filterProductsByName($('#hf_base_url').val() + '/ajax/filter_products');
      });
    }
  },
  ajaxLink: function ajaxLink() {
    $('.features-all-images .pagination a').click(function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.filterProductsByName($(this).attr('href'));
    });
  },
  shipping_method_dropdown_option: function shipping_method_dropdown_option() {
    $('#cart_page #shipping_method_dropdown, #checkout_page #shipping_method_dropdown').select2().on('change', function () {
      shopist_frontend.ajaxCall.setCartTotalByShippingMethodValue($(this).val());
    });
  },
  shipping_method_radio_option: function shipping_method_radio_option() {
    $('#cart_page .cart-total-content input[type="radio"], #checkout_page .cart-total-content input[type="radio"]').on('ifClicked', function (event) {
      shopist_frontend.ajaxCall.setCartTotalByShippingMethodValue(this.value);
    });
  },
  manageRequestProducts: function manageRequestProducts() {
    if ($('#request_product_data_submit').length > 0) {
      $('#request_product_data_submit').on('click', function () {
        var errorStr = '';

        if ($('#request_product_name').val().length == 0 || $('#request_product_name').val() == "") {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_name + '</p>';
        }

        if ($('#request_product_email').val().length == 0 || $('#request_product_email').val() == "") {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_email + '</p>';
        }

        if ($('#request_product_phone_number').val().length == 0 || $('#request_product_phone_number').val() == "") {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_phone_number + '</p>';
        }

        if ($('#request_product_description').val().length == 0 || $('#request_product_description').val() == "") {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_desc + '</p>';
        }

        if ($('#request_product_email').val().length > 0 && !isValidEmail($('#request_product_email').val())) {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_valid_email + '</p>';
        }

        if ($('#request_product_phone_number').val().length > 0 && !validatePhone($('#request_product_phone_number').val())) {
          errorStr += '<p class="error">' + frontendLocalizationString.enter_valid_phone_number + '</p>';
        }

        if (errorStr && errorStr != '') {
          $('.request-field-message').remove();
          var validationStr = '<div class="request-field-message">' + errorStr + '</div>';
          $('.request-content-main').before(validationStr);
          return false;
        }

        if (errorStr == '') {
          $('.request-field-message').remove();
          shopist_frontend.ajaxCall.sendProductsRequestData($(this).data('id'), $('#request_product_name').val(), $('#request_product_email').val(), $('#request_product_phone_number').val(), $('#request_product_description').val());
        }
      });
    }
  },
  user_wishlist_process: function user_wishlist_process() {
    $('.product-wishlist').on('click', function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.setUserWishlistDetails($(this).data('id'));
    });
  },
  product_comparison: function product_comparison() {
    $('.product-compare').on('click', function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.setProductCompareData($(this).data('id'));
    });
  },
  multi_lang_process: function multi_lang_process() {
    $('.language-list .dropdown-content a').on('click', function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.setMultiLangAndChangeView($(this).data('lang_name'));
    });
  },
  multi_currency_process: function multi_currency_process() {
    $('.change-multi-currency .dropdown-content a').on('click', function (e) {
      e.preventDefault();
      shopist_frontend.ajaxCall.setMultiCurrencyAndChangeView($(this).data('currency_name'));
    });
  },
  remove_user_coupon: function remove_user_coupon() {
    if ($('.remove-coupon').length > 0) {
      $('.remove-coupon').on('click', function (e) {
        e.preventDefault();
        shopist_frontend.ajaxCall.removeCoupon();
      });
    }
  }
};
shopist_frontend.ajaxCall = {
  filterProductsByName: function filterProductsByName(url) {
    $('.ajax-overlay').show();
    $.ajax({
      url: url,
      type: 'POST',
      cache: false,
      datatype: 'html',
      data: {
        data: $('#filter_products_title').val()
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.success == true) {
          $('.features-all-images').html(data.html);
          shopist_frontend.event.ajaxLink();
        }

        $('.ajax-overlay').hide();
      },
      error: function error() {}
    });
  },
  setCartTotalByShippingMethodValue: function setCartTotalByShippingMethodValue(val) {
    $('.cart-total-area-overlay').show();
    $('#loader-1-cart').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/cart-total-update-by-shipping-method',
      type: 'POST',
      cache: false,
      datatype: 'html',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        data: val
      },
      success: function success(data) {
        if (data) {
          if ($('#cart_page').length > 0 || $('#checkout_page').length > 0) {
            $('.cart-grand-total .value').html(data);
            $('#loader-1-cart').hide();
            $('.cart-total-area-overlay').hide();
          }
        }
      },
      error: function error() {}
    });
  },
  sendProductsRequestData: function sendProductsRequestData(product_id, product_name, email, phone_number, description) {
    $('#request_product_modal').append('<div class="shadow-layer-on-popup"></div>');
    $('#loader-1').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/requested_product_data',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        product_id: product_id,
        product_name: encodeURIComponent(product_name),
        email: encodeURIComponent(email),
        phone_number: encodeURIComponent(phone_number),
        description: encodeURIComponent(description)
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'saved') {
          $('#request_product_name').val('');
          $('#request_product_email').val('');
          $('#request_product_phone_number').val('');
          $('#request_product_description').val('');
          $('#loader-1').hide();
          $('#request_product_modal').find('.shadow-layer-on-popup').remove();
          $('.request-field-message').remove();
          $('.request-content-main').before('<div class="request-field-message"><p class="success">' + frontendLocalizationString.request_saved_msg + '</p></div>');
        }
      },
      error: function error() {}
    });
  },
  sendSubscriptionData: function sendSubscriptionData(obj, name, email, type) {
    $(obj).addClass('subscribtion-loading');
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/subscription_data',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        name: encodeURIComponent(name),
        email: encodeURIComponent(email),
        type: type
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        $(obj).removeClass('subscribtion-loading');

        if ($('#subscriptions_modal .subscribe-content').parents('.modal__content').find('.modal-content-msg').length > 0) {
          $('#subscriptions_modal .subscribe-content').parents('.modal__content').find('.modal-content-msg').remove();
        }

        if ($('#subscribe_options_email').length > 0 && $('#subscribe_options_email').val().length > 0) {
          $('#subscribe_options_email').val('');
        }

        if ($('#subscribe_options_name').length > 0 && $('#subscribe_options_name').val().length > 0) {
          $('#subscribe_options_name').val('');
        }

        if (data.status == 'saved') {
          $('#subscriptions_modal .subscribe-content').before('<p class="modal-content-msg">' + frontendLocalizationString.subscribe_success_msg + '</p>');
        } else if (data.status == 'error') {
          $('#subscriptions_modal .subscribe-content').before('<p class="modal-content-msg">' + frontendLocalizationString.subscribe_error_msg + '</p>');
        }
      },
      error: function error() {}
    });
  },
  applyCoupon: function applyCoupon(val) {
    // var msgStr = '<div class="alert alert-danger" style="margin-left:-15px; margin-right:15px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg-coupon"></p></div>';
    var msgStr = '<div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><i class="icon-award"></i>' + frontendLocalizationString.error_message_text + '</div>';
    $('.cart-total-area-overlay').show();
    $('#loader-1-cart').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/applyCoupon',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        _couponCode: val
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if ($('#cart_page, #checkout_page').find('.error-msg-coupon').length > 0) {
          $('#cart_page, #checkout_page').find('.error-msg-coupon').parents('.alert-danger').remove();
        }

        if (data.error == true && data.error_type == 'no_coupon_data') {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_not_exists_msg);
        } else if (data.error == true && data.error_type == 'less_from_min_amount' && data.min_amount) {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_min_spend_msg + ' ' + data.min_amount);
        } else if (data.error == true && data.error_type == 'exceed_from_max_amount' && data.max_amount) {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_max_spend_msg + ' ' + data.max_amount);
        } else if (data.error == true && data.error_type == 'no_login') {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_no_login_msg);
        } else if (data.error == true && data.error_type == 'user_role_not_match' && data.role_name) {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(data.role_name + ' ' + frontendLocalizationString.coupon_no_login_msg);
        } else if (data.error == true && data.error_type == 'coupon_expired') {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_expired_msg);
        } else if (data.error == true && data.error_type == 'coupon_already_apply') {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_already_sxist_label);
        } else if (data.success == true && (data.success_type == 'discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'percentage_discount_from_product' || data.success_type == 'discount_from_total_cart' || data.success_type == 'percentage_discount_from_total_cart')) {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.coupon_added_msg);
          $('#cart_page .cart-grand-total, #checkout_page .cart-grand-total').before('<div class="cart-coupon"><div class="label">' + frontendLocalizationString.coupon_label + '</div><div class="value"> - ' + data.discount_price + '</div><div><button class="remove-coupon btn btn-default btn-xs" type="button">' + frontendLocalizationString.remove_coupon_label + '</button></div></div>');
          $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);
          shopist_frontend.event.remove_user_coupon();
        } else if (data.error == true && data.error_type == 'exceed_from_cart_total') {
          $('#cart_page .cart-data, #checkout_page .cart-data').prepend(msgStr);
          $('#cart_page .cart-data, #checkout_page .cart-data').find('.error-msg-coupon').html(frontendLocalizationString.exceed_from_cart_total_msg);
        }

        $('.cart-total-area-overlay').hide();
        $('#loader-1-cart').hide();
      },
      error: function error() {}
    });
  },
  removeCoupon: function removeCoupon() {
    $('.cart-total-area-overlay').show();
    $('#loader-1-cart').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/removeCoupon',
      type: 'POST',
      cache: false,
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.success == true) {
          if ($('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').length > 0) {
            $('#cart_page, #checkout_page').find('.cart-data .error-msg-coupon').parents('li').remove();
          }

          $('#cart_page .cart-total-content .cart-coupon, #checkout_page .cart-total-content .cart-coupon').remove();
          $('#cart_page .cart-total-content .cart-grand-total .value, #checkout_page .cart-total-content .cart-grand-total .value').html(data.grand_total);
          $('.cart-total-area-overlay').hide();
          $('#loader-1-cart').hide();
        }
      },
      error: function error() {}
    });
  },
  setUserWishlistDetails: function setUserWishlistDetails(data) {
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/user-wishlist-data-process',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        data: data
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'success' && data.notice_type == 'user_wishlist_saved') {
          swal({
            title: '',
            text: frontendLocalizationString.wishlist_data_saved_msg,
            showCancelButton: true,
            cancelButtonText: frontendLocalizationString.continue_label,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: frontendLocalizationString.wishlist_items_label,
            closeOnConfirm: false,
            imageUrl: $('#hf_base_url').val() + '/images/thumbs-up.jpg'
          }, function () {
            location.href = $('#hf_base_url').val() + '/user/account/my-saved-items';
          });
        } else if (data.status == 'error' && data.notice_type == 'user_login_required') {
          swal({
            title: '',
            text: frontendLocalizationString.login_for_wishlist_msg,
            type: 'warning'
          });
        } else if (data.status == 'error' && data.notice_type == 'item_already_exists') {
          swal({
            title: '',
            text: frontendLocalizationString.already_item_in_wishlist_msg,
            showCancelButton: true,
            cancelButtonText: frontendLocalizationString.continue_label,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: frontendLocalizationString.wishlist_items_label,
            closeOnConfirm: false,
            type: 'warning'
          }, function () {
            location.href = $('#hf_base_url').val() + '/user/account/my-saved-items';
          });
        }
      },
      error: function error() {}
    });
  },
  setProductCompareData: function setProductCompareData(id) {
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/product-compare-data-process',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        id: id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'success' && data.notice_type == 'compare_data_saved') {
          swal({
            title: '',
            text: frontendLocalizationString.compare_data_saved_msg,
            showCancelButton: true,
            cancelButtonText: frontendLocalizationString.continue_label,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: frontendLocalizationString.compare_items_label,
            closeOnConfirm: false,
            imageUrl: $('#hf_base_url').val() + '/images/thumbs-up.jpg'
          }, function () {
            location.href = $('#hf_base_url').val() + '/san-pham/so-sanh-san-pham';
          });
        } else if (data.status == 'error' && data.notice_type == 'already_saved') {
          swal({
            title: '',
            text: frontendLocalizationString.compare_data_exists_msg,
            showCancelButton: true,
            cancelButtonText: frontendLocalizationString.continue_label,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: frontendLocalizationString.compare_items_label,
            closeOnConfirm: false,
            type: 'warning'
          }, function () {
            location.href = $('#hf_base_url').val() + '/san-pham/so-sanh-san-pham';
          });
        } else if (data.status == 'error' && data.notice_type == 'compare_data_exceed_limit') {
          swal({
            title: '',
            text: frontendLocalizationString.compare_data_exceed_msg,
            type: 'warning'
          });
        }

        if ($('#header_content').length > 0) {
          $('#header_content').find('.compare-value').html('(' + data.item_count + ')');
        }
      },
      error: function error() {}
    });
  },
  wishlistItemDelete: function wishlistItemDelete(data) {
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/delete-item-from-wishlist',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        data: data
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'success' && data.notice_type == 'deleted_item') {
          window.location.href = window.location.href;
        }
      },
      error: function error() {}
    });
  },
  setMultiLangAndChangeView: function setMultiLangAndChangeView(data) {
    $('#shadow-layer, #loader-1').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/multi-lang-processing',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        data: data
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'success') {
          window.location.href = window.location.href;
        }
      },
      error: function error() {}
    });
  },
  setMultiCurrencyAndChangeView: function setMultiCurrencyAndChangeView(data) {
    $('#shadow-layer, #loader-1').show();
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/multi-currency-processing',
      type: 'POST',
      cache: false,
      dataType: 'json',
      data: {
        data: data
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status == 'success') {
          window.location.href = window.location.href;
        }
      },
      error: function error() {}
    });
  },
  getMiniCartContent: function getMiniCartContent() {
    $.ajax({
      url: $('#hf_base_url').val() + '/ajax/get-mini-cart-data',
      type: 'POST',
      cache: false,
      datatype: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(data) {
        if (data.status && data.status == 'success' && data.type == 'mini_cart_data' && data.html) {
          $('.mini-cart-content').html(data.html);

          if ($('.show-mini-cart').length > 0) {
            $('.show-mini-cart').off('click').on('click', function (e) {
              e.preventDefault();
              e.stopPropagation();
              $('#list_popover').fadeToggle();
              return false;
            });
          }
        }
      },
      error: function error() {}
    });
  }
};

function isValidEmail(emailText) {
  return /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(emailText) && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(emailText);
}

;

function validatePhone(txtPhone) {
  var a = txtPhone;
  var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

  if (filter.test(a)) {
    return true;
  } else {
    return false;
  }
}

function product_review_tab_control_with_hashtag() {
  $('#product_single_page').find('.product-description-bottom-tab ul.nav-tabs li.active').removeClass('active');
  $('#product_single_page').find('.product-description-bottom-tab ul.nav-tabs li:last-child').addClass('active');
  $('#product_single_page').find('.product-description-bottom-tab .tab-content .active').removeClass('active');
  $('#product_single_page').find('.product-description-bottom-tab .tab-content .in').removeClass('in');
  $('#product_single_page').find('.product-description-bottom-tab .tab-content #reviews').addClass('active in');
} // Change progress bar action


function setProgress(currstep) {
  var percent = parseFloat(100 / widget.length) * currstep;
  percent = percent.toFixed();
  $(".progress-bar").css("width", percent + "%").html(percent + "%");
} // Hide buttons according to the current step


function hideButtons(current) {
  var limit = parseInt(widget.length);
  var visible_step = $('#checkout_page .checkout-content .step:visible');
  $(".action").hide();
  if (current <= limit && visible_step.attr('id') != 'order_notes') btnnext.show();

  if (current == limit && visible_step.attr('id') == 'order_notes') {
    btnnext.hide();
    btnsubmit.show();
  }
}

function checkoutStepValidation() {
  var returnVal = true;
  var visible_step = $('#checkout_page .checkout-content .step:visible');
  var msgStr = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg"></p></div>';
  var emailMsg = '';
  removeERRORMessageFromChekoutStep();

  if (visible_step.attr('id') && visible_step.attr('id') == 'user_mode') {
    if ($('#selected_user_mode').val().length == 0) {
      $('#' + visible_step.attr('id')).find('.checkout-process-user-mode').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.user_mode_select_msg);
      returnVal = false;
    }
  } else if (visible_step.attr('id') && visible_step.attr('id') == 'guest_user_address') {
    var errorStr = [];
    var isChecked = $("#different_shipping_address").prop("checked");

    if ($('#account_bill_first_name').length > 0 && $('#account_bill_first_name').val().length == 0 && $('#account_bill_first_name').val() == '') {
      errorStr.push('no_account_bill_first_name');
    }

    if (isChecked && $('#account_shipping_first_name').length > 0 && $('#account_shipping_first_name').val().length == 0 && $('#account_shipping_first_name').val() == '') {
      errorStr.push('no_account_shipping_first_name');
    }

    if ($('#account_bill_last_name').length > 0 && $('#account_bill_last_name').val().length == 0 && $('#account_bill_last_name').val() == '') {
      errorStr.push('no_account_bill_last_name');
    }

    if (isChecked && $('#account_shipping_last_name').length > 0 && $('#account_shipping_last_name').val().length == 0 && $('#account_shipping_last_name').val() == '') {
      errorStr.push('no_account_shipping_last_name');
    }

    if ($('#account_bill_email_address').length > 0 && $('#account_bill_email_address').val().length == 0 && $('#account_bill_email_address').val() == '') {
      errorStr.push('no_account_bill_email_address');
    }

    if (isChecked && $('#account_shipping_email_address').length > 0 && $('#account_shipping_email_address').val().length == 0 && $('#account_shipping_email_address').val() == '') {
      errorStr.push('no_account_shipping_email_address');
    }

    if ($('#account_bill_phone_number').length > 0 && $('#account_bill_phone_number').val().length == 0 && $('#account_bill_phone_number').val() == '') {
      errorStr.push('no_account_bill_phone_number');
    }

    if (isChecked && $('#account_shipping_phone_number').length > 0 && $('#account_shipping_phone_number').val().length == 0 && $('#account_shipping_phone_number').val() == '') {
      errorStr.push('no_account_shipping_phone_number');
    }

    var get_bill_country_name = '';
    var get_shipping_country_name = '';

    if ($('#account_bill_select_country').length > 0) {
      get_bill_country_name = $('#account_bill_select_country :selected').val();
    }

    if (isChecked && $('#account_shipping_select_country').length > 0) {
      get_shipping_country_name = $('#account_shipping_select_country :selected').val();
    }

    if (get_bill_country_name == '') {
      errorStr.push('no_account_bill_select_country');
    }

    if (isChecked && get_shipping_country_name == '') {
      errorStr.push('no_get_shipping_country_name');
    }

    if ($('#account_bill_adddress_line_1').length > 0 && $('#account_bill_adddress_line_1').val().length == 0 && $('#account_bill_adddress_line_1').val() == '') {
      errorStr.push('no_account_bill_adddress_line_1');
    }

    if (isChecked && $('#account_shipping_adddress_line_1').length > 0 && $('#account_shipping_adddress_line_1').val().length == 0 && $('#account_shipping_adddress_line_1').val() == '') {
      errorStr.push('no_account_shipping_adddress_line_1');
    }

    if ($('#account_bill_town_or_city').length > 0 && $('#account_bill_town_or_city').val().length == 0 && $('#account_bill_town_or_city').val() == '') {
      errorStr.push('no_account_bill_town_or_city');
    }

    if (isChecked && $('#account_shipping_town_or_city').length > 0 && $('#account_shipping_town_or_city').val().length == 0 && $('#account_shipping_town_or_city').val() == '') {
      errorStr.push('no_account_shipping_town_or_city');
    }

    if ($('#account_bill_zip_or_postal_code').length > 0 && $('#account_bill_zip_or_postal_code').val().length == 0 && $('#account_bill_zip_or_postal_code').val() == '') {
      errorStr.push('no_account_bill_zip_or_postal_code');
    }

    if (isChecked && $('#account_shipping_zip_or_postal_code').length > 0 && $('#account_shipping_zip_or_postal_code').val().length == 0 && $('#account_shipping_zip_or_postal_code').val() == '') {
      errorStr.push('no_account_shipping_zip_or_postal_code');
    }

    if ($('#account_bill_email_address').val().length > 0 && !isValidEmail($('#account_bill_email_address').val())) {
      emailMsg += '<p>' + frontendLocalizationString.billing_email_not_valid_msg + '</p>';
    }

    if (isChecked && $('#account_shipping_email_address').val().length > 0 && !isValidEmail($('#account_shipping_email_address').val())) {
      emailMsg += '<p>' + frontendLocalizationString.shipping_email_not_valid_msg + '</p>';
    }

    if (errorStr.length > 0) {
      $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
      returnVal = false;
    }

    if (emailMsg && emailMsg != '') {
      $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(emailMsg);
      returnVal = false;
    }
  } else if (visible_step.attr('id') && visible_step.attr('id') == 'payment') {
    if ($('#selected_payment_method').val().length == 0) {
      $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.select_payment_method_msg);
      returnVal = false;
    } else if ($('#selected_payment_method').val().length > 0 && $('#selected_payment_method').val() == 'stripe') {
      var errorStr = [];

      if ($('#email_address').val().length == 0) {
        errorStr.push('email_address');
      } else if ($('#card_number').val().length == 0) {
        errorStr.push('card_number');
      } else if ($('#card_cvc').val().length == 0) {
        errorStr.push('card_cvc');
      } else if ($('#card_expiry_month').val().length == 0) {
        errorStr.push('card_expiry_month');
      } else if ($('#card_expiry_year').val().length == 0) {
        errorStr.push('card_expiry_year');
      }

      if (errorStr.length > 0) {
        $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
        $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
        returnVal = false;
      }

      if (errorStr.length == 0) {
        var parseStripeApiData = JSON.parse($('#stripe_api_key').val());

        if (parseStripeApiData.secret_key && parseStripeApiData.secret_key != null && parseStripeApiData.secret_key != '' && parseStripeApiData.publishable_key && parseStripeApiData.publishable_key != null && parseStripeApiData.publishable_key != '') {
          Stripe.setPublishableKey(parseStripeApiData.publishable_key);
          Stripe.createToken({
            number: $('#card_number').val(),
            cvc: $('#card_cvc').val(),
            exp_month: $('#card_expiry_month').val(),
            exp_year: $('#card_expiry_year').val()
          }, stripeResponseHandler);
          $('#checkout_page .action').addClass('loading');
          returnVal = false;
        } else {
          $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
          $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.stripe_api_empty_msg);
          returnVal = false;
        }
      }
    } else if ($('#selected_payment_method').val().length > 0 && $('#selected_payment_method').val() == '2checkout') {
      var errorStr = [];

      if ($('#2checkout_card_number').val().length == 0) {
        errorStr.push('card_number');
      } else if ($('#2checkout_card_cvc').val().length == 0) {
        errorStr.push('card_cvc');
      } else if ($('#2checkout_card_expiry_month').val().length == 0) {
        errorStr.push('card_expiry_month');
      } else if ($('#2checkout_card_expiry_year').val().length == 0) {
        errorStr.push('card_expiry_year');
      }

      if (errorStr.length > 0) {
        $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
        $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
        returnVal = false;
      }

      if (errorStr.length == 0) {
        var parseTwoCheckoutApiData = JSON.parse($('#2checkout_api_data').val());

        if (parseTwoCheckoutApiData.sellerId && parseTwoCheckoutApiData.sellerId != null && parseTwoCheckoutApiData.sellerId != '' && parseTwoCheckoutApiData.publishableKey && parseTwoCheckoutApiData.publishableKey != null && parseTwoCheckoutApiData.publishableKey != '') {
          var env = 'production';

          if (parseTwoCheckoutApiData.sandbox_enable_option && parseTwoCheckoutApiData.sandbox_enable_option == 'yes') {
            env = 'sandbox';
          }

          TCO.loadPubKey(env);
          var args = {
            sellerId: parseTwoCheckoutApiData.sellerId,
            publishableKey: parseTwoCheckoutApiData.publishableKey,
            ccNo: $("#2checkout_card_number").val(),
            cvv: $("#2checkout_card_cvc").val(),
            expMonth: $("#2checkout_card_expiry_month").val(),
            expYear: $("#2checkout_card_expiry_year").val()
          };
          TCO.requestToken(twoCheckoutSuccessCallback, twoCheckoutErrorCallback, args);
          $('#checkout_page .action').addClass('loading');
          returnVal = false;
        } else {
          $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
          $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.twocheckout_api_empty_msg);
          returnVal = false;
        }
      }
    }
  } else if (visible_step.attr('id') && visible_step.attr('id') == 'authentication') {
    if ($('#is_user_login').val() == false) {
      $('#' + visible_step.attr('id')).find('.user-login-content').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.signup_signin_checkout_msg);
      returnVal = false;
    }
  } else if (visible_step.attr('id') && visible_step.attr('id') == 'login_user_address') {
    if ($('#is_login_user_address_exists').length == 0 && $('#is_login_user_address_exists').val() != 'address_added') {
      $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
      $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.billing_shipping_error_msg);
      returnVal = false;
    }
  }

  return returnVal;
}

function removeERRORMessageFromChekoutStep() {
  if ($('#checkout_page .checkout-content').find('.error-msg').length > 0) {
    $('#checkout_page .checkout-content').find('.error-msg').parent('.alert-danger').remove();
  }
} // Numeric only control handler


jQuery.fn.ForceNumericOnly = function () {
  return this.each(function () {
    $(this).keydown(function (e) {
      var key = e.charCode || e.keyCode || 0; // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
      // home, end, period, and numpad decimal

      return key == 8 || key == 9 || key == 13 || key == 46 || key == 110 || key == 190 || key >= 35 && key <= 40 || key >= 48 && key <= 57 || key >= 96 && key <= 105;
    });
  });
};

function stripeResponseHandler(status, response) {
  $('#checkout_page .action').removeClass('loading');

  if (response.error) {
    var msgStr = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg">' + response.error.message + '</p></div>';
    $('.checkout-content .payment-options').before(msgStr);
  } else {
    var token = response['id'];
    $('form').append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    $('#checkout_page .checkout-content').find('#payment').hide();
    $('#checkout_page .checkout-content').find('.action').hide();
    $('#checkout_page .checkout-content').find('#order_notes').show();
    $('#checkout_page .checkout-content').find('.place-order').show();
  }
}

function twoCheckoutSuccessCallback(data) {
  $('#checkout_page .action').removeClass('loading');
  var token = data.response.token.token;
  $('form').append("<input type='hidden' name='twoCheckoutToken' value='" + token + "'/>");
  $('#checkout_page .checkout-content').find('#payment').hide();
  $('#checkout_page .checkout-content').find('.action').hide();
  $('#checkout_page .checkout-content').find('#order_notes').show();
  $('#checkout_page .checkout-content').find('.place-order').show();
}

;

function twoCheckoutErrorCallback(data) {
  $('#checkout_page .action').removeClass('loading');

  if (data.errorMsg) {
    var msgStr = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="message-header"><i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>' + frontendLocalizationString.error_message_text + '</strong></div><p class="error-msg">' + data.errorMsg + '</p></div>';
    $('.checkout-content .payment-options').before(msgStr);
  }
}

function commonReplaceUrlParam(url, paramName, paramValue) {
  if (paramValue == null) paramValue = '';
  var pattern = new RegExp('\\b(' + paramName + '=).*?(&|$)');

  if (url.search(pattern) >= 0) {
    return url.replace(pattern, '$1' + paramValue + '$2');
  }

  return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue;
}

/***/ }),

/***/ "./resources/assets/js/dungdang.js":
/*!*****************************************!*\
  !*** ./resources/assets/js/dungdang.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {



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

__webpack_require__(/*! /Users/quocdungdang/Project/s4ntmdt/resources/assets/js/app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /Users/quocdungdang/Project/s4ntmdt/resources/assets/sass/styles.scss */"./resources/assets/sass/styles.scss");


/***/ })

/******/ });