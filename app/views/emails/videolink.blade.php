<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello {{$appointment->user->first_name}}</h2>

		<div>
			Here is your link for video chat with expert {{$appointment->expert->first_name}}

            <br/><br/>

            <a href="http://zantama.com/user/video-chat/{{$appointment->id}}">Video Chat Link</a>
		</div>
	</body>
</html>