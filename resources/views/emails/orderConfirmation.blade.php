<!DOCTYPE html>
<html>
<head>
    <title>Email di Registrazione</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }
         body{
            text-align: center;
        }
        .img-container{
            height: 400px;
            background-color: #f7ae49;
        }
        .image-sizing{
            width: 50%;
            margin-top: 8rem;
        }
        .cutom-align{
            background-color: #f7ae49;
            color: #FF2E40;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0 auto;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 2rem;
            width:70%;
            border-radius: 15px; 
        }
        h1{
            line-height: 80px;
        }
        div h2{
            line-height: 3rem;
        }
    </style>
</head>

<body>
    <div class="img-container">
        <img class="image-sizing" src="https://raw.githubusercontent.com/ErJump/laravel-deliveboo/Dev/public/assets/images/logo-red.png" alt="Logo">
    </div>
    <div class="cutom-align">
        <h2>Grazie per il tuo ordine {{$name}}</h2>
        <p>L' ordine contiene: </p>
        <p>{{$order}}</p>
        <p>totale: {{ $amount }}</p>
    </div>
</body>

</html>