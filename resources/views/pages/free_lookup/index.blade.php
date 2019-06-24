@include('template-parts.header')
<main id="main">
    <section class="intro-section">
        @include('template-parts.intro-header')
        <div class="intro-body">
            <div class="bg-image" style="background-image: url(/images/image08.jpg);"></div>
            <div class="container">
                <div class="title-holder line-decor">
                    <h2>Inquire whether your entity has been published, FREE!</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="started-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder free-label" style="background-image: url(/images/image09.jpg);">
                    <div class="info-block">
                        <h3>Has my entity been published?</h3>
                        <div class="title-box">
                            <h2>Free Look Up</h2>
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
                            <form action="{{ route('free-lookup.thankyou') }}" method="post" class="provide-form">
                                @csrf
                                <div class="row">
                                    <div class="column-6">
                                        <div class="form-group">
                                            <label>Entity Name</label>
                                            <input type="text" name="entity_name" required>
                                        </div>
                                    </div>
                                    <div class="column-4">
                                        <div class="form-group">
                                            <label>Ending</label>
                                            <select name="entity_ending" required>
                                                <option value="" selected disabled>Please Select</option>
                                                @foreach($entityEndings as $entityEnding)
                                                    <option value="{{$entityEnding}}">{{$entityEnding}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date of formation <small>(optional)</small></label>
                                    <input type="text" name="data_of_formation">
                                </div>
                                <div class="form-group">
                                    <label>County of formation <small>(optional)</small></label>
                                    <input type="text" name="county_of_formation">
                                </div>
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" name="contact_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone" required>
                                </div>
                                <div class="submit-box">
                                    <div class="submit-info">
                                        <h4>Please inquire with the NY Department of State and notify me the status.</h4>
                                        <p>My Fee: $0.00</p>
                                    </div>
                                    <button type="submit"></button>
                                </div>
                            </form>
                        </div>
                        <div class="additional-column">
                            <div class="img-holder">
                                <img src="/images/image10.jpg" alt="image description">
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