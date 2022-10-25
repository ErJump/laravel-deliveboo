<!DOCTYPE html>
<html>
    <head>
        <title>Email di Registrazione</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #f7ae49;
                font-family: 'Open Sans', sans-serif;
                padding: 20px;
            }

            .email-card {
                width: 60%;
                margin: 0 auto;
                background-color: #fff;
                color: #212121;
                border-radius: 5px;
                padding: 12px 25px;
            }

            .img-container {
                padding: 12px 20px;
                text-align: center;
            }

            .image-sizing{
                height: 34px;
            }

            .delive-message {
                text-align: center;
            }

            .order-total {
                background-color: #f2f2f2;
                border-radius: 5px;
                padding: 12px;
                margin-top: 1.75rem;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
            }

            @media only screen and (max-width: 600px) {
                .email-card {
                    width: 100%;
                }

                .image-sizing{
                    height: 24px;
                }
            }
        </style>
    </head>
    <body>
        <div class="email-card">
            <div class="img-container">
                <img class="image-sizing" src="https://raw.githubusercontent.com/ErJump/laravel-deliveboo/Dev/public/assets/images/logo-red.png" alt="Logo">
            </div>
            <div class="message-box">
                <div class="delive-message">                                
                    <h2 style="margin-bottom: 3px;">Hai ricevuto un nuovo ordine!</h2>
                    <p style="font-size: .9rem; color: rgba(33,33,33,.75)">Accendi i fornelli, la papera sta aspettando!<br>In basso puoi consultare il riepilogo:</p>
                </div>
                <div>
                    <ul style="list-style: none; margin-top: .75rem;">
                        <li><strong>Nome:</strong> {{$name}}</li>
                        <li><strong>Cognome:</strong> {{ $surname }} </li>
                        <li><strong>Indirizzo:</strong> {{ $address }}</li>
                        <li><strong>Email:</strong> {{$email}}</li>
                        <li><strong>Order:</strong> {{$order}}</li>
                    </ul>
                </div>
            </div>
            <div class="order-total">
                <div>
                    <h3>Totale: <strong>{{ $amount }}€</strong></h3>
                </div>
            </div>
        </div>
    </body>
</html>