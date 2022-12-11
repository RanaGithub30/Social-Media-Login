<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        h1{
            text-align: center;
        }

        h2{
            text-align: center;
        }
    </style>
</head>
<body>

    <div>
        <h1>The User has been Authenticated</h1>

        <h2>Logged in as {{$message ?? ''}}</h2>
        
    </div>
    
</body>
</html>