@extends($theme.'layouts.user')
@section('title',trans('Fund Trasnfer'))
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.fund.transfer.save') }}" method="post">
                        @csrf
                        <div class="row justify-content-between">
                            {{--                            <div class="col-md-4">--}}
                            {{--                                <div class="form-group input-box mb-2">--}}
                            {{--                                    <input type="text" name="agent_id" value=""--}}
                            {{--                                           class="form-control"--}}
                            {{--                                           placeholder="@lang('Agent ID')" required>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="col-md-3">
                                <div class="form-group input-box mb-2">
                                    <input type="text" name="amount" value=""
                                           class="form-control"
                                           placeholder="@lang('Amount')" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group input-box mb-2">
                                    <select class="form-control" name="type" required>
                                        <option value="2">Withdraw</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">

                            </div>

                            <div class="col-md-2">
                                <div class="form-group mb-2 h-fill">
                                    <button type="submit" class="btn-custom w-100">
                                        @lang('Send')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body ">
                    <div class="table-parent table-responsive m-0">
                        <table class="table table-striped" id="service-table">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Type')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Created Date')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transfers as $transfer)
                                <tr>

                                    <td data-label="#@lang('Amount')">
                                        <strong>{{$transfer->amount}}</strong>
                                    </td>

                                    <td data-label="#@lang('Type')">
                                        @if($transfer->type == 1)
                                            <strong>Deposit</strong>
                                        @elseif($transfer->type == 2)
                                            <strong>Withdraw</strong>
                                        @endif

                                    </td>

                                    <td data-label="#@lang('Status')">
                                        @if($transfer->status == 0)
                                            <strong>Pending</strong>
                                        @elseif($transfer->status == 1)
                                            <strong>Completed</strong>
                                        @elseif($transfer->status == 2)
                                            <strong>Canceled</strong>
                                        @else
                                            <strong>Not Set</strong>
                                        @endif

                                    </td>

                                    <td data-label="@lang('Created Date')">
                                        {{ dateTime($transfer->created_at, 'd M Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="100%">{{__('No Data Found!')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$transfers->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

