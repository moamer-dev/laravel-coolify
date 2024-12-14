<div class="card mb-5 mb-xl-10">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
            <!--begin::Icon-->
            <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                    <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                        <a href="#" class="fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add
                            Payment Method</a>.
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-7">
                <!--begin::Heading-->
                <h3 class="mb-2">Active until Dec 09, 2024</h3>
                <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">We will send you a notification upon
                    Subscription expiration</p>
                <!--end::Heading-->
                <!--begin::Info-->
                <div class="fs-5 mb-2">
                    <span class="text-gray-800 fw-bold me-1">$24.99</span>
                    <span class="text-gray-600 fw-semibold">Per Month</span>
                </div>
                <!--end::Info-->
                <!--begin::Notice-->
                <div class="fs-6 text-gray-600 fw-semibold">Extended Pro Package. Up to 100 Agents &amp; 25 Projects
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-5">
                <!--begin::Heading-->
                <div class="d-flex text-muted fw-bold fs-5 mb-3">
                    <span class="flex-grow-1 text-gray-800">Users</span>
                    <span class="text-gray-800">86 of 100 Used</span>
                </div>
                <!--end::Heading-->
                <!--begin::Progress-->
                <div class="progress h-8px bg-light-primary mb-2">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Description-->
                <div class="fs-6 text-gray-600 fw-semibold mb-10">14 Users remaining until your plan requires update
                </div>
                <!--end::Description-->
                <!--begin::Action-->
                <div class="d-flex justify-content-end pb-0 px-0">
                    <a href="#" class="btn btn-light btn-active-light-primary me-2"
                        id="kt_account_billing_cancel_subscription_btn">Cancel Subscription</a>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Card body-->
</div>
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header card-header-stretch pb-0">
        <!--begin::Title-->
        <div class="card-title">
            <h3 class="m-0">Payment Methods</h3>
        </div>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar m-0">
            <!--begin::Tab nav-->
            <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                <!--begin::Tab item-->
                <li class="nav-item" role="presentation">
                    <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab"
                        role="tab" href="#kt_billing_creditcard" aria-selected="true">Credit / Debit Card</a>
                </li>
                <!--end::Tab item-->
                <!--begin::Tab item-->
                <li class="nav-item" role="presentation">
                    <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab"
                        href="#kt_billing_paypal" aria-selected="false" tabindex="-1">Paypal</a>
                </li>
                <!--end::Tab item-->
            </ul>
            <!--end::Tab nav-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Tab content-->
    <div id="kt_billing_payment_tab_content" class="card-body tab-content">
        <!--begin::Tab panel-->
        <div id="kt_billing_creditcard" class="tab-pane fade active show" role="tabpanel"
            aria-labelledby="kt_billing_creditcard_tab">
            <!--begin::Title-->
            <h3 class="mb-5">My Cards</h3>
            <!--end::Title-->
            <!--begin::Row-->
            <div class="row gx-9 gy-6">
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="card">
                    <!--begin::Card-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Info-->
                        <div class="d-flex flex-column py-2">
                            <!--begin::Owner-->
                            <div class="d-flex align-items-center fs-4 fw-bold mb-5">Marcus Morris
                                <span class="badge badge-light-success fs-7 ms-2">Primary</span>
                            </div>
                            <!--end::Owner-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <img src="{{ asset('assets') }}/media/svg/card-logos/visa.svg" alt=""
                                    class="me-4">
                                <!--end::Icon-->
                                <!--begin::Details-->
                                <div>
                                    <div class="fs-4 fw-bold">Visa **** 1679</div>
                                    <div class="fs-6 fw-semibold text-gray-500">Card expires at 09/24</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                data-kt-billing-action="card-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_card">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="card">
                    <!--begin::Card-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Info-->
                        <div class="d-flex flex-column py-2">
                            <!--begin::Owner-->
                            <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jacob Holder</div>
                            <!--end::Owner-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <img src="{{ asset('assets') }}/media/svg/card-logos/american-express.svg"
                                    alt="" class="me-4">
                                <!--end::Icon-->
                                <!--begin::Details-->
                                <div>
                                    <div class="fs-4 fw-bold">Mastercard **** 2040</div>
                                    <div class="fs-6 fw-semibold text-gray-500">Card expires at 10/22</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                data-kt-billing-action="card-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_card">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="card">
                    <!--begin::Card-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Info-->
                        <div class="d-flex flex-column py-2">
                            <!--begin::Owner-->
                            <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jhon Larson</div>
                            <!--end::Owner-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <img src="{{ asset('assets') }}/media/svg/card-logos/mastercard.svg" alt=""
                                    class="me-4">
                                <!--end::Icon-->
                                <!--begin::Details-->
                                <div>
                                    <div class="fs-4 fw-bold">Mastercard **** 1290</div>
                                    <div class="fs-6 fw-semibold text-gray-500">Card expires at 03/23</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3"
                                data-kt-billing-action="card-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_card">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Notice-->
                    <div
                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Important Note!</h4>
                                <div class="fs-6 text-gray-700 pe-7">Please carefully read
                                    <a href="#" class="fw-bold me-1">Product Terms</a>adding
                                    <br>your new payment card
                                </div>
                            </div>
                            <!--end::Content-->
                            <!--begin::Action-->
                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Card</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Tab panel-->
        <!--begin::Tab panel-->
        <div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_paypal_tab"
            data-select2-id="select2-data-kt_billing_paypal">
            <!--begin::Title-->
            <h3 class="mb-5">My Paypal</h3>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-gray-600 fs-6 fw-semibold mb-5">To use PayPal as your payment method, you will need to
                make pre-payments each month before your bill is due.</div>
            <!--end::Description-->
            <!--begin::Form-->
            <form class="form" data-select2-id="select2-data-354-u5e0">
                <!--begin::Input group-->
                <div class="mb-7 mw-350px">
                    <select name="timezone" data-control="select2" data-placeholder="Select an option"
                        data-hide-search="true"
                        class="form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700 select2-hidden-accessible"
                        data-select2-id="select2-data-3-qz84" tabindex="-1" aria-hidden="true"
                        data-kt-initialized="1">
                        <option data-select2-id="select2-data-5-17gt">Select an option</option>
                        <option value="25" data-select2-id="select2-data-357-un6z">US $25.00</option>
                        <option value="50" data-select2-id="select2-data-358-ltgr">US $50.00</option>
                        <option value="100" data-select2-id="select2-data-359-yz2d">US $100.00</option>
                        <option value="125" data-select2-id="select2-data-360-2d4i">US $125.00</option>
                        <option value="150" data-select2-id="select2-data-361-9u89">US $150.00</option>
                    </select><span
                        class="select2 select2-container select2-container--bootstrap5 select2-container--below"
                        dir="ltr" data-select2-id="select2-data-4-8upn" style="width: 100%;"><span
                            class="selection"><span
                                class="select2-selection select2-selection--single form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700"
                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                aria-disabled="false" aria-labelledby="select2-timezone-wf-container"
                                aria-controls="select2-timezone-wf-container"><span
                                    class="select2-selection__rendered" id="select2-timezone-wf-container"
                                    role="textbox" aria-readonly="true" title="Select an option">Select an
                                    option</span><span class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span>
                </div>
                <!--end::Input group-->
                <button type="submit" class="btn btn-primary">Pay with Paypal</button>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Tab panel-->
    </div>
    <!--end::Tab content-->
</div>
