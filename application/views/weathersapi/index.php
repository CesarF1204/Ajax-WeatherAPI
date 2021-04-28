<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Directions API</title>
    <link rel="stylesheet" href="/user_guide/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // we are getting all of the temperature so that when the user first requests the page the page 
            // will already be rendering the temperature
            $.get('/partials/index', function(res) {
            // this url returns html string so we can dump that straight into div#weather
            $('#weather').html(res);
            });
            $('form').change(function(){
            // there are three arguments that we are passing into $.post function
            //     1. the url we want to go to: '/weathersapi/weather'
            //     2. what we want to send to this url: $(this).serialize()
            //            $(this) is the form and by calling .serialize() function on the form it will 
            //            send post data to the url with the names in the inputs as keys
            //     3. the function we want to run when we get a response:
            //            function(res) { $('#weather').html(res) }
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('#weather').html(res);
            });
            // We have to return false for it to be a single page application. Without it,
            // jQuery's submit function will refresh the page, which defeats the point of AJAX.
            // The form below still contains 'action' and 'method' attributes, but they are ignored.
            return false;
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h3>Type your Location to show the temperature today</h3>
    <form action="/weathersapi/weather" method="POST">
        <label for="city">City: </label>
        <input type="text" name="city" id="city" placeholder="Type your location here...">
    </form>

    <div id="weather"></div>

</body>
</html>