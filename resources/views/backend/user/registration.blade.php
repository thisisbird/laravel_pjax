<form action="registration" method="post">

account:<input type="text" name="account">
<br>
name:<input type="text" name="name">
<br>
email:<input type="text" name="email">
<br>
password:<input type="password" name="password">
<br>
@csrf
<button type="submit">sign in</button>
</form>
@if(session('success'))
{{session('success')}}
@endif