@extends('layouts.agent')
@section('agent')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Withdraw</h4>

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

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                            <tr>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users_deposit as $deposit)
                                <tr>
                                    <th scope="row">{{$deposit->user->username ?? ''}}</th>
                                    <th scope="row">{{number_format($deposit->amount,2)}}</th>
                                    <td>
                                        @if($deposit->status == 1)
                                            <span class="badge bg-warning">@lang('Pending')</span>
                                        @elseif($deposit->status == 2)
                                            <span class="badge bg-success">@lang('Complete')</span>
                                        @elseif($deposit->status == 3)
                                            <span class="badge bg-danger">@lang('Cancel')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{$deposit->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>

                                </tr>

                                <div class="modal fade" id="staticBackdrop{{$deposit->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Withdraw</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('agent.withdraw.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status">
                                                                <option value="">select any</option>
                                                                <option value="2">Complete</option>
                                                                <option value="3">Cancel</option>
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
                        {{$users_deposit->links()}}
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
