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
              
              <div class="form-group">
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
              </div>
              
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

            </div>
          </div>

          <!-- Thêm banner -->

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
                      @if(count(get_appearance_banner_settings_data()) > 0 )
                      <div class="sample-img" style="display:none;"><img class="upload-icon" src="{{ default_upload_sample_img_src() }}"></div>
                      <div class="uploaded-slider-images" style="display:block;">
                        @foreach(get_appearance_banner_settings_data() as $banner_img)
                          <div class="header-slider-image-single-container {{ substr(basename($banner_img->img_url), 0, -4) }}"><img src="{{ get_image_url($banner_img->img_url) }}"><div data-id="{{ $banner_img->id }}" class="remove-frontend-img-link" style="display: none;"></div></div>
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
              

              
            </div>
          </div>

          <!-- Thêm banner -->

          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('admin.appearance_home_elements_text') }}</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputSelectCatForHomePage">{{ trans('admin.home_page_cat_select_label') }} </label>
                  <div class="col-sm-8">
                    @if(count($frontend_templates_details['parent_cat']) > 0)  
                      <ul class="parent-cat-list">
                       @foreach($frontend_templates_details['parent_cat'] as $cat)
                          @if( !empty($frontend_templates_details['appearance_tab']['settings_details']['home_details']['cat_list_to_display']) && in_array($cat['term_id'], $frontend_templates_details['appearance_tab']['settings_details']['home_details']['cat_list_to_display']))
                          <li><input type="checkbox" checked="checked" class="shopist-iCheck" name="inputSelectCatForHomePage[]" id="inputSelectCatForHomePage-{{ $cat['term_id'] }}" value="{{ $cat['term_id'] }}"> &nbsp;&nbsp;{{ $cat['name'] }}</li>   
                          @else
                          <li><input type="checkbox" class="shopist-iCheck" name="inputSelectCatForHomePage[]" id="inputSelectCatForHomePage-{{ $cat['term_id'] }}" value="{{ $cat['term_id'] }}"> &nbsp;&nbsp;{{ $cat['name'] }}</li>   
                          @endif

                       @endforeach
                      </ul>
                    @else
                    <label>{{ trans('admin.no_cat_yet_label') }}</label>
                    @endif
                  </div>
                </div>  
              </div>
                
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputSelectCatCollectionForHomePage">{{ trans('admin.home_page_cat_collection_select_label') }}</label>
                  <div class="col-sm-8">
                    @if(count($frontend_templates_details['parent_cat']) > 0)  
                      <ul class="parent-cat-list">
                      @foreach($frontend_templates_details['parent_cat'] as $cat)
                          @if( !empty($frontend_templates_details['appearance_tab']['settings_details']['home_details']['cat_collection_list_to_display']) && in_array($cat['term_id'], $frontend_templates_details['appearance_tab']['settings_details']['home_details']['cat_collection_list_to_display']))
                          <li><input type="checkbox" checked="checked" class="shopist-iCheck" name="inputSelectCatCollectionForHomePage[]" id="inputSelectCatCollectionForHomePage-{{ $cat['term_id'] }}" value="{{ $cat['term_id'] }}"> &nbsp;&nbsp;{{ $cat['name'] }}</li>   
                          @else
                          <li><input type="checkbox" class="shopist-iCheck" name="inputSelectCatCollectionForHomePage[]" id="inputSelectCatCollectionForHomePage-{{ $cat['term_id'] }}" value="{{ $cat['term_id'] }}"> &nbsp;&nbsp;{{ $cat['name'] }}</li>   
                          @endif

                      @endforeach
                      </ul>
                    @else
                    <label>{{ trans('admin.no_cat_yet_label') }}</label>
                    @endif
                  </div>
                </div>  
              </div>  
            </div>  
          </div>  
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('admin.appearance_footer_elements_text') }}</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputAboutUsDesc">{{ trans('admin.about_us_desc') }}</label>
                  <div class="col-sm-8">
                    <textarea id="about_us_description_editor" name="about_us_description_editor" class="dynamic-editor" placeholder="{{ trans('admin.enter_description') }}">
                    {!! $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['footer_about_us_description'] !!}            
                    </textarea>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputFbUrl">{{ trans('admin.fb_title') }}</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="fb_follow_us_url" name="fb_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['fb'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputTwitterUrl">{{ trans('admin.twitter_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="twitter_follow_us_url" name="twitter_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['twitter'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">     
                  <label class="col-sm-4 control-label" for="inputLinkedinUrl">{{ trans('admin.linkedin_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="linkedin_follow_us_url" name="linkedin_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['linkedin'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputDribbbleUrl">{{ trans('admin.dribbble_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dribbble_follow_us_url" name="dribbble_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['dribbble'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputGooglePlusUrl">{{ trans('admin.google_plus_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="google_plus_follow_us_url" name="google_plus_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['google_plus'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputInstagramUrl">{{ trans('admin.instagram_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="instagram_follow_us_url" name="instagram_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['instagram'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
                  </div>
                </div>  
              </div>
              
              <div class="form-group">
                <div class="row">    
                  <label class="col-sm-4 control-label" for="inputYoutubeUrl">{{ trans('admin.youtube_title') }}</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="youtube_follow_us_url" name="youtube_follow_us_url" value="{{ $frontend_templates_details['appearance_tab']['settings_details']['footer_details']['follow_us_url']['youtube'] }}" placeholder="{{ trans('admin.url_prefix_label') }}"/>
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