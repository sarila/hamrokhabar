<html>
<head>
    <title>Forget Password</title>
</head>
<body>
<table>
    <tr>
        <td>Dear {{$name}} !</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>Your password has been successfully reseted. <br>
            Your account information is as below:</td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>New Password: <span>  {{$password}} </span></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thank & Regards</td></tr>
    <tr><td>{{ config('app.name', 'Laravel') }}</td></tr>
</table>
</body>
</html>
