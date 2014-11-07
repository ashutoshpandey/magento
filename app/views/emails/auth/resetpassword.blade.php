<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello {{$user->name}}</h2>

		<div>
			To reset your password, complete this form: {{ URL::to('password/reset') }}.
		</div>
	</body>
</html>