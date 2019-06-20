<footer id="footer">
    <div class="top-panel">
        <div class="container">
            <a href="{{URL::to('/')}}" class="logo">
                <img src="/images/logo-green.svg" alt="logo">
            </a>
            <div class="nav-box">
                <nav class="nav-top">
                    <ul>
                        <li><a href="">Publish Now</a></li>
                        <li><a href="">Order Status</a></li>
                        <li><a href="">Publishing Lookup</a></li>
                        <li><a href="">Publishing Documetn Retreival</a></li>
                        <li><a href="">120 Day Calculator</a></li>
                    </ul>
                </nav>
                <form action="">
                    <div class="subscribe-row">
                        <input type="text" placeholder="Enter your email for exciting publishing news and updtes">
                        <input type="submit" value="Enter">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bottom-panel">
        <div class="container">
            <p class="copy">Copyright 2019 All Rights Reserved LegalBoxPublishing.com</p>
            <nav class="nav-bottom">
                <ul>
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Order Status</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
</div>

<script src="//unpkg.com/jquery@3.2.1/dist/jquery.min.js"></script>
<script src="{{ asset('js/jcf.js') }}"></script>
<script src="{{ asset('js/jcf.checkbox.js') }}"></script>
<script src="{{ asset('js/jcf.radio.js') }}"></script>
<script src="{{ asset('js/jcf.select.js') }}"></script>
<script src="{{ asset('js/jcf.file.js') }}"></script>
<!-- build:js -->
<script src="{{ asset('js/main.min.js') }}"></script>
<!-- endbuild -->
</body>

</html>