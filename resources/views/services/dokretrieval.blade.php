@extends('layouts.service')
{{--@section('title', 'Step 2')--}}
@section('content')
    <section class="started-section document-section">
        <div class="container">
            <div class="started-block">
                <div class="started-holder" style="background-image: url(images/image10.jpg);">
                    <div class="info-block">
                        <h3>We will retrieve your docs from the archives</h3>
                        <div class="title-box">
                            <h2>Document Retrieval</h2>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-header">
                        <i class="icon-arrow-down"></i>
                        <h3>Please provide the entity information</h3>
                    </div>
                    <div action="" class="provide-form form-body">
                        <div class="form-column">
                            <div class="row">
                                <div class="column-6">
                                    <div class="form-group">
                                        <label>Entity Name</label>
                                        <input type="text" name="entity_name">
                                    </div>
                                </div>
                                @if(isset($entityEndings))
                                <div class="column-4">
                                    <div class="form-group">
                                        <label>Ending</label>
                                        <select name="entity_ending">
                                            <option value="" selected disabled>Please Select</option>
                                            @foreach($entityEndings as $entityEnding)
                                                <option value="{{$entityEnding}}">{{$entityEnding}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Date of formation <small>(optional)</small></label>
                                <input type="text" name="date_of_formation">
                            </div>
                            <div class="form-group">
                                <label>County of formation <small>(optional)</small></label>
                                <input type="text" name="county_of_formation">
                            </div>
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" name="your_name">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="yout_email">
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="tel" name="your_phone">
                            </div>
                        </div>
                        <div class="additional-column">
                            <div class="quiz-block">
                                <div class="form-group">
                                            <span class="label light">
                                                Was LegalBox.com the company facilitating your publication?
                                            </span>
                                    <ul class="radio-list row">
                                        <li>
                                            <input type="radio" id="yes" name="facilitating" value="yes" onclick="jQuery('.facilitating-yes').show();jQuery('.facilitating-no').hide();">
                                            <label for="yes" class="light">Yes</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="no" name="facilitating" value="no" onclick="jQuery('.facilitating-yes').hide();jQuery('.facilitating-no').show();">
                                            <label for="no" class="light">No</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="facilitating-no" style="display: none;">
                                    <div class="form-group">
                                        <span class="additional-info" ><b>You are ordering your</b><br><b>Certificate of Publication: $45</b></span>
                                    </div>
                                    <div class="form-group">
                                        <ul class="radio-list">
                                            <li>
                                                <input type="checkbox" id="certified" value="certified" name="documents[]" data-price="10" data-price_label="Certificate Certified">
                                                <label for="certified" class="light">I need my certificate certified</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="facilitating-yes" style="display: none;">
                                    <div class="form-group">
                                        <label class="light">Approximage Date of filing:</label>
                                        <div class="row date-row">
                                            <div class="column-3">
                                                <input type="number" maxlength="2" placeholder="MM" name="approximage_month" required>
                                            </div>
                                            <div class="column-3">
                                                <input type="number" maxlength="2" placeholder="DD" name="approximage_day" required>
                                            </div>
                                            <div class="column-3">
                                                <input type="number" minlength="4" maxlength="4" pattern="\d{4}" placeholder="Year" name="approximage_year" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="approximage_date">
                                    </div>
                                    <div class="form-group">
                                        {{-- TODO if more 90 day--}}
                                        <span class="additional-info more-thithy-month" style="display: none">Since this order was placed more than 3 months ago, there is a $45 dollar retrieval fee for any or all documents below.</span>
                                        {{-- TODO if less 90 day--}}
                                        <span class="additional-info less-thithy-month" style="display: none">Since this order was placed less than 3 months ago, there will be no charge for the retrieval of your documents. </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Please select the documents you need today:</label>
                                    </div>
                                    <div class="form-group">
                                        <ul class="radio-list">
                                            <li>
                                                <input type="checkbox" id="affidavits" value="affidavits" name="documents[]" data-price="45" data-price_label="Affidavits of Publication">
                                                <label for="affidavits" class="light">Affidavits of Publication</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="certificate" value="certificate" name="documents[]" data-price="0" data-price_label="Certificate of Publication">
                                                <label for="certificate" class="light">Certificate of Publication</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="publishing" value="publishing" name="documents[]" data-price="0" data-price_label="Publishing Filing Receipt">
                                                <label for="publishing" class="light">Publishing Filing Receipt</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="total">Total $<span class="total-box-price">0</span></span>
                            </div>
                        </div>
                        <div class="total-box">
                            <p>Total: $<span class="total-box-price">0</span></p>
                            <button type="submit" class="btn">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
