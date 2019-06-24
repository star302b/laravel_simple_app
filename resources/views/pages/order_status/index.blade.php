@include('template-parts.header')
<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image04.jpg);"></div>
            <div class="container">
                <div class="title-holder line-decor">
                    <h2>Inquire about  the status of your publishing order</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder" style="background-image: url(/images/image05.jpg);">
                    <div class="info-block">
                        <h3>Let’s look up your publishing status</h3>
                        <div class="title-box">
                            <h2>Order Status</h2>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-header">
                        <i class="icon-arrow-down"></i>
                        <h3>Please provide the entity information</h3>
                    </div>
                    <div class="form-body">
                        <div class="form-column">
                            <form method="post" action="{{ route('order-status.save') }}" enctype="multipart/form-data" class="provide-form">
                                @csrf
                                <div class="form-group">
                                    <label>Entity Name</label>
                                    <input type="text" name="entity_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="email" name="order-email" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Approximate date of your publishing order</label>
                                    <div class="row date-row">
                                        <div class="column-3">
                                            <input type="tel" name="month" maxlength="2" placeholder="MM">
                                        </div>
                                        <div class="column-3">
                                            <input type="tel" name="day" maxlength="2" placeholder="DD">
                                        </div>
                                        <div class="column-3">
                                            <input type="tel" name="year" maxlength="2" placeholder="YY">
                                        </div>
                                    </div>
                                </div>
                                <span class="info">We will look into your order status immediately and get back to you within 1 business day</span>
                                <div class="captcha-block">
                                    <span class="captcha-title">Captcha</span>
                                    <div class="captcha-box">
                                        <div class="g-recaptcha" data-sitekey="6LfdaHwUAAAAAKbCZJDJAaqHLapFniBFU2psJhd3" data-callback="recaptchaCallback"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    </div>
                                </div>
                                <button type="submit" id="btnSubmit" class="btn hidden">Submit</button>
                            </form>
                        </div>
                        <div class="additional-column">
                            <div class="img-holder">
                                <img src="/images/image07.jpg" alt="image description">
                            </div>
                            <div class="info-box">
                                <p>We implement our expertise into every LLC publication to get you superior results, expeditiously and smoothly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')