<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grids fgd1">
            <a href="index.html"><img src="{{asset('frontend_assets/images/logo2.png')}}" alt=" " /><h3>FASHION<span>CLUB</span></h3></a>
            <ul>
                <li>1234k Avenue, 4th block,</li>
                <li>New York City.</li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </ul>
        </div>
        <div class="col-md-3 footer-grids fgd2">
            <h4>Information</h4>
            <ul>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="icons.html">Web Icons</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="faq.html">FAQ's</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grids fgd3">
            <h4>Shop</h4>
            <ul>
                <li><a href="jewellery.html">Jewellery</a></li>
                <li><a href="cosmetics.html">Cosmetics</a></li>
                <li><a href="Shoes.html">Shoes</a></li>
                <li><a href="deos.html">Deos</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grids fgd4">
            <h4>My Account</h4>
            <ul>
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}">{{ Auth::user()->name }} {{  __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest

                <li><a href="recommended.html">Recommended </a></li>
                <li><a href="payment.html">Payments</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <p class="copy-right">© 2019 Yen Bai City . All rights reserved | Design by <a href="https://yenbai.city"> YenBai.City</a></p>
    </div>
</div>
<!-- cart-js -->
<script src="{{asset('frontend_assets/js/minicart.js')}}"></script>
<script>
    w3ls1.render();

    w3ls1.cart.on('w3sb1_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {
                items[i].set('shipping', 0);
                items[i].set('shipping2', 0);
            }
        }
    });
</script>
<!-- //cart-js -->