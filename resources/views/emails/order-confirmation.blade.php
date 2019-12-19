<?php $data = get_emails_option_data();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Sàn GDTMĐT Hà Tĩnh</title>
</head>
<body style="margin: 0; padding: 0;">

<div style="background-color:#f0f0f0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px !important;min-width:600px !important;" class="yiv9635060181container">
        <tbody>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;">
                    <table style="width:580px;border-bottom:1px solid #ff3333;" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td align="left" valign="middle" style="width:500px;min-height:60px;">
                                    <a rel="nofollow" style="border:0;" target="_blank" href="https://hatinhtrade.com.vn/">
                                      <img style="display:block;border:0px;width:130px;min-height:35px;" src="https://hatinhtrade.com.vn/images/logo-san.png"> 
                                    </a>
                                </td>
                                <td align="right" valign="middle" style="padding-right:15px;">
                                    <a rel="nofollow" style="border:0;"><img height="40" width="112" style="display:block;border:0px;" src="https://hatinhtrade.com.vn/images/hoan-tra-hang.png"> </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;">

                  <table style="width:580px;" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                          <tr>
                              <td valign="middle" style="font-family:Arial, Helvetica, sans-serif;font-size:24px;color:rgb(255, 51, 51);text-transform:uppercase;font-weight:bold;padding:25px 10px 15px;text-align:center;">
                                <!-- {!! $data['new_order']['email_heading'] !!} -->
                                {!! trans('email.order_email_heading') !!}
                              </td>
                          </tr>
                          <tr style="display:none;">
                            <td valign="top" align="center">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding:10px 0px;background-color:#eeeeee;color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <ul style="list-style:none;display:block;text-align:center; margin: 0px;padding:0px;">
                                                    <li style="display:inline-block;"><a href=""><img src="{{ $_logo }}" width="24" height="24"></a></li>
                                                    <li style="display:inline-block;"><a href=""><img src="{{ $_logo }}" width="24" height="24"></a></li>
                                                    <li style="display:inline-block;"><a href=""><img src="{{ $_logo }}" width="24" height="24"></a></li>
                                                    <li style="display:inline-block;"><a href=""><img src="{{ $_logo }}" width="24" height="24"></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;text-align:left;padding:20px 30px;">
                            @if($_payment_method == 'bacs' || $_payment_method == 'paypal')
                            <p style="margin:0 0 16px">{!! trans('email.msg_bacs_paypal') !!}:</p>
                            @elseif($_payment_method == 'cod')
                              <p style="margin:0 0 16px">{!! trans('email.msg_cod') !!}:</p>
                            @endif

                            @if($_payment_method == 'bacs' || $_payment_method == 'cod')
                              <p style="margin:0 0 16px">{!! $_payment_method_details['method_instructions']!!}</p>
                            @endif

                            @if($_payment_method == 'bacs')
                            <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! trans('email.our_bank_details') !!}</h2>
                            <h3 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! $_payment_method_details['account_details']['account_name']!!} - {!! $_payment_method_details['account_details']['bank_name'] !!}</h3>
                            <ul>
                              <li>{{ trans('email.account_number') }}:
                                <strong>{!! $_payment_method_details['account_details']['account_number']!!}</strong>
                              </li>
                              <li>{!! trans('email.sort_code') !!}: <strong>{!! $_payment_method_details['account_details']['short_code']!!}</strong>
                              </li>
                            </ul>
                            @endif       
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;text-align:left;padding:0px 30px 0px 30px;">
                                <h2 style="color:#25003E;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! trans('email.order') !!} #{!! $_order_id !!} ({!! $_order_date !!})</h2>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="center" style="padding:0px 30px;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border:3px solid #DC143C;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:left;color:#FFFFFF;background-color:#DC143C;padding:5px 0px 5px 10px;" scope="col">{!! trans('email.product') !!}</th>
                                            <th style="text-align:center;color:#FFFFFF;background-color:#DC143C;padding:5px 0px;" scope="col">{!! trans('email.quantity') !!}</th>
                                            <th style="text-align:center;color:#FFFFFF;background-color:#DC143C;padding:5px 0px;" scope="col">{!! trans('email.price') !!}</th>
                                            <th style="text-align:center;color:#FFFFFF;background-color:#444444;padding:5px 0px;" scope="col">{!! trans('email.total') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $subTotal = 0;?> 
                                        @foreach($_order_items as $items) 
                                        <?php $subTotal += $items->quantity * $items->price; ?>
                                        <tr>
                                            <td style="text-align:left; padding:10px 0px 10px 10px;width:45%;border-bottom:1px solid #e1e1e1;">
                                                <div style="display:inline-block;vertical-align:middle;background-color:#eeeeee;padding:5px;">@if($items->img_src)<img src="{{ get_image_url( $items->img_src ) }}" width="30" height="30"> @else <img src="{{ default_placeholder_img_src() }}" width="30" height="30">@endif</div> <div style="display:inline-block;vertical-align:middle;">{!! $items->name !!}</div>
                                            </td>
                                            <td style="text-align:center;padding:10px 0px 10px 0px;width:15%;border-bottom:1px solid #e1e1e1;">{!! $items->quantity !!}</td>
                                            <td style="text-align:center;padding:10px 0px 10px 0px;width:15%;border-bottom:1px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($items->price) ) !!}</td>
                                            <td style="background-color:#eeeeee;text-align:center;padding:10px 0px 10px 0px;width:25%;border-bottom:1px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($items->quantity * $items->price) ) !!}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right" style="padding:30px 30px;">
                                <table cellspacing="0" cellpadding="0" border="0" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border:3px solid #DC143C;width:60%;">
                                    <tr>
                                        <td style="width:58%;text-transform:uppercase;padding:10px 0px 10px 10px;border-bottom:1px solid #e1e1e1;">{!! trans('email.subtotal') !!}</td>
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;border-bottom:3px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($subTotal) ) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:58%;text-transform:uppercase;padding:10px 0px 10px 10px;border-bottom:1px solid #e1e1e1;">{!! trans('email.shipping_cost') !!}</td>
                                        @if($_order_shipping_cost && $_order_shipping_cost == 0)
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;border-bottom:3px solid #e1e1e1;">{!! trans('email.free') !!}</td>
                                        @else
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;border-bottom:3px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($_order_shipping_cost) ) !!}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td style="width:58%;text-transform:uppercase;padding:10px 0px 10px 10px;border-bottom:1px solid #e1e1e1;">{!! trans('email.tax') !!}</td>
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;border-bottom:3px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($_order_tax) ) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:58%;text-transform:uppercase;padding:10px 0px 10px 10px;border-bottom:1px solid #e1e1e1;">{!! trans('email.payment_method') !!}</td>
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;border-bottom:3px solid #e1e1e1;text-transform:uppercase;">{!! get_payment_method_title($_payment_method) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:58%;text-transform:uppercase;padding:10px 0px 10px 10px; color: #25003E; font-weight: bold;border-bottom:1px solid #e1e1e1;">{!! trans('email.total') !!}</td>
                                        <td style="width:42%;text-align:center;background-color:#eeeeee;padding:10px 0px 10px 0px;background-color: #DC143C; color: #FFFFFF;border-bottom:3px solid #e1e1e1;">{!! price_html( get_product_price_html_by_filter($_order_total) ) !!}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                      </tbody>
                  </table>

                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;padding-top:20px;padding-bottom:20px;">
                    <table style="width:580px;background:#f7f7f7;" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#ff3333;padding-left:8px;">
                                  <strong>CÀI ĐẶT ỨNG DỤNG&nbsp;SÀN GDTMĐT HÀ TĨNH</strong>
                                </td>
                                <td align="right" valign="middle" style="width:190px;">
                                    <a rel="nofollow" style="border:0px;text-decoration:none;" target="_blank" href="#"><img height="34" width="83" style="border:0px;" src="https://hatinhtrade.com.vn/images/appstore.jpg"> </a>
                                    <a rel="nofollow" style="border:0px;text-decoration:none;padding-left:3px;" target="_blank" href="#"> <img height="34" width="83" style="border:0px;" src="https://hatinhtrade.com.vn/images/gg-play.jpg"> </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top">
                    <table style="width:600px;padding:20px 0 0 0;" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td align="left" valign="top" width="49" style="width:49px;padding-left:10px;">
                                    <a rel="nofollow" style="border:0;" target="_blank" href="https://hatinhtrade.com.vn/">
                                      <img height="50" width="49" style="display:block;border:0px;" src="https://hatinhtrade.com.vn/images/logo-app.png"> 
                                    </a>
                                </td>
                                <td align="left" width="390" valign="top" style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#3c3c3c;padding:0 0 0 10px;line-height:17px;width:390px;">Trung tâm CNTT & Truyền thông Hà Tĩnh
                                    <br>Số 18 đường 26-3, Phường Nam Hà,
                                    <br>TP. Hà Tĩnh, tỉnh Hà Tĩnh.</td>
                                <td align="right" valign="top" width="131" style="padding-right:10px;">
                                  <img height="42" width="131" style="display:block;border:0px;" src="https://hatinhtrade.com.vn/images/da-dang-ky-bct.jpg">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>