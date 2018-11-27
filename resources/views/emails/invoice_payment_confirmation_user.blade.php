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
      @if($type == 'success')
      Invoice Paid.
      @else
      Invoice payment failed.
      @endif
      </h1></td></tr>

     <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Invoice ID:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $invoice->id }}</span></td></tr>

    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Invoice Date:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $invoice->created_at }}</span></td></tr>   

    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Price:</span> <span style="width: 50%;float: right;color: #6cb4a0;">${{ $invoice->price }}</span></td></tr>    

    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Due Price:</span> <span style="width: 50%;float: right;color: #6cb4a0;">${{ $invoice->due_price }}</span></td></tr>        

    <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Due Date:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ date('d/m/Y', strtotime('+5 days', strtotime($invoice->created_at))) }}</span></td></tr>    

        @if($type == 'success')   

        <tr style="margin: auto;width: 50%;display: block;">
        <td align="left" style="width: 100%;float: left; padding: 10px;"><span style="width: 50%;float: left;font-weight: 600;word-wrap: break-word;">Transaction ID:</span> <span style="width: 50%;float: right;color: #6cb4a0;">{{ $data['tx'] }}</span></td></tr>  

        @endif

      <tr>
        <td align="center"><p style="color:#000;font-weight:500">Issued on behalf of<br>
            PORTLAND NANNY </p></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>