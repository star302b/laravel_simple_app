@include('template-parts.header')
<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image04.jpg);"></div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder" style="background-image: url(/images/image17.jpg);">
                    <div class="info-block">
                        <div class="title-box">
                            <h2>Thank You!</h2>
                        </div>
                    </div>
                </div>
                <div class="thanks-section form-section">
                    <div class="thanks-header">
                        <h4>Thank You! Your order has been received!</h4>
                        <i class="icon-arrow-down green"></i>
                    </div>
                    <div class="form-body">
                        <div class="form-column">
                            <div class="message-box">
                                <p><span class="title">Dear {{ $name }}</span></p>
                                <p>We will look up the status of your entity <a href="#">{{ $entity_name }}</a> and get back you soon.</p>
                            </div>
                            <p>Should you have any additional concerns<br>feel free to email <a href="mailto:service@llbpublishingofny.com">service@llbpublishingofny.com</a> or call <a href="tel:5163360900">516.336.0900</a>.</p>
                        </div>
                        <div class="additional-column">
                            <div class="img-holder">
                                <img src="/images/image18.jpg" alt="image description">
                            </div>
                            <div class="info-box">
                                <p>We implement our expertise into every LLC to get you the lowest  cost available anywhere!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')