<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myADKLs support</title>
</head>
<body style="margin: 0; padding: 10px; font-family: Helvetica,Arial,sans-serif; background-color: #f2f2f2;">
    <div class="" style="width: 100%; max-width: 600px; height:400px; margin: 20px auto; background: white; border: 1px solid #f2f2f2; border-radius: 15px;">
    <table style="width: 100%; max-width: 600px;">
        <tr>
            <td style="background: grey; text-align: center; padding: 10px; color: white;">
                <h2 style="margin: 0; padding-top:0px ">myADKLs support</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; padding-top:0px">
                <p><strong>Name :</strong> {{$details['name']}}</p>
                <p><strong>Email :</strong> {{$details['email']}}</p>
                <p><strong>Message :</strong> {{$details['message']}}</p>
            </td>
        </tr>
    </table>
</div>
    <style>
        @media only screen and (max-width: 500px) {
            table {
                max-width: 100% !important;
            }
        }
    </style>
</body>
</html>
