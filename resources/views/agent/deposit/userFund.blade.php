@extends('layouts.agent')
@section('agent')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">User Fund</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('agent.fund.send.user')}}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">User</label>
                                    <select class="form-control" name="user_id" required>
                                        <option value="">select any</option>
                                        @foreach($users as $user)
                                            <option
                                                value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="validationCustom01"
                                           placeholder="Amount" required>
                                </div>
                            </div>


                            <div>
                                <button class="btn btn-primary" type="submit">Send</button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                            <tr>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funds as $deposit)
                                <tr>
                                    <th scope="row">{{$deposit->user->firstname ?? ''}} {{$deposit->user->lastname ?? ''}}</th>
                                    <th scope="row">{{number_format($deposit->amount,2)}}</th>
                                    <th scope="row">
                                        @if($deposit->type == 1)
                                            <strong>Deposit</strong>
                                        @elseif($deposit->type == 2)
                                            <strong>Withdraw</strong>
                                        @endif
                                    </th>
                                    <th scope="row">
                                        @if($deposit->status == 0)
                                            <strong>Pending</strong>
                                        @elseif($deposit->status == 1)
                                            <strong>Completed</strong>
                                        @elseif($deposit->status == 2)
                                            <strong>Canceled</strong>
                                        @else
                                            <strong>Not Set</strong>
                                        @endif
                                    </th>
                                    <th scope="row">{{\Carbon\Carbon::parse($deposit->created_at)->format('Y-m-d')}}</th>
                                    {{--                                    <th scope="row">--}}
                                    {{--                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"--}}
                                    {{--                                                data-bs-target="#staticBackdrop{{$deposit->id}}">--}}
                                    {{--                                            <i class="fas fa-edit"></i>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </th>--}}


                                </tr>


                                <div class="modal fade" id="staticBackdrop{{$deposit->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Transfer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('agent.transfer.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status">
                                                                <option value="">select any</option>
                                                                <option value="1">Complete</option>
                                                                <option value="2">Cancel</option>
                                                            </select>
                                                            <input type="hidden" name="dep_id" value="{{$deposit->id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$funds->links()}}
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
