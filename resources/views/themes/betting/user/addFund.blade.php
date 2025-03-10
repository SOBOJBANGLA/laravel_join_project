@extends($theme.'layouts.user')
@section('title')
    @lang('Add Fund')
@endsection
@section('content')
    <div class="row g-3">
        @foreach($gateways as $key => $gateway)
            <div class="col-lg-1 col-6 col-sm-4 col-md-3">

                <div
                    class="deposit-box addFund"
                    data-bs-toggle="modal"
                    data-bs-target="#makeDeposit"
                    data-id="{{$gateway->id}}"
                    data-name="{{$gateway->name}}"
                    data-currency="{{$gateway->currency}}"
                    data-gateway="{{$gateway->code}}"
                    data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                    data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                    data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                    data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}">
                    <div class="img-box">
                        <img
                            class="img-fluid"
                            src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                            alt="{{$gateway->name}}"
                        />
                        <p>{{trans($gateway->name)}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @push('loadModal')
        <!-- Deposit Modal -->
        <div
            class="modal fade"
            id="makeDeposit"

            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
            aria-labelledby="makeDepositLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>@lang('Make Deposit')</h4>
                        <button
                            type="button"
                            class="btn-close close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="payment-form">
                                @if(0 == $totalPayment)
                                    <p class="text-danger depositLimit"></p>
                                    <p class="text-danger depositCharge"></p>
                                @endif

                                <input type="hidden" class="gateway" name="gateway" value="">
                                <div class="form-group mb-30">
                                    <div class="input-box">
                                        <div class="input-group">
                                            <input type="text" class="amount form-control" name="amount"
                                                   autocomplete="off"
                                                   placeholder="@lang('Amount')"
                                                   @if($totalPayment != null) value="{{$totalPayment}}"
                                                   placeholder="@lang('Amount')" readonly @endif>
                                            <div class="input-group-append">
                                                <span class="input-group-text show-currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <pre class="text-danger errors"></pre>
                                </div>
                            </div>
                        </form>
                        <div class="payment-info text-center">
                            <img id="loading" src="{{asset('assets/admin/images/loading.gif')}}" alt="..."
                                 class="w-15"/>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn-custom checkCalc">@lang('Next')</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- bKash Amount Input Modal -->
        <div class="modal fade" id="bkashAmountModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">টাকার পরিমাণ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>কত টাকা জমা দিতে চান?</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="bkashAmountInput" placeholder="টাকার পরিমাণ">
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ config('basic.currency_symbol') }}</span>
                                </div>
                            </div>
                            <small class="text-muted">সর্বনিম্ন: {{ config('basic.currency_symbol') }} <span class="minAmount">0</span>, সর্বোচ্চ: {{ config('basic.currency_symbol') }} <span class="maxAmount">0</span></small>
                        </div>

                        <div class="mt-3">
                            <p class="mb-2">চার্জ সম্পর্কিত তথ্য:</p>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    ফিক্সড চার্জ
                                    <span class="fixedChargeAmount">0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    পারসেন্ট চার্জ
                                    <span class="percentChargeAmount">0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    মোট পরিশোধ
                                    <span class="totalAmount">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="confirmAmount">পরবর্তী</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing bKash Payment Modal -->
        <div class="modal fade" id="bkashModal" tabindex="-1" role="dialog">
            <!-- Your existing bKash modal code -->
        </div>
    @endpush
@endsection

@push('script')

    <script>
        $('#loading').hide();
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency;
        let currentTrxId = null;
        
        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "{{config('basic.currency_symbol')}}";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');

            // Check if bKash gateway
            if (gateway === 'bkash') {
                $('#makeDeposit').modal('hide');
                $('#bkashAmountModal').modal('show'); // Show amount input modal first
                return;
            }

            // Existing code...
        });

        // Handle amount submission
        $('#confirmAmount').on('click', function() {
            let amount = $('#bkashAmountInput').val();
            
            if (!amount || amount <= 0) {
                toastr.error('Please enter a valid amount');
                return;
            }

            if (amount < minAmount || amount > maxAmount) {
                toastr.error(`Amount must be between ${minAmount} and ${maxAmount} ${baseSymbol}`);
                return;
            }

            $('#bkashAmountModal').modal('hide');
            $('#bkashModal').modal('show');
            $('#bkashAmount').val(amount);
        });

        // Rest of your existing bKash handlers...

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
                     <ul class="list-group text-center text-white">
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
                        <a href="${data.payment_url}" class="btn-custom line-h22   btn-block addFund ">@lang('Pay Now')</a>
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

        // Update charge calculations when amount changes
        $('#bkashAmountInput').on('input', function() {
            let amount = parseFloat($(this).val()) || 0;
            let fixedCharge = parseFloat(fixCharge) || 0;
            let percentChargeAmount = (amount * percentCharge) / 100;
            let totalAmount = amount + fixedCharge + percentChargeAmount;

            $('.minAmount').text(minAmount);
            $('.maxAmount').text(maxAmount);
            $('.fixedChargeAmount').text(fixedCharge.toFixed(2) + ' ' + baseSymbol);
            $('.percentChargeAmount').text(percentChargeAmount.toFixed(2) + ' ' + baseSymbol);
            $('.totalAmount').text(totalAmount.toFixed(2) + ' ' + baseSymbol);
        });
    </script>
@endpush

