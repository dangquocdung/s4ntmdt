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
                                {!! $data['completed_order']['email_heading'] !!}
                                <!-- Đơn hàng của bạn đã hoàn tất -->
                              </td>
                          </tr>

                          <tr>
                            <td valign="top" align="center">
                              <table width="600" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                  <tr>
                                    <td valign="top" style="background-color:#fdfdfd">                                              
                                      <table width="100%" cellspacing="0" cellpadding="20" border="0">
                                        <tbody>
                                          <tr>
                                            <td valign="top" style="padding:48px">
                                              <div style="color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                                  <p>{!! trans('admin.completed_order_mail_msg') !!}</p>
                                                
                                                <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! trans('email.order') !!} #{!! $_order_id !!} ({!! $_order_date !!})</h2>
                                                <table cellspacing="0" cellpadding="6" border="1" style="width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;border:1px solid #e4e4e4">
                                                  <thead>
                                                    <tr>
                                                      <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col">{!! trans('email.product') !!}</th>
                                                      <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col">{!! trans('email.quantity') !!}</th>
                                                      <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col">{!! trans('email.price') !!}</th>
                                                      <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col">{!! trans('email.total') !!}</th>
                                                    </tr>
                                                  </thead>
                                                    <tbody>
                                                      <?php $subTotal = 0;?>
                                                      @foreach($_order_items as $items)
                                                        <?php $subTotal += $items->quantity * $items->price; ?>
                                                        <tr>
                                                          <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word;color:#737373;padding:12px"> {!! $items->name !!}<br><small></small>
                                                          </td>
                                                          <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px">{!! $items->quantity !!}</td>
                                                          <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px">{!! price_html( get_product_price_html_by_filter($items->price) ) !!}</td>
                                                          <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px"><span> {!! price_html( get_product_price_html_by_filter($items->quantity * $items->price) ) !!} </span></td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                      <tr>
                                                        <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row">{!! trans('email.subtotal') !!}:</th>
                                                        <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span>{!! price_html( get_product_price_html_by_filter($subTotal) ) !!}</span></td>
                                                      </tr>
                                                      <tr>
                                                        <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row">{!! trans('email.shipping_cost') !!}:</th>
                                                        @if($_order_shipping_cost && $_order_shipping_cost == 0)
                                                          <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><span>{!! trans('email.free') !!}</span></span></td>
                                                        @else
                                                          <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span>{!! price_html( get_product_price_html_by_filter($_order_shipping_cost) ) !!}</span></td>
                                                        @endif
                                                      </tr>
                                                      <tr>
                                                        <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row">{!! trans('email.tax') !!}:</th>
                                                        <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span>{!! price_html( get_product_price_html_by_filter($_order_tax) ) !!}</span></td>
                                                      </tr>

                                                      <tr>
                                                        <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row">{!! trans('email.payment_method') !!}:</th>
                                                        <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px">{!! get_payment_method_title($_payment_method) !!}</td>
                                                      </tr>

                                                      <tr>
                                                        <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row">{!! trans('email.total') !!}:</th>
                                                        <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px"><span>{!! price_html( get_product_price_html_by_filter($_order_total) ) !!}</span></td>
                                                      </tr>
                                                    </tfoot>
                                                </table>
                                                <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! trans('email.customer_details') !!}</h2>
                                                <ul>
                                                  <li>
                                                  <strong>{!! trans('email.email') !!}:</strong> <span style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif"><a target="_blank" href="mailto:{{ $_mail_to }}">{!! $_mail_to !!}</a></span>
                                                  </li>
                                                  <li>
                                                  <strong>{!! trans('email.tel') !!}:</strong> <span style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">{!! $_billing_phone !!}</span>
                                                  </li>

                                                </ul>

                                                <table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top">
                                                  <tbody>
                                                    <tr>
                                                      <td width="50%" valign="top">
                                                        <h3 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">{!! trans('email.billing_address') !!}</h3>
                                                        <p style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;margin:0 0 16px">{!! $_billing_first_name .' '. $_billing_last_name !!} <br> {!! $_billing_address_1 !!}<br> {!! $_billing_city !!}</p>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
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