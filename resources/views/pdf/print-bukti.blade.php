<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='https://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>

<hr><width="100" height="75">

    <center><b style="font-family: 'Courier New', Courier, monospace; font-size: 50px;">HOTEL <span style="color: blue">HEBAT</span></b></center><br>
    <center><b>Jl. Otto Iskandardinata, Kabupaten Garut, Jawa Barat<b></center><br>

<hr><width="100" height="75">

<table align='center' border='0' cellpadding='0' cellspacing='0' style='height:842px; width:595px;font-size:12px;'>
    <tr>
        <td valign='top'><table width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td valign='bottom' width='50%' height='50'><div align='left'></div><br/></td>
          <td width='50%'>&nbsp;</td>
        </tr>
    </tr>
</table><center><a style='font-size: 30px;font-weight: bold;'> </a></center><center><a style='font-size: 20px;font-weight: bold;'> </a></center><br>

<table width='100%' cellspacing='0' cellpadding='0'>
    <tr>
        <td valign='top' width='35%' style='font-size:12px;'>Client Name : {{ $data->user->name }}<br/><br/></td>
        <td valign='top' width='35%'></td>
        <td valign='top' width='30%' style='font-size:12px;'>Transaction ID : {{$data->id}}<br/></td>
    </tr>
</table>

<table width='100%' height='100' cellspacing='0' cellpadding='0'>
    <tr>
        <td><div align='center' style='font-size: 14px;font-weight: bold;'></div></td>
    </tr>
</table>

<table width='100%' cellspacing='0' cellpadding='2' border='1' bordercolor='#CCCCCC'>
    <tr>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Room Type </strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Price/Room </strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Check In </strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Check Out </strong></td>
        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Total Room </strong></td>
    </tr>
    <tr style="display:none;">
        <td colspan="*">
            <tr>
                <td valign='top' style='font-size:12px;'>{{$data->room->roomType->name}}</td>
                <td valign='top' style='font-size:12px;'>@currency($data->room->roomType->price)</td>
                <td valign='top' style='font-size:12px;'>{{ $data->check_in }}</td>
                <td valign='top' style='font-size:12px;'>{{ $data->check_out }}</td>
                <td valign='top' style='font-size:12px;'>{{ $data->many_room}}</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
            <tr>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
                <td valign='top' style='font-size:12px;'>&nbsp;</td>
            </tr>
        </td>
    </tr>
</table>

<table width='100%' cellspacing='0' cellpadding='2' border='0'>
    <tr>
        <td  align='right' style='font-size:12px;'><b>Total :</b></td>
        <td  align='right' style='font-size:12px;'><b>@currency($data->payment->price)</b></td>
    </tr>
</table>

<table width='100%' height='50'><tr><td style='font-size:12px;text-align:justify;'></td></tr></table><br><br><br>
<table  width='100%' cellspacing='0' cellpadding='2'>
    <tr>
        <td width='33%' style='border-top:double medium #CCCCCC;font-size:12px;' valign='top' ><b>HOTEL<span style="color: blue"> HEBAT</span></b><br/>Jl. Otto Iskandardinata, Kabupaten Garut, Jawa Barat<br/>Phone: +62-896-3070-6721<br/></td>
        <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;' align='right'>Invoice Hotel<br/></td>
      </tr>
</table>
</body>
</html>
