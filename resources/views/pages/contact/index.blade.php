@include('template-parts.header')
<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image13.jpg);"></div>
            <div class="container">
                <div class="title-holder line-decor">
                    <h2>Our team is ready, willing and able. Let’s Talk!</h2>
                    <p>We implement our expertise into every LLC to get you the lowest cost available anywhere!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="started-section contact-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder" style="background-image: url(/images/image14.jpg);">
                    <div class="info-block">
                        <h3>Let’s Talk Publishing</h3>
                        <div class="title-box">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
                <div class="contact-offset">
                    <span class="contact-title line-decor">Please fill out this short form below, and one of our reps will reach out within 24 business hours</span>
                    <div class="contact-block">
                        <div class="contact-column">
                            <ul class="contact-list">
                                <li>
                                    <h4>Headquarters</h4>
                                    <address>
                                        <p>1007 Park Ave</p>
                                        <p>New York N.Y.</p>
                                        <p>10036</p>
                                    </address>
                                </li>
                                <li>
                                    <h4>Call Us</h4>
                                    <a href="tel:7189882323">718.988.2323</a>
                                </li>
                                <li>
                                    <h4>Emil us</h4>
                                    <a href="mailto:&#069;&#120;&#112;&#101;&#114;&#116;&#064;&#108;&#108;&#099;&#112;&#117;&#098;&#108;&#105;&#115;&#104;&#105;&#110;&#103;&#111;&#102;&#110;&#121;&#046;&#099;&#111;&#109;">&#069;&#120;&#112;&#101;&#114;&#116;&#064;&#108;&#108;&#099;&#112;&#117;&#098;&#108;&#105;&#115;&#104;&#105;&#110;&#103;&#111;&#102;&#110;&#121;&#046;&#099;&#111;&#109;</a>
                                </li>
                            </ul>
                            <div class="img-holder">
                                <img src="/images/image15.jpg" alt="image description">
                                <i class="icon-email"></i>
                            </div>
                            <div class="additional-box">
                                <p>We are here to help you with any of your LLC Publishing concerns</p>
                                <a href="mailto:&#0101;&#120;&#112;&#101;&#114;&#116;&#064;&#108;&#108;&#099;&#112;&#117;&#098;&#108;&#105;&#115;&#104;&#105;&#110;&#103;&#111;&#102;&#110;&#121;&#046;&#099;&#111;&#109;">&#0101;&#120;&#112;&#101;&#114;&#116;&#064;&#108;&#108;&#099;&#112;&#117;&#098;&#108;&#105;&#115;&#104;&#105;&#110;&#103;&#111;&#102;&#110;&#121;&#046;&#099;&#111;&#109;</a>
                            </div>
                        </div>
                        <div class="form-column">
                            <form action="{{ route('contact.store') }}" method="post" class="provide-form">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Company Name (optional)</label>
                                    <input type="text" name="company_name">
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Your comment / request</label>
                                    <textarea name="comment"></textarea>
                                </div>
                                <div class="captcha-box">
                                    <div class="g-recaptcha" data-sitekey="6LfdaHwUAAAAAKbCZJDJAaqHLapFniBFU2psJhd3" data-callback="recaptchaCallback"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')