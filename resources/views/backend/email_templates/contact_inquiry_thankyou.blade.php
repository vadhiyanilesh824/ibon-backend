<!DOCTYPE html>
<html>
<head>
    <title>{{config('app.name')}}</title>
</head>
<body>
    <p>Hello! {{$details['name']}},</p>
    <p>Thank you for the contacting us. Your inquiry message receved successfully. Our team contacting you soon.</p>   
    <p>Thank you, <a href="{{url('/')}}">{{config('app.name')}}</a></p>
</body>
</html>