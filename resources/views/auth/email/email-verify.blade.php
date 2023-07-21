Xin chào {{ $email_data['name'] }}
<br><br>
Chào mừng bạn đến với hệ thống website
<br>
Please click the below link to verify email and activate your account!
<br><br>
<a href="http://laravel-app:8082/verify?code={{ $email_data['verification_code'] }}">Click here!</a>

<br><br>
Thank you!
<br>
By: Hachitech solution
