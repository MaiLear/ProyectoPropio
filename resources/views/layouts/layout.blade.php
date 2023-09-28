<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
    <title>@yield('title')</title>

    <nav class="main-menu">
        <picture>
         <source srcset="{{asset('img/1-removebg-preview-small-105w.png')}}" media="(max-width:1500px)">
         <img class="main-menu__logo" src="{{asset('img/1-removebg-preview-500w.png')}}">
        </picture>
         <ul class="main-menu__list">
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Home</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Shop</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Blog</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">About</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Contact</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link"><img src="{{asset("img/icons8-bolsa-de-compras-25.png")}}"></a></li>
         </ul>
     </nav>
</head>
<body>
    @yield('body')


    <footer class="footer">
        <div class="footer-signup">
        <h1 class="footer-signup__text">Sign Up For Newsletters</h1>
        <p class="footer-signup__text">Get E-mail updates about our latest shop and <span>special offers.</span></p>
        <form action="" method="POST">
            <input class="footer-signup__input" type="email" placeholder="Your email adress">
            <input class="footer-signup__btn" type="submit" value="Sign Up">
        </form>
        </div>
        <div class="footer-info">
        <img class="footer-info__logo" src="">
        <h4>Contact</h4>
        <p><span>Address:</span>  562 Wellington Road. Street 32. San Francisco</p>
        <p><span>Phone:</span> +01 2222 365/(+91) 0123456789</p>
        <p><span>Hours:</span> 10:00 - 18:00. Mon - Sat</p>
        <h4>Follow Us</h4>
        <ul class="footer-info-socialnetworks">
        <li class="footer-info-socialnetworks__item"><a class=""><img src="{{asset('img/icons8-facebook-48.png')}}">Facebok</a></li>
        <li class="footer-info-socialnetworks__item"><a href=""><img src="{{asset('img/icons8-instagram-64.png')}}">Instagram</a></li>
        <li class="footer-info-socialnetworks__item"><a href=""><img src="{{asset('img/icons8-youtube-play-48.png')}}">Youtube</a></li>
        </ul>
        
        <ul class="footer-info-us">
            <li>About</li>
            <li><a class="footer-info__text" href="">About Us</a></li>
            <li><a class="footer-info__text" href="">Delivery Information</a></li>
            <li><a class="footer-info__text" href="">Privacy Policy</a></li>
            <li><a class="footer-info__text" href="">Terms & Conditions</a></li>
            <li><a class="footer-info__text" href="">Contact Us</a></li>
        </ul>
        
        <ul class="footer-info-account">
            <li>My Account</li>
            <li><a class="footer-info__text" href="">Sign in</a></li>
            <li><a class="footer-info__text" href="">View Cart</a></li>
            <li><a class="footer-info__text" href="">My Wishlist</a></li>
            <li><a class="footer-info__text" href="">Track My Order</a></li>
            <li><a class="footer-info__text" href="">Help</a></li>
        </ul>
        
        <div class="footer-info-app">
        <h4>Install App</h4>
        <p><a class="footer-info__text" href="">From App Store or Google Play</a>></p>
        <img src="">
        <img src="">
        <p> <a class="footer-info__text" href="">Secured Payment Gateways</a></p>
        <ul>
            <li><a href=""><img src="{{asset('img/pago-seguro.png')}}"></a></li>
            <li><a href=""><img src="{{asset('img/amazon-payments_82089.png')}}"></a></li>
        </ul>
        </div>
        </div>
        </footer>
    <script src="{{asset('js/main.js') }}"></script> 
</body>
</html>