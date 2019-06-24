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
                        <h4>Thank You! Your price match request been received!</h4>
                        <i class="icon-arrow-down green"></i>
                    </div>
                    <div class="form-body">
                        <div class="form-column">
                            <div class="message-box">
                                <p><span class="title">Dear {{ $contact_name }}</span></p>
                                <p>Thank your for giving us the opportunity to serve you.<br>Your price match request for publishing your entity <a href="#">{{ $entity_name_ending }}</a> in <a href="#">{{ $county }} County</a> has been received, and will notify you via email.</p>
                                <p>Your order reference is: <a href="#">{{ $entity_name_ending }}</a>.</p>
                                <p>A confirmation of your price match request has been sent to your email.</p>
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