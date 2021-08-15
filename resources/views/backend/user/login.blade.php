<form action="login" method="post">

account:<input type="text" name="account">
<br>
password:<input type="password" name="password">
<br>
@csrf
<button type="submit">sign in</button>
</form>
@if(session('success'))
{{session('success')}}
@endif