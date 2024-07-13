<!-- resources/views/includes/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <title>@yield('pageTitle')</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #d1e7f6;">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="/">StockMaster</a>
            <ul class="navbar-nav d-flex flex-row justify-content-end">
                <li class="nav-item me-4">
                    <a class="nav-link" href="/categories">Categorias</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/">Estoques</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/brands">Marcas</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="/products">Produtos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
