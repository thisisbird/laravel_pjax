<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
        <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '821366017879850',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v12.0'
            });
            
            FB.login(function (response) {
                if (response.authResponse) {
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me?fields=id,email,picture,first_name,middle_name,last_name,ids_for_business,short_name', function (response) {
                        console.log(response);
                        console.log('Good to see you!!!, ' + response.name + '.');
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {
                scope: 'public_profile,email'
            });
            FB.getLoginStatus(function(response) {
                console.log(response);
            });

            // FB.logout(function(response) {
            // // Person is now logged out
            // });
        };

    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>



</body>

</html>
