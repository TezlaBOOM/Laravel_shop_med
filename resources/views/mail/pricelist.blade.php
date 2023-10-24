<!DOCTYPE html>
<html>

<head>
    <title>Nasz Newsletter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        /* Styl ogólny */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 0;
            margin: 0 auto;

        }

        /* Nagłówek */
        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;

        }

        h2 {
            text-align: center;
        }

        /* Menu */
        .menu-table {
            background-color: #3b9209;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;


        }

        .menu-table td {
            padding: 10px;
            width: 200px
        }

        .menu-table a {
            color: #fff;
            text-decoration: none;
        }

        /* Treść newslettera */
        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Linki */
        a {
            color: #fff;
            text-decoration: none;
        }

        /* Stopka */
        footer {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin: 0 auto;
        }

        /* Ikony mediów społecznościowych */
        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 20px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Witaj w Naszym Newsletterze</h1>
    </header>
    <div class="menu">
        <table class="menu-table">
            <tr>
                <td><a href="">Sklep</a></td>
                <td><a href="">Oferta</a></td>
                <td><a href="">Kontakt</a></td>
            </tr>
        </table>
    </div>
    <div class="newsletter-content">
        <h2>Nowości i Aktualności</h2>
        @dd($messageContent)
        <table class="table ">
            <thead>
                <tr class="table-primary">
         
                    <th scope="col">Nazwa</th>

                    <th scope="col">Cena Brutto</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($messageContent as $message)
                <tr>
                    @dd($message)
                    <td>{{ $message->name }}</td>

                    <td>{{ $message->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>Śledź nas na mediach społecznościowych, aby być na bieżąco!</p>
    </div>
    <footer>
        &copy; 2023 Nasza Firma | <a href="mailto:info@nasza-firma.com">info@nasza-firma.com</a>
        <div class="social-icons">
            <a href="https://www.facebook.com/nasza-firma"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/nasza-firma"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/user/nasza-firma"><i class="fab fa-youtube"></i></a>
            <a href="https://www.linkedin.com/company/nasza-firma"><i class="fab fa-linkedin"></i></a>
            <a href="https://twitter.com/nasza-firma"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
</body>

</html>
