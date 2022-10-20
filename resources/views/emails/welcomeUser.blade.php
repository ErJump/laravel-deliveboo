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
        .description{
            margin-top: 30px;
        }
        div h2{
            line-height: 3rem;
        }
        .description-container{
            display: flex;
            justify-content: space-around;
        }
        .description-container div{
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="img-container">
        <img class="image-sizing" src="https://raw.githubusercontent.com/ErJump/laravel-deliveboo/Dev/public/assets/images/logo-red.png" alt="Logo">
    </div>
    <div class="cutom-align">
        <h1>Benvenuto in Deliveboo {{$user['name']}}!</h1>
    </div>
    <div class="description">
        <h2>Ti sei registrato con successo con l'emai:{{$user['email']}}!</h2>
        <h2>Centinaia di cibi e culture ti aspettano sulla nostra piattaforma, inizia subito!</h2>
    </div>
    
    <div class="description-container mt-5">
        <div>
            <h2>
                Semplice 
            </h2>
            <p>
                Ordina comodamente da casa tua, da qualunque piattaforma!
            </p>
        </div>
        <div>
            <h2>
                Veloce 
            </h2>
            <p>
                I nostri rider saranno da te in pochi minuti.
            </p>
        </div>
        <div>
            <h2>
                A casa tua
            </h2>
            <p>
                Goditi l'esperienza Deliveboo direttamente da casa, lascia fare a noi!
            </p>
        </div>
    </div>
</body>

</html>