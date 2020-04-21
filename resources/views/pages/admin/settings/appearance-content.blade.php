@extends('layouts.admin.master')
@section('title', trans('admin.appearance_page_title') .' | '. get_site_title())

@section('content')
<h4>{{ trans('admin.appearance_settings_content_top_msg') }}</h4><hr>

<div class="row">
  <div class="col-12">
    <div id="appearance_menu_list_content">
      <div id="appearance_menu_list_content_for_settings" class="list-content">
        <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
          <div class="clearfix">
            <div class="pull-right clearfix"><button class="btn btn-primary" type="submit">{{ trans('admin.save_settings_label') }}</button></div>
          </div>
          <br>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('admin.appearance_general_elements_text') }}</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="row">  
                  <label class="col-sm-4 control-label" for="inputMinPrice">{{ trans('admin.appearance_general_settings_min_price') }}</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="min_filter_price" name="min_filter_price" value="{{ get_appearance_settings()['general']['filter_price_min'] }}"/>
                  </div>
                </div>  
              </div>

              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputMaxPrice">{{ trans('admin.appearance_general_settings_max_price') }}</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="max_filter_price" name="max_filter_price" value="{{ get_appearance_settings()['general']['filter_price_max'] }}"/>
                  </div>
                </div>  
              </div>
              
              <!-- <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderCustomCSS">{{ trans('admin.custom_css_use') }}</label>
                  <div class="col-sm-8">
                    @if(count(get_appearance_settings()) && get_appearance_settings()['general']['custom_css'] == true)
                    <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputGeneralCustomCSS" id="inputGeneralCustomCSS">
                    @else
                    <input type="checkbox" class="shopist-iCheck" name="inputGeneralCustomCSS" id="inputGeneralCustomCSS">
                    @endif
                  </div>
                </div>  
              </div> -->
              
              <?php 
                $style_general = 'style=display:none;';
                if(count(get_appearance_settings()) && get_appearance_settings()['general']['custom_css'] == true){
                  $style_general = 'style=display:block;';
                }
              ?>
              
              <div class="general-custom-css-panel" {{ $style_general }}>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputBodyBGColor">{{ trans('admin.appearance_general_settings_body_bg_label') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="general_settings_body_bg" name="general_settings_body_bg" value="{{ get_appearance_settings()['general']['body_bg_color'] }}"/>
                    </div>
                  </div>  
                </div>
                
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarBG">{{ trans('admin.appearance_general_settings_sidebar_bg_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="sidebar_panel_bg_color" name="sidebar_panel_bg_color" value="{{ get_appearance_settings()['general']['sidebar_panel_bg_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarTitleColor">{{ trans('admin.appearance_general_settings_sidebar_title_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="sidebar_panel_title_text_color" name="sidebar_panel_title_text_color" value="{{ get_appearance_settings()['general']['sidebar_panel_title_text_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarTitleBottomColor">{{ trans('admin.appearance_general_settings_sidebar_title_bottom_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="sidebar_panel_title_text_bottom_border" name="sidebar_panel_title_text_bottom_border" value="{{ get_appearance_settings()['general']['sidebar_panel_title_text_bottom_border_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarTitleFontSize">{{ trans('admin.appearance_general_settings_sidebar_title_font_size') }}</label>
                    <div class="col-sm-8">
                      <input id="change_sidebar_title_text_size" type="text" name="change_sidebar_title_text_size" data-name="sidebar_title_text_size" value="">
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarContentColor">{{ trans('admin.appearance_general_settings_sidebar_content_text_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="sidebar_panel_content_text_color" name="sidebar_panel_content_text_color" value="{{ get_appearance_settings()['general']['sidebar_panel_content_text_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSidebarContentFontSize">{{ trans('admin.appearance_general_settings_sidebar_content_text_size') }}</label>
                    <div class="col-sm-8">
                      <input id="change_sidebar_content_text_size" type="text" name="change_sidebar_content_text_size" data-name="sidebar_content_text_size" value="">
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxBGColor">{{ trans('admin.appearance_general_settings_product_box_bg_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="product_box_bg_color" name="product_box_bg_color" value="{{ get_appearance_settings()['general']['product_box_bg_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxBorderColor">{{ trans('admin.appearance_general_settings_product_box_border_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="product_box_border_color" name="product_box_border_color" value="{{ get_appearance_settings()['general']['product_box_border_color'] }}"/>
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxContentColor">{{ trans('admin.appearance_general_settings_product_box_content_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="product_box_content_color" name="product_box_content_color" value="{{ get_appearance_settings()['general']['product_box_text_color'] }}"/>
                    </div>
                  </div>  
                </div>  

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxContentFontSize">{{ trans('admin.appearance_general_settings_product_box_content_size') }}</label>
                    <div class="col-sm-8">
                      <input id="change_product_box_content_text_size" type="text" name="change_product_box_content_text_size" data-name="product_box_content_text_size" value="">
                    </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxBtnBGColor">{{ trans('admin.appearance_general_settings_product_box_btn_bg_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="product_box_btn_bg_color" name="product_box_btn_bg_color" value="{{ get_appearance_settings()['general']['product_box_btn_bg_color'] }}"/>
                    </div>
                  </div>  
                </div> 
                
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputBtnTextColor">{{ trans('admin.appearance_general_settings_btn_text_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="btn_text_color" name="btn_text_color" value="{{ get_appearance_settings()['general']['btn_text_color'] }}"/>
                    </div>
                  </div>  
                </div> 

                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputProductBoxBtnHoverColor">{{ trans('admin.appearance_general_settings_product_box_btn_hover_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="product_box_btn_hover_color" name="product_box_btn_hover_color" value="{{ get_appearance_settings()['general']['product_box_btn_hover_color'] }}"/>
                    </div>
                  </div>  
                </div>
                
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputBtnHoverTextColor">{{ trans('admin.appearance_general_settings_btn_hover_text_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="btn_hover_text_color" name="btn_hover_text_color" value="{{ get_appearance_settings()['general']['btn_hover_text_color'] }}"/>
                    </div>
                  </div>  
                </div> 
                
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputSelectedMenuBorderColor">{{ trans('admin.selected_menu_border_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="selected_menu_border_color" name="selected_menu_border_color" value="{{ get_appearance_settings()['general']['selected_menu_border_color'] }}"/>
                    </div>
                  </div>  
                </div> 
                
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputPagesContentTitleBorderColor">{{ trans('admin.content_title_border_color') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="pages_content_title_border_color" name="pages_content_title_border_color" value="{{ get_appearance_settings()['general']['pages_content_title_border_color'] }}"/>
                    </div>
                  </div>  
                </div> 
              </div>  
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('admin.appearance_header_elements_text') }}</h3>
            </div>          
            <div class="box-body">
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderSliderImage">{{ trans('admin.appearance_header_slider_image') }}</label>
                  <div class="col-sm-8">
                    <div class="clearfix">
                      <div data-toggle="modal" data-dropzone_id="eb_dropzone_slider_image_file_upload" data-target="#frontendImageUploader" class="icon product-header-slider-uploader pull-right">{{ trans('admin.appearance_header_slider_image_and_text_add_loader_text') }}</div>
                    </div>

                    <div class="uploaded-header-slider-images">
                      @if(count(get_appearance_header_settings_data()) > 0 )
                      <div class="sample-img" style="display:none;"><img class="upload-icon" src="{{ default_upload_sample_img_src() }}"></div>
                      <div class="uploaded-slider-images" style="display:block;">
                        @foreach(get_appearance_header_settings_data() as $slider_img)
                          <div class="header-slider-image-single-container {{ substr(basename($slider_img->img_url), 0, -4) }}"><img src="{{ get_image_url($slider_img->img_url) }}"><div data-id="{{ $slider_img->id }}" class="remove-frontend-img-link" style="display: none;"></div></div>
                        @endforeach
                      </div>
                      @else
                      <div class="sample-img"><img class="upload-icon" src="{{ default_upload_sample_img_src() }}"></div>
                      <div class="uploaded-slider-images"></div>
                      @endif
                    </div>
                  </div>
                </div>  
              </div>
<!--              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderSlogan">{{ trans('admin.header_slogan') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="header_slogan" name="header_slogan" value="{{ get_appearance_settings()['header_details']['header_slogan'] }}"/>
                    <span>[This feature will run only for compatible templares]</span>
                  </div>
                </div>  
              </div>-->
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderSliderVissibility">{{ trans('admin.slider_visibility') }}</label>
                  <div class="col-sm-8">
                    @if(count(get_appearance_settings()) && get_appearance_settings()['header_details']['slider_visibility'] == true)
                    <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputVisibilitySlider" id="inputVisibilitySlider">
                    @else
                    <input type="checkbox" class="shopist-iCheck" name="inputVisibilitySlider" id="inputVisibilitySlider">
                    @endif
                  </div>
                </div>  
              </div>
              <!-- <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderCustomCSS">{{ trans('admin.custom_css_use') }}<br><i style="font-size:12px;">{{ trans('admin.compitable_label') }}</i></label>
                  <div class="col-sm-8">
                    @if(count(get_appearance_settings()) && get_appearance_settings()['header_details']['custom_css'] == true)
                    <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputHeaderCustomCSS" id="inputHeaderCustomCSS">
                    @else
                    <input type="checkbox" class="shopist-iCheck" name="inputHeaderCustomCSS" id="inputHeaderCustomCSS">
                    @endif
                  </div>
                </div>  
              </div> -->
              <?php 
                 $style_header = 'style=display:none;';
              
              ?>

              <div class="header-custom-css" {{ $style_header }}>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderTopColor">{{ trans('admin.header_top_gradient_color') }}</label>
                    <div class="col-sm-8">
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="text" class="color form-control" id="header_top_bg_start_color" name="header_top_bg_start_color" value="{{ get_appearance_settings()['header_details']['header_top_gradient_start_color'] }}"/>&nbsp;( {!! trans('admin.gradient_start_color_label') !!} )
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="color form-control" id="header_top_bg_end_color" name="header_top_bg_end_color" value="{{ get_appearance_settings()['header_details']['header_top_gradient_end_color'] }}"/>&nbsp;( {!! trans('admin.gradient_end_color_label') !!} )
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
<!--                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderBottomColor">{{ trans('admin.header_bottom_gradient_color') }}</label>
                    <div class="col-sm-8">
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="text" class="color form-control" id="header_bottom_bg_start_color" name="header_bottom_bg_start_color" value="{{ get_appearance_settings()['header_details']['header_bottom_gradient_start_color'] }}"/>&nbsp;( {!! trans('admin.gradient_start_color_label') !!} )
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="color form-control" id="header_bottom_bg_end_color" name="header_bottom_bg_end_color" value="{{ get_appearance_settings()['header_details']['header_bottom_gradient_end_color'] }}"/>&nbsp;( {!! trans('admin.gradient_end_color_label') !!} )
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>-->
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderTextColor">{{ trans('admin.header_text_color_label') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="header_text_color" name="header_text_color" value="{{ get_appearance_settings()['header_details']['header_text_color'] }}"/>
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderTextHoverColor">{{ trans('admin.header_text_hover_color_label') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="header_text_hover_color" name="header_text_hover_color" value="{{ get_appearance_settings()['header_details']['header_text_hover_color'] }}"/>
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderTextSize">{{ trans('admin.header_text_size_label') }}</label>
                    <div class="col-sm-8">
                      <input id="change_header_text_size" type="text" name="change_header_text_size" data-name="header_text_size" value="{{ get_appearance_settings()['header_details']['header_text_size'] }}">
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderSelectedMenuBGColor">{{ trans('admin.header_selected_menu_bg_color_label') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="header_selected_menu_bg_color" name="header_selected_menu_bg_color" value="{{ get_appearance_settings()['header_details']['header_selected_menu_bg_color'] }}"/>
                    </div>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="row">    
                    <label class="col-sm-4 control-label" for="inputHeaderSelectedMenuTextColor">{{ trans('admin.header_selected_menu_text_color_label') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="color form-control" id="header_selected_menu_text_color" name="header_selected_menu_text_color" value="{{ get_appearance_settings()['header_details']['header_selected_menu_text_color'] }}"/>
                    </div>
                  </div>  
                </div>
              </div>  
            </div>
          </div>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Banner (mới)</h3>
            </div>          
            <div class="box-body">
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderSliderImage">{{ trans('admin.appearance_banner_slider_image') }}</label>
                  <div class="col-sm-8">
                    <div class="clearfix">
                      <div data-toggle="modal" data-dropzone_id="eb_dropzone_banner_image_file_upload" data-target="#frontendBannerImageUploader" class="icon product-header-slider-uploader pull-right">{{ trans('admin.appearance_header_slider_image_and_text_add_loader_text') }}</div>
                    </div>

                    <div class="uploaded-header-slider-images">
                      @if(count(get_appearance_header_settings_data()) > 0 )
                      <div class="sample-img" style="display:none;"><img class="upload-icon" src="{{ default_upload_sample_img_src() }}"></div>
                      <div class="uploaded-slider-images" style="display:block;">
                        @foreach(get_appearance_header_settings_data() as $slider_img)
                          <div class="header-slider-image-single-container {{ substr(basename($slider_img->img_url), 0, -4) }}"><img src="{{ get_image_url($slider_img->img_url) }}"><div data-id="{{ $slider_img->id }}" class="remove-frontend-img-link" style="display: none;"></div></div>
                        @endforeach
                      </div>
                      @else
                      <div class="sample-img"><img class="upload-icon" src="{{ default_upload_sample_img_src() }}"></div>
                      <div class="uploaded-slider-images"></div>
                      @endif
                    </div>
                  </div>
                </div>  
              </div>

              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputHeaderSliderVissibility">{{ trans('admin.banner_visibility') }}</label>
                  <div class="col-sm-8">
                    @if(count(get_appearance_settings()) && get_appearance_settings()['header_details']['custom_css'] == true)
                      <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputVisibilityBanner" id="inputVisibilityBanner">
                    @else
                      <input type="checkbox" class="shopist-iCheck" name="inputVisibilityBanner" id="inputVisibilityBanner">
                    @endif
                  </div>
                </div>  
              </div>
            </div>

          </div>
            
        
          
          <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_frontend_images_json" id="_frontend_images_json" value="{{ $frontend_templates_details['appearance_tab']['settings'] }}">
          <input type="hidden" name="header_text_size" id="header_text_size" value="{{ get_appearance_settings()['header_details']['header_text_size'] }}">
          <input type="hidden" name="sidebar_panel_title_text_size" id="sidebar_panel_title_text_size" value="{{ get_appearance_settings()['general']['sidebar_panel_title_text_font_size'] }}">
          <input type="hidden" name="sidebar_panel_content_text_size" id="sidebar_panel_content_text_size" value="{{ get_appearance_settings()['general']['sidebar_panel_content_text_font_size'] }}">
          <input type="hidden" name="product_box_content_text_size" id="product_box_content_text_size" value="{{ get_appearance_settings()['general']['product_box_text_font_size'] }}">
        </form>  
      </div>
 
      <input type="hidden" name="_current_tab" id="_current_tab" value="{{ $frontend_templates_details['current_tab'] }}">

      <div class="modal fade" id="frontendImageUploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <p class="no-margin">{!! trans('admin.you_can_upload_10_image') !!}</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>    
            <div class="modal-body">             
              <div class="uploadform dropzone no-margin dz-clickable frontend_images_file_upload" id="images_file_upload" name="images_file_upload">
                <div class="dz-default dz-message">
                  <span>{{ trans('admin.drop_your_cover_picture_here') }}</span>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{{ trans('admin.close') }}</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="frontendBannerImageUploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <p class="no-margin">{!! trans('admin.you_can_upload_10_image') !!}</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>    
            <div class="modal-body">             
              <div class="uploadform dropzone no-margin dz-clickable frontend_images_file_upload" id="banner_images_file_upload" name="banner_images_file_upload">
                <div class="dz-default dz-message">
                  <span>{{ trans('admin.drop_your_cover_picture_here') }}</span>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{{ trans('admin.close') }}</button>
            </div>
          </div>
        </div>
      </div>

      
      <div class="modal fade" id="addDynamicTextOnImage" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <p class="no-margin">{!! trans('admin.appearance_add_text_and_css') !!}</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>      
            <div class="modal-body">
              <p>{!! trans('admin.add_text_on_image_placeholder') !!}</p>  
              <textarea id="add_text_on_image_editor" name="add_text_on_image_editor" class="dynamic-editor-slider-text"></textarea><br>

              <div class="advance-css-for-custom-text-on-image">
                <p>{!! trans('admin.add_text_on_image_css_placeholder') !!}</p>  
                <textarea id="advanced_custom_css" name="advanced_custom_css" class="dynamic-editor-slider-advanced-css"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default attachtopost btn-add-text-on-image">{{ trans('admin.add_text_and_css_on_image_btn_label') }}</button>
              <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{{ trans('admin.close') }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection