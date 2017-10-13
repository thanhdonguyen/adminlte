<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>laravel 5.5</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Hello words</h1>
	<label for="">subject :</label><p>{{ $data['subject'] }}</p>
	<label for="">Messages :</label>{{ $data['messages'] }}
	@if(isset($data['customers'][$key]))
	<label for="">First name :</label><p>{{ $data['customers'][$key]['first_name'] }}</p>
	<label for="">Last name :</label><p>{{ $data['customers'][$key]['last_name'] }}</p>
	@endif
	@if(isset($data['path']))
	<label for="">attachments :</label><img src="{{ $data['path'] }}" alt="">
	@endif
</body>
</html>