@include('template-parts.header')
<main id="main" class="home-page">
    <section class="intro-section">
        @include('template-parts.intro-header')

        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image02.jpg);"></div>
            <div class="container">
                <div class="tooltip-box">
                    <p>We’ll <strong>MEET</strong> or <strong>BEAT any</strong> price</p>
                    <span class="tooltip price-tooltip">
                                <a href="#" class="tool-opener js-tool-opener">i</a>
                               <div class="tool-popup">
                                    <a href="#" class="close"></a>
                                   <h3>Our Meet or Beat Policy</h3>
                                   <ul class="popup-list">
                                       <li>LegalBox Publishing will <strong>‘Meet or Beat’</strong> any price you get from other service companies.</li>
                                       <li>We will <strong>‘Meet or Beat’</strong>  the price, regardless of the price gap.</li>
                                       <li>We will also <strong>‘Meet or Beat’</strong>  an exclusive promotional rate.</li>
                                       <li>Please supply a written proposal with that price offer. It can be sent via E-mail, mail, or fax. You can also provide a link to that company’s online prage or published ad showcasing that price offer.</li>
                                       <li>Once we matched a rate, the order is final, no further matching or discounts can be applied.</li>
                                       <li>Prior to requesting a <strong>‘Meet or Beat’</strong> price match, please make sure that the rate includes the full NY LLC Publishing compliance service. Please note that our price is for the all inclusive process, from A to Z. Nevertheless, the extraordinary service and professionalism you will experience with LegalBox Publishing  is certainly unbeatable</li>
                                   </ul>
                                   <h3>10 Day Guarantee</h3>
                                   <ul class="popup-list">
                                       <li>Should you receive a lower quote within 10 days after placing your order with LegalBox Publishing, rest assured, we will <strong>‘Meet or Beat’</strong>  that price, while refunding you the difference.</li>
                                       <li>If we are unable to <strong>‘Meet or Beat’</strong>  that rate, we will refund you 100% of what you paid us, thus terminating the process.</li>
                                   </ul>
                                   <div class="btn-box">
                                       <a href="{{ route('price-match.index') }}" class="btn btn-large">Price match request</a>
                                   </div>
                               </div>
                           </span>
                </div>
                <div class="title-holder line-decor">
                    <h2>The lowest prices for your full LLC publishing compliance!</h2>
                    <p>One flat rate covers the covers the entire process from A to Z <a href="#" class="tooltip">i</a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block" id="publishing-start-form">
                <div class="started-holder" style="background-image: url(/images/image03.jpg);">
                    <ul class="additional-list">
                        <li>
                            <i class="icon-clock"></i>
                            <h5>Applying time:</h5>
                            <p>Less than <strong>3</strong> minutes</p>
                        </li>
                        <li>
                            <i class="icon-arrows-reverse"></i>
                            <h5>Our Initiation of process:</h5>
                            <p><strong>Immediately</strong> upon receiving your order</p>
                        </li>
                    </ul>
                    <div class="form-column">
                        <h1>Let’s Get Started:</h1>
                        <form action="{{ route('service.routeHomePage') }}" method="post" class="started-form">
                            @csrf
                            <div class="row">
                                <div class="column-7">
                                    <div class="form-group">
                                        <label>Entity Name</label>
                                        <input type="text" name="entity_name" required>
                                    </div>
                                </div>
                                <div class="column-3">
                                    <div class="form-group">
                                        <label>Entity Ending</label>
                                        <select name="entity_ending" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach($entityEndings as $entityEnding)
                                                <option value="{{ $entityEnding }}">{{ $entityEnding }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column-select form-group">
                                    <select name="county">
                                        <option value="" selected disabled>Select Your County</option>
                                        @foreach($countyList as $countyItemKey => $countyItem)
                                            <option value="{{ $countyItemKey }}" >{{ $countyItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="column-tooltip form-group">
                                            <span class="tooltip">
                                                <a href="#" class="tool-opener js-tool-opener">i</a>
                                                <div class="tool-popup">
                                                    <a href="#" class="close"></a>
                                                    <p>County  of LLC, as it is listed in the formation document.</p>
                                                    <p>If you are unsure which county you have listed with the state during formation, please select the option <strong>“Not Sure”</strong> in the <strong>“Select Your County”</strong>  drop down, and we will retrieve it from the state free of charge.</p>
                                                </div>
                                            </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-large">Continue ></button>
                        </form>
                    </div>
                    <a href="#" class="inclusive-holder">
                        All Inclusive Process <span class="tooltip js-tool-opener">i</span>
                        <div class="tool-popup">
                            <span class="close"></span>
                            <h4>The Legal Box All Inclusive Publishing Process:</h4>
                            <ol class="inclusive-list">
                                <li>Daily and weekly newspaper designations with the local county clerk  (as is mandated by the New York State LLC Publishing Law).</li>
                                <li>Preparation of the ad notice. We will generate the text and legal language for the Legal Notice to fit requirements in accordance with the NYS Publishing Law.</li>
                                <li>Placement of ad notices in the two county designated newspapers.</li>
                                <li>Payment of all newspaper LLC publication fees.</li>
                                <li>Affidavits of Publication issued by both newspapers upon completion of  the 6 week publishing run.</li>
                                <li>Filing of the Certificate of Publication with the NY Secretary of State.</li>
                                <li>Paying disbursements to the New York State.</li>
                                <li>Sending you the Publishing Filing Receipt issued by the New York Secretary of State. This serves as confirmation of the LLC’s full compliance with New York Publishing Law.</li>
                            </ol>
                        </div>
                    </a>
                </div>
                <div class="control-block">
                    <div class="column-3">
                        <a href="{{ route('free-lookup.index') }}" class="control-box">
                            <i class="icon-search"></i>
                            <div class="title-box">
                                <h2>Free Lookup</h2>
                                <p>Has your entity been published?</p>
                            </div>
                        </a>
                    </div>
                    <div class="column-3">
                        <a href=" {{ route('service.docretrieval') }}" class="control-box">
                            <i class="icon-download"></i>
                            <div class="title-box">
                                <h2>Publishing</h2>
                                <h3>Document Retrieval</h3>
                            </div>
                        </a>
                    </div>
                    <div class="column-3">
                        <a href="{{ route('order-status.get') }}" class="control-box">
                            <i class="icon-status"></i>
                            <div class="title-box">
                                <h2>Check</h2>
                                <h3>Order Status</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="card-section">
        <div class="container">
            <div class="card-list">
                <div class="card card-large popup-parent">
                    <div class="card-cont">
                        <div class="card-icon">
                            <i class="icon-date"></i>
                            <p>
                                <b> 120?</b>
                            </p>
                        </div>
                        <div class="card-info">
                            <p>Already passed the 120 day mark for publishing?</p>

                            <div class="align-box">
                                <strong class="card-info-title">No worries!</strong>
                                <div class="link-box">
                                    <a href="#" class="link-underline js-tool-opener">More </a>
                                    <span class="tool-holder">
                                        <i class="icon-arrow-right js-tool-opener"></i>
                                        <div class="tool-popup">
                                            <div>LegalBox Publishing will initiate publication <strong class="box-underline">immediately, <i class="underline"></i></strong> thus providing a commencement letter, which is sufficient proof of publishing compliance, while the LLC is publishing. This is an acceptable publishing proof until final docs become available. </div>
                                            <a href="{{ route('home-page') }}#publishing-start-form" class="popup-link">Lets Do It! <i class="icon-arrow-right "></i></a>
                                            <a href="#" class="close"></a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- POPUP -->
                        <div class="popup-local">
                            <div class="box">
                                <h3 class="title">120?</h3>
                                <div class="cont">
                                    <h2 class="main-title">
                                        <b>Oops!</b>
                                        <strong class="">You are at / over the 120 days, but no worries!</strong>
                                    </h2>
                                    <p>LLCPublishingofNY will initiate publication immediately, thus providing a commencement letter, which is sufficient proof of publishing compliance while the LLC is publishing. This is your provisional publishing proof until final docs become available. </p>
                                </div>
                                <div class="link-container">
                                    <a href="{{ route('home-page') }}#publishing-start-form" class="link-underline">Publish now <i class="icon-arrow-right-3"></i></a>
                                </div>
                            </div>
                            <a href="#" class="close"></a>
                        </div>
                    </div>
                </div>
                <div class="card popup-parent">
                    <div class="card-cont">
                        <div class="card-icon">
                            <p>
                                <b> 120 Days</b>
                                <strong>Calculator</strong>
                            </p>
                            <i class="icon-calculate"></i>
                        </div>
                        <div class="card-info">
                            <p>Enter the date of formation and we will calculate when your 120 date is due.</p>
                            <div class="link-box">
                                <a href="#" class="link-underline js-popup-opener">
                                    Calculate Now
                                </a>
                                <span class="tool-holder">
                                    <i class="icon-arrow-right js-popup-opene"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- POPUP -->
                    <div id="popap-main-clculator" class="popup-local @if(isset($_GET['open_calculator']))active-popup @endif">
                        <div class="box">
                            <h3 class="title"><i class="icon-calculate"></i> 120?</h3>
                            <div class="box-cont box-cont-1 box-show-more-than-time" style="display: none;">
                                <div class="cont">
                                    <h2 class="main-title">
                                        <b>Oops!</b>
                                        <strong>You are at / over the 120 days, but no worries!</strong>
                                    </h2>
                                    <p>LLCPublishingofNY will initiate publication immediately, thus providing a commencement letter, which is sufficient proof of publishing compliance while the LLC is publishing. This is your provisional publishing proof until final docs become available. </p>
                                </div>
                                <div class="link-container">
                                    <a href="{{ route('home-page') }}#publishing-start-form" class="link-underline">Publish now <i class="icon-arrow-right-3"></i></a>
                                </div>
                            </div>
                            <div class="box-cont box-cont-2 box-show-less-than-time" style="display: none;">
                                <div class="cont">
                                    <h2 class="main-title-2">
                                        <strong>You are at day <span class="how-match-days-count"></span>!</strong>
                                    </h2>
                                    <p>In order to complete the Publishing Compliance in a timely manner, it is strongly advised that you initiate the process now!</p>
                                </div>
                                <a href="{{ route('home-page') }}#publishing-start-form" class="link-underline">Publish Now! <i class="icon-arrow-right-3"></i></a>
                            </div>
                            <div class="box-cont box-cont-3">
                                <form action="" class="popup-form twentin-calculator">
                                    <div class="form-group">
                                        <label>Entity name</label>
                                        <input type="text" name="entity-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of filing</label>
                                        <input type="text" class="datepicker-input" name="date-calculator" required>
                                        <div class="datepicker-box"></div>
                                    </div>
                                    <div class="btn-holder">
                                        <button type="submit" class="btn btn-2">Calculate</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="#" class="close"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="help-section">
        <div class="container">
            <div class="help-box">
                <div class="help-image">
                    <div class="tooltip-box tooltip-light">
                        <p>We are Ready, Willing and Able!</p>
                    </div>
                    <div class="help-image-box">
                        <div class="image">
                            <img src="images/woman-with-laptope.jpg" alt="woman with laptope">
                        </div>
                    </div>
                </div>
                <div class="help-info">
                            <span class="tooltip-box tooltip-outline">
                                <i class="icon-email"></i>
                            </span>
                    <div>
                        We are here to help you with all <br/>
                        your LLC Publication concerns
                    </div>
                    <a href="mailto:expert@legalboxpublishing.com" class="link-decor">
                        <span>expert@legalboxpublishing.com</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="objective-section">
        <div class="container">
            <div class="objective-desc">
                <h4>
                    Every LLC in NY must publish, <br />
                    IT’S THE LAW!
                </h4>
                <p>As per the "NY State LLC Publishing Law", an LLC (Limited Liability
                    Company) formed in NY State, or a foreign LLC authorized to
                    conduct business in NY State is required to publish the information
                    of the LLC in two local newspapers within 120 days following its
                    formation. Failure to comply with the New York publishing
                    requirement may cause suspension of the LLC! Whether you
                    recently formed a New York LLC (Limited Liability Company)
                    or had formed one in the past, you need to comply with the
                    NY State LLC Publishing requirement.
                </p>
            </div>
            <div class="objective-list">
                <h3>Our Objective:</h3>
                <ul>
                    <li>
                        <i class="icon-email"></i>
                        <span>Deliver a most efficient NY LLC Publishing service</span>
                    </li>
                    <li>
                        <i class="icon-telegram"></i>
                        <span>Make it most easy and simple</span>
                    </li>
                    <li>
                        <i class="icon-feature"></i>
                        <span>Reduce fees to the lowest bracket</span>
                    </li>
                    <li>
                        <i class="icon-clock"></i>
                        <span>Quick turnaround</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="publish-section">
        <div class="container">
            <i class="icon-papper publish-icon"></i>
            <h2 class="line-decor">
                <a href="#publishing-start-form">
                    <span>Publish Now </span>
                    <i class="icon-arrow-right-bold"></i>
                </a>
            </h2>
        </div>
    </section>
</main>
@include('template-parts.footer')