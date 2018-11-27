<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">
</head>

<body>
<div style="padding:15px 0;background:url(https://ci6.googleusercontent.com/proxy/m5DNiZVKKhhyr6cZU1BXrYbSc0QdFno7dHgJRFgrS4qK_TFMVRExKdoQIEA=s0-d-e1-ft#http://img/bgplait.png) repeat #dddddd;margin:0px auto;font-weight:400;background-size:160px"> <span class="HOEnZb"><font color="#888888"> </font></span><span class="HOEnZb"><font color="#888888"> </font></span>
  <table width="600" border="0" cellpadding="10" cellspacing="0" style="margin:0px auto;background:#fffefb;text-align:center;font-family: 'Roboto Slab', serif;">
    <tbody>
      
      <tr style="background:#fff">
        <td style="text-align:center;padding-top:20px;padding-bottom:20px;border-bottom:2px solid #6cb4a0;"><img width="100px" src="{{$logo}}" alt="img" class="CToWUd"></td>
      </tr>
      <tr><td><h1 style="color:#c9434a;">
      You have been assigned to a family.
      </h1></td></tr>

     <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Order ID:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['id'] }}</span></td></tr>
     <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">User Name</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['first_name1'].' '.$order_data['user']['last_name1'] }}</span></td></tr>  
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">User Email</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['email'] }}</span></td></tr>
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">User mobile</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['mobile1'] }}</span></td></tr>       
     <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Address 1:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['address_1'] }}</span></td></tr>
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Address 2:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['address_2'] }}</span></td></tr>
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">City:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['city'] }}</span></td></tr>
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">State:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['state'] }}</span></td></tr>
    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Zipcode:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $order_data['user']['zip'] }}</span></td></tr>            
     <tr style="margin: auto;width: 50%;display: block;">


      <tr>
        <td align="center"><p style="color:#000;font-weight:500">Issued on behalf of<br>
            PORTLAND NANNY </p></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>