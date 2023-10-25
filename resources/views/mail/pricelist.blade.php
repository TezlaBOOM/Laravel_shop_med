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
        /* Stylizacja głównej tabeli */
.table {
    width: 100%;
    border-collapse: collapse;
    
    
}

/* Stylizacja wierszy z nagłówkami */
.table thead tr {
    background-color: #3498db;
    color: #ffffff;
    font-weight: bold;
    list-style-type: none;
}

/* Stylizacja komórek w nagłówku */
.table thead th {
    padding: 10px;
}

/* Stylizacja reszty wierszy */
.table tbody tr {
    background-color: #f2f2f2;
}

/* Stylizacja komórek w wierszach */
.table tbody td {
    padding: 10px;
}
.product{
    text-align: center;
}

/* Stylizacja pierwszej komórki w każdym wierszu */
.table tbody tr td:first-child {
    font-weight: bold;
}

/* Dodanie lewej krawędzi do pierwszej komórki w każdym wierszu */
.table tbody tr td:first-child::before {
    
    margin-right: 5px;
}

/* Stylizacja linków w komórkach z atrybutem 'href' */
.table tbody a {
    text-decoration: none;
    color: #3498db;
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
                <td><a href="{{route('home')}}">Sklep</a></td>
                <td><a href="{{route('flash-sale')}}">Oferta</a></td>
                <td><a href="{{route('contact')}}">Kontakt</a></td>
            </tr>
        </table>
    </div>
    <div class="newsletter-content">
        <h2>Zmiana cen produktów <br> od {{$startDate}} do {{$endDate}} </h2>
        <table class="table ">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Kategoria</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Stara Cena Brutto</th>
                    <th scope="col">Nowa Cena Brutto</th>
                </tr>
            </thead>
            <tbody>
                @php

                    $products = \App\Models\Product::where(['status' => 1, 'is_approved' => 1])
                        ->orderBy('id', 'DESC')
                        ->get();
                    $categories = \App\Models\Category::where(['status' => 1])->get();
                    $historyPrice = \App\Models\HistoryPrice::whereBetween('created_at', [$startDate, $endDate])
                        ->orderby('id', 'DESC')
                        ->get();
                    
                    $uniqueCollection = $historyPrice->unique('product_id');
                   
                @endphp
                @foreach ($categories as $category)
                    <tr class="table-gray">
                        <td class="table-active" colspan="5"><a
                                href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </td>
                        {{-- <td ></td> --}}
                    </tr>

                    @foreach ($products as $product)
                        @if ($product->category_id == $category->id)
                            @foreach ($uniqueCollection as $price)
                                @if ($product->id == $price->product_id)
                                <tr>
                                        <td></td>
                                        <td class="product"><a href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a></td>
                                        <td class="product"><a href="{{ route('product-detail', $product->slug) }}">{{ $product->sku }}</td>

                                        <td class="product">{{ $price->old_price }} {{ $settings->currency_icon }}</td>
                                        <td class="product">{{ $product->price }} {{ $settings->currency_icon }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach


            </tbody>
        </table>


        {{-- @endforeach
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
        </table> --}}
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
