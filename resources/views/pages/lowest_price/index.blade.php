@include('template-parts.header')
<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image16.jpg);"></div>
            <div class="container">
                <div class="title-holder line-decor">
                    <h2>We will meet or beat any price! Guaranteed!</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder best-price-light" style="background-image: url(/images/image17.jpg);">
                    <div class="info-block">
                        <h3>Provide some details, and we’ll match it!</h3>
                        <div class="title-box">
                            <h2>Price Match Guarantee</h2>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-header">
                        <i class="icon-arrow-down"></i>
                        <h3>Please provide the entity information</h3>
                    </div>
                    <div class="form-body">
                        <div class="warning-holder">
                            <i class="icon-arrow-down"></i>
                            <p>We would appreciate your answers to the following simple questions. This will give us a closer look of the authenticity of the lower quote so we can maintain our commitment of providing business owners with guaranteed lowest rates.</p>
                            <img src="/images/image18.png" class="decor" alt="image description">
                        </div>
                        <form method="post" action="{{ route('price-match.thankyou') }}" class="priceMatch-form">
                            @csrf
                            <div class="form-row">
                                <div class="column-5">
                                    <div class="form-group">
                                        <label>Entity Name & Ending</label>
                                        <small>i,e, starmedia LLP</small>
                                        <input type="text" placeholder="Sigma6 Productions" name="entity_name_ending" required>
                                    </div>
                                    <div class="form-group">
                                        <label>County</label>
                                        <input type="text" placeholder="Saratoga" name="county" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Price quote you received:</label>
                                        <input type="text" placeholder="$" name="price" required>
                                    </div>
                                    <div class="form-group">
                                        <span class="label">Was this quote for the above entity name and county?</span>
                                        <ul class="radio-list row">
                                            <li>
                                                <input type="radio" id="yes" value="yes" name="quote">
                                                <label for="yes">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="no" value="no" name="quote">
                                                <label for="no">No</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="column-4">
                                    <div class="additional-box best-price-light" style="background-image: url(/images/image10.jpg);">
                                        <span class="text">
                                            WE WILL <strong class="big">MEET</strong> OR <strong class="big">BEAT<br><strong class="bigest">ANY PRICE!</strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="column-5">
                                    <div class="list-box form-group">
                                        <h3 class="list-title">Were you assured the 3 items below:</h3>
                                        <ol class="assured-list">
                                            <li>County clerk designation for this particular LLC? <small>(Mandatory by NY state law!)</small></li>
                                            <li>FULL payment towards two newspaper disbursements?</li>
                                            <li>Payments towards filing with the NY DOS and the DOS filing receipt?</li>
                                        </ol>
                                        <ul class="radio-list row">
                                            <li>
                                                <input type="radio" value="yes" id="yes2" name="asurred">
                                                <label for="yes2">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" value="no" id="no2" name="asurred">
                                                <label for="no2">No</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="column-4">
                                    <div class="form-group">
                                        <label class="comment-label">Comments</label>
                                        <textarea name="comment"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="column-5">
                                    <div class="form-group">
                                        <label>Contact Name</label>
                                        <input type="text" name="contact_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="contact_email" required>
                                    </div>
                                </div>
                                <div class="column-4">
                                    <div class="form-group">
                                        <label>Name of company offering above rate</label>
                                        <input type="text" name="name_of_company">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <span class="additional-text label column">Please allow 1 hour (within hours of operation 9-5 EST) for LegalBoxPublishing to review and BEAT that price. We will get back to you via email.</span>
                            </div>
                            <div class="form-row btn-box">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('template-parts.footer')