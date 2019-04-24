@extends('fronts.front')
@section('content')
<div class="main-content container contact" role="main">
    <div class="row">
        <div class="col-xs-12"></div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 content">
            <section class="section main-content" id="region-content">
                <h1 class="title" id="page-title">Contact Us</h1>
               
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">
                        <div class="content">
                            <div id="node-2596" class="node node-webform node-promoted clearfix" about="/contact-us" typeof="sioc:Item foaf:Document"> <span property="dc:title" content="Contact Us" class="rdf-meta element-hidden"></span>
                                <div class="submitted"> <span property="dc:date dc:created" content="2017-01-19T03:17:43+00:00" datatype="xsd:dateTime" rel="sioc:has_creator">Submitted by <span class="username" xml:lang="" about="/users/admin" typeof="sioc:UserAccount" property="foaf:name" datatype="">admin</span> on Thu, 01/19/2017 - 03:17</span>
                                </div>
                                <div class="content">
                                    <div class="field field-name-field-body field-type-text-with-summary field-label-hidden">
                                        <div class="field-items">
                                            <div class="field-item even">
                                                <h2><strong>Contact Us</strong></h2>
                                                <p>If you would like to contact us please fill in your details below and a member of our team will get in touch shortly.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="webform-client-form webform-client-form-2596" action="/contact-us" method="post" id="webform-client-form-2596" accept-charset="UTF-8">
                                        <div>
                                            <div class="form-item webform-component webform-component-textfield webform-component--name webform-container-inline">
                                                <label for="edit-submitted-name">Name <span class="form-required" title="This field is required.">*</span></label>
                                                <input required="required" class="form-control form-text required" type="text" id="edit-submitted-name" name="submitted[name]" value="" size="60" maxlength="128" />
                                            </div>
                                            <div class="form-item webform-component webform-component-email webform-component--email-address webform-container-inline">
                                                <label for="edit-submitted-email-address">Email Address <span class="form-required" title="This field is required.">*</span></label>
                                                <input required="required" class="email form-control form-text form-email required" type="email" id="edit-submitted-email-address" name="submitted[email_address]" size="60" />
                                            </div>
                                            <div class="form-item webform-component webform-component-textfield webform-component--telephone-number webform-container-inline">
                                                <label for="edit-submitted-telephone-number"> Telephone Number </label>
                                                <input class="form-control form-text" type="text" id="edit-submitted-telephone-number" name="submitted[telephone_number]" value="" size="60" maxlength="128" />
                                            </div>
                                            <div class="form-item webform-component webform-component-select webform-component--contact-reason webform-container-inline">
                                                <label for="edit-submitted-contact-reason">Contact Reason <span class="form-required" title="This field is required.">*</span></label>
                                                <select required="required" class="form-control form-select required" id="edit-submitted-contact-reason" name="submitted[contact_reason]">
                                                    <option value="" selected="selected">- None -</option>
                                                    <option value="1"> Advertising</option>
                                                    <option value="2"> Website Feedback</option>
                                                    <option value="3"> General Enquiry</option>
                                                </select>
                                            </div>
                                            <div class="form-item webform-component webform-component-textarea webform-component--message webform-container-inline">
                                                <label for="edit-submitted-message">Message <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="form-textarea-wrapper resizable">
                                                    <textarea required="required" class="form-control form-textarea required" id="edit-submitted-message" name="submitted[message]" cols="60" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="details[sid]" />
                                            <input type="hidden" name="details[page_num]" value="1" />
                                            <input type="hidden" name="details[page_count]" value="1" />
                                            <input type="hidden" name="details[finished]" value="0" />
                                            <input type="hidden" name="form_build_id" value="form-xO3CQLEftywddz2xfdcIwtIpN61VFwkhxKjDyKY-SWE" />
                                            <input type="hidden" name="form_id" value="webform_client_form_2596" />
                                            <div class="captcha">
                                                <input type="hidden" name="captcha_sid" value="33039" />
                                                <input type="hidden" name="captcha_token" value="05104f16ffe13435c7332daf4aaf69d9" />
                                                <div class="form-item form-type-textfield form-item-captcha-response">
                                                    <label for="edit-captcha-response">Math question <span class="form-required" title="This field is required.">*</span></label> <span class="field-prefix">19 + 1 = </span>
                                                    <input class="form-control form-text required" type="text" id="edit-captcha-response" name="captcha_response" value="" size="4" maxlength="2" />
                                                    <div class="description">Solve this simple math problem and enter the result. E.g. for 1+3, enter 4.</div>
                                                </div>
                                            </div>
                                            <input class="webform-submit button-primary btn btn-info form-submit" type="submit" name="op" value="Submit" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection