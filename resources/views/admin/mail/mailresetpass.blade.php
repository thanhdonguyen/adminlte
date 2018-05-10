<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>mail</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Welcome {{ $data['name'] }} </h1><br>
	<a href="{{ URL::route('resetpass',$data['token']) }}">{{ URL::route('resetpass',$data['token']) }}</a>
</body>
</html>