<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello {{ $username }},</h2>


		<div>
			
			Your new password: {{ $password }}<br><br>

			You will need to use the following link to active your new password.<br><br>

			--- <br>
			{{ $link }} <br>
			---


		</div>
	</body>
</html>
