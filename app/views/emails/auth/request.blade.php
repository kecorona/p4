<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>
	<h1>Password Reset</h1>
	<p>
	To reset your password, complete this form:
	{{ URL::route('users.reset', compact('token')) }}
	</p>
</body>
</html>