<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href={{asset('CSS/style.css')}}>
    <link rel="stylesheet" href={{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'}}>
</head>
<body>

    
        <div class="fo">
            <img src="../Images/register.jpg" alt="logo" class="image">
            <p class="para">{{__('msg.Footer1')}}</p>
            <div class="social-icons">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-whatsapp"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-linkedin"></i>
            </div>
            <p class="copyright">&copy; {{__('msg.Footer2')}}</p>
        </div>
    

</body>
</html>
