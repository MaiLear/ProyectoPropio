<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @include('layouts.partials.header')
</head>

<body>
    <main class="page-content">
        <img class="page-content-img" src="{{asset('img/modelo.png')}}" alt="img-modelo">
        <div class="page-content-texts">
            <h3 class="page-content-texts__title--small">Trade-in-offer</h3>
            <h1 class="page-content-texts__title">Super value deals</h1>
            <h1 class="page-content-texts__title page-content-texts__title--green">On all products</h1>
            <p class="page-content-texts__paragraph">Save more with coupons & up to 70% off! </p>
            <br>
            <button class="page-content-texts__btn">Shop Now</button>
        </div>
    </main>
</body>

</html>