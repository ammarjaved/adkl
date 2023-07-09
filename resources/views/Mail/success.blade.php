<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail </title>
</head>
<body >
                      
        <h1 class="" style="text-align: center ; font-family: 'Poppins', 'Helvetica Neue', Helvetica, Roboto, sans-serif;"> Thank you 🙌 </h1>
        <p style="text-align: center; font-family: 'Poppins', 'Helvetica Neue', Helvetica, Roboto, sans-serif; font-size:20px">We will get back to you within 1 business day (usually in just a few hours) </p>
  

    @if (Session::has('failed'))                    
        <h1 class="" style="text-align: center"> We are sorry  </h1>
        <p style="text-align: center">Something is wrong please try again later </p>

    @endif
    
</body>
</html>