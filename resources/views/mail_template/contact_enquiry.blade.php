<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Enquiry</title>
</head>
<body>
<p>Hello River Edge</p>

<p>There is a new contact enquiry from <b>{{ $emailData['name'] }}</b></p>
<p>Email : {{ $emailData['email'] }}</p>
<p>Mobile : {{ $emailData['mobile'] }}</p>
<p>Message :</p>
<p>{{ $emailData['description'] }}</p>
</body>
</html>