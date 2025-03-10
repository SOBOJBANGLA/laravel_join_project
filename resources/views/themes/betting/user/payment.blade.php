@extends($theme.'layouts.user')
@section('title')
    @lang('Payment')
@endsection

@section('content')
    <section style="padding: 120px 0"id="dashboard">
        <div class="container add-fund pb-20">
            <div class="row feature-wrapper top-0 add-fund">
                @foreach($gateways as $key => $gateway)
                    <div class="col-xl-2 col-lg-3 col-md-4  col-sm-6 col-6 mb-30">
                        <div class="card card-type-1 text-center">

                            <div class="card-icon">
                                <img class="w-100"src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                                     alt="{{$gateway->name}}" class="gateway">
                            </div>

                            <button type="button"
                                    data-id="{{$gateway->id}}"
                                    data-name="{{$gateway->name}}"
                                    data-currency="{{$gateway->currency}}"
                                    data-gateway="{{$gateway->code}}"
                                    data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                    data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                                    data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                                    data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"
                                    class="btn btn-danger btn-block  mt-2 colorbg-1 addFund"
                                    data-backdrop='static' data-keyboard='false'
                                    data-toggle="modal" data-target="#addFundModal">@lang('Pay Now')</button>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('loadModal')
        <div id="addFundModal" class="modal fade addFundModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body ">
                        <div class="payment-form ">
                            @if(0 == $totalPayment)
                                <p class="text-danger depositLimit"></p>
                                <p class="text-danger depositCharge"></p>
                            @endif

                            <input type="hidden" class="gateway" name="gateway" value="">

                            <div class="form-group mb-30">
                                <label>@lang('Plan Name')</label>
                                <input type="text" class=" form-control" value="{{$plan->name}}" readonly>
                            </div>


                            <div class="form-group mb-30">
                                <label>@lang('Amount')</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="amount form-control" name="amount"
                                           @if($totalPayment != null) value="{{$totalPayment}}" readonly @endif>
                                    <div class="input-group-append">
                                        <span class="input-group-text show-currency"></span>
                                    </div>
                                </div>
                                <pre class="text-danger errors"></pre>
                            </div>
                        </div>

                        <div class="payment-info text-center">
                            <img class="w-100"id="loading" src="{{asset('assets/admin/images/loading.gif')}}" alt="..."
                                 class="w-15"/>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary checkCalc">@lang('Next')</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- bKash Payment Modal -->
        <div class="modal fade" id="bkashModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">বিকাশ পেমেন্ট</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="bkashPaymentForm">
                            <div class="form-group">
                                <label>পরিমাণ</label>
                                <input type="text" class="form-control" id="bkashAmount" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>বিকাশ নাম্বার</label>
                                <input type="text" class="form-control" name="phone" placeholder="01XXXXXXXXX">
                                <small class="text-muted">আপনার বিকাশ একাউন্ট নাম্বার দিন</small>
                            </div>

                            <div id="bkashPaymentInfo" class="d-none">
                                <div class="alert alert-info">
                                    <p>১। আপনার বিকাশ অ্যাপ ওপেন করুন</p>
                                    <p>২। Send Money মেনুতে যান</p>
                                    <p>৩। <span id="merchantNumber">XXXXXXXXXX</span> নাম্বারে টাকা পাঠান</p>
                                    <p>৪। নিচে TrxID দিন</p>
                                </div>
                                
                                <div class="form-group">
                                    <label>বিকাশ TrxID</label>
                                    <input type="text" class="form-control" name="bkash_trx_id" placeholder="8N7A6D5EE">
                                    <small class="text-muted">বিকাশ থেকে পাওয়া TrxID দিন</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="initiateBtn" class="btn btn-primary">পেমেন্ট করুন</button>
                        <button type="button" id="verifyBtn" class="btn btn-success d-none">যাচাই করুন</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush


@endsection



@push('script')

    <script>
        $('#loading').hide();
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, amount, gateway;
        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "{{config('basic.currency_symbol')}}";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`@lang('Transaction Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`);

            var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);

            $('.method-name').text(`@lang('Payment By') ${$(this).data('name')} - ${currency}`);
            $('.show-currency').text("{{config('basic.currency')}}");
            $('.gateway').val(currency);

            // amount
        });


        $(".checkCalc").on('click', function () {
            $('.payment-form').addClass('d-none');

            $('#loading').show();
            $('.modal-backdrop.fade').addClass('show');
            amount = $('.amount').val();
            $.ajax({
                url: "{{route('user.addFund.request')}}",
                type: 'POST',
                data: {
                    amount,
                    gateway
                },
                success(data) {

                    $('.payment-form').addClass('d-none');
                    $('.checkCalc').closest('.modal-footer').addClass('d-none');

                    var htmlData = `
                     <ul class="list-group text-center">
                        <li class="list-group-item bg-transparent">
                            <img class="w-100"src="${data.gateway_image}"
                                style="max-width:100px; max-height:100px; margin:0 auto;"/>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Amount'):
                            <strong>${data.amount} </strong>
                        </li>
                        <li class="list-group-item bg-transparent">@lang('Charge'):
                                <strong>${data.charge}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Payable'): <strong> ${data.payable}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Conversion Rate'): <strong>${data.conversion_rate}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <strong>${data.in}</strong>
                        </li>

                        ${(data.isCrypto == true) ? `
                        <li class="list-group-item bg-transparent">
                            ${data.conversion_with}
                        </li>
                        ` : ``}

                        <li class="list-group-item bg-transparent">
                        <a href="${data.payment_url}" class="btn btn-primary   btn-block addFund ">@lang('Pay Now')</a>
                        </li>
                        </ul>`;

                    $('.payment-info').html(htmlData)
                },
                complete: function () {
                    $('#loading').hide();
                },
                error(err) {
                    var errors = err.responseJSON;
                    for (var obj in errors) {
                        $('.errors').text(`${errors[obj]}`)
                    }

                    $('.payment-form').removeClass('d-none');
                }
            });
        });


        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.payment-form').removeClass('d-none');
            $('.checkCalc').closest('.modal-footer').removeClass('d-none');
            $('.payment-info').html(``)
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });

        let currentTrxId = null;
        
        // Handle bKash payment
        if(gateway === 'bkash') {
            $('#bkashAmount').val(amount);
            $('#bkashModal').modal('show');
        }
        
        $('#initiateBtn').on('click', function() {
            let phone = $('input[name="phone"]').val();
            
            $.ajax({
                url: "{{ route('bkash.create') }}",
                type: 'POST',
                data: {
                    amount: amount,
                    gateway_id: id,
                    phone: phone
                },
                success: function(response) {
                    if(response.success) {
                        currentTrxId = response.transaction_id;
                        $('#bkashPaymentInfo').removeClass('d-none');
                        $('#initiateBtn').addClass('d-none');
                        $('#verifyBtn').removeClass('d-none');
                        toastr.success('Please complete payment from your bKash app');
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
        
        $('#verifyBtn').on('click', function() {
            let bkash_trx_id = $('input[name="bkash_trx_id"]').val();
            
            $.ajax({
                url: "{{ route('bkash.verify') }}",
                type: 'POST',
                data: {
                    transaction_id: currentTrxId,
                    bkash_trx_id: bkash_trx_id
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message);
                        window.location.href = response.redirect;
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    </script>
@endpush

