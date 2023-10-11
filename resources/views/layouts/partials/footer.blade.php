<footer class="footer">
        <div class="footer-signup">
            <div>
                <h3 class="footer-signup__title">Sign Up For Newsletters</h3>
                <p class="footer-signup__text">Get E-mail updates about our latest shop and <span class="footer-signup__text--orange">special offers.</span></p>
            </div>
            <form action="" method="POST">
                <input class="footer-signup__input" type="email" placeholder="Your email adress">
                <input class="footer-signup__btn" type="submit" value="Sign Up">
            </form>
        </div>
        <div class="footer-info">
            <ul class="footer-info-contact footer-info-lists">
                <li>
                    <img class="footer-info__logo" src="{{asset('/img/logoImg.png')}}">
                </li>
                <li class="footer-info__title">Contact</li>
                <li class="footer-info__text"><span class="footer-info__title">Address:</span> 562 Wellington Road. Street 32. San Francisco</li>
                <li class="footer-info__text"><span class=" footer-info__title">Phone:</span> +01 2222 365/(+91) 0123456789</li>
                <li class="footer-info__text"><span class=" footer-info__title">Hours:</span> 10:00 - 18:00. Mon - Sat</li>
                <li class="footer-info__title">Follow Us</li>
                <ul class="footer-info-socialnetworks footer-info-lists">
                    <li class="footer-info-socialnetworks__item"><a class=""><img src="{{asset('/img/facebook.png')}}"></a></li>
                    <li class="footer-info-socialnetworks__item"><a href=""><img src="{{asset('/img/instagram.png')}}"></a></li>
                    <li class="footer-info-socialnetworks__item"><a href=""><img src="{{asset('/img/youtube.png')}}"></a></li>
                </ul>
            </ul>

            <ul class="footer-info-us footer-info-lists">
                <li class="footer-info__title">About</li>
                <li><a class="footer-info__text" href="">About Us</a></li>
                <li><a class="footer-info__text" href="">Delivery Information</a></li>
                <li><a class="footer-info__text" href="">Privacy Policy</a></li>
                <li><a class="footer-info__text" href="">Terms & Conditions</a></li>
                <li><a class="footer-info__text" href="">Contact Us</a></li>
            </ul>

            <ul class="footer-info-account footer-info-lists">
                <li class="footer-info__title">My Account</li>
                <li><a class="footer-info__text" href="">Sign in</a></li>
                <li><a class="footer-info__text" href="">View Cart</a></li>
                <li><a class="footer-info__text" href="">My Wishlist</a></li>
                <li><a class="footer-info__text" href="">Track My Order</a></li>
                <li><a class="footer-info__text" href="">Help</a></li>
            </ul>

            <div class="footer-info-app">
                <h4 class="footer-info__title">Install App</h4>
                <p class="footer-info__text">From App Store or Google Play</p>
                <div class="footer-info-app-dowload footer-info-app--displayflex">
                    <a href=""><button class="footer-info-app-dowload__btn"><img class="footer-info-app-dowload__backgroundbtn" src="{{asset('/img/appstore.png')}}"></button></a>
                    <a href=""><button class="footer-info-app-dowload__btn footer-info-app-dowload__btn--playstore"><img class="footer-info-app-dowload__backgroundbtn" src="{{asset('/img/googleplay.png')}}"></button></a>
                </div>
                <p class="footer-info__text">Secured Payment Gateways</p>
                <ul class="footer-info-app--displayflex footer-info-lists">
                    <li><a href=""><img src="{{asset('/img/visa.png')}}"></a></li>
                    <li><a href=""><img src="{{asset('/img/mastercard.png')}}"></a></li>
                    <li><a href=""><img src="{{asset('/img/american.png')}}"></a></li>
                </ul>
            </div>
        </div>
    </footer>