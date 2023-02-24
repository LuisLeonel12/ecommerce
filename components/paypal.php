<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.paypal.com/sdk/js?client-id=Ad0TQLzN5G9dW6nT6vgpJrImezrz7cA11FD6OZpJkJi2kEMfOtUuw-s7nICRyoThJI41TlWpxIpcRI7d&currency=MXN"></script>


    <Style>
        #paypal-button-container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

    </Style>

</head>
<body>

    <div id="paypal-button-container"></div>


    <script> paypal.Buttons({
         
         style:{
            shape:'pill',
            label:'pay'
         }
         
        }).render('#paypal-button-container'); </script>

</body>
</html>