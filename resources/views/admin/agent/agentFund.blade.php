@extends('admin.layouts.app')
@section('title')
    @lang("Agent Fund")
@endsection
@section('content')
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="{{ route('admin.fund.transfer.agent.save') }}" method="post">
                    @csrf
                    <div class="row">


                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="amount" placeholder="Amount"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="agent_id" class="form-control">
                                    <option value="">@lang('Agent List')</option>
                                    @foreach($agents as $agent)
                                        <option
                                            value="{{$agent->id}}">{{$agent->firstname}} {{$agent->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn w-100 w-md-auto btn-primary"><i
                                        class="fas fa-search"></i> @lang('Send')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col"> Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        <th scope="col">Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($funds as $agent)
                        <tr>
                            <th scope="row">{{$agent->agent->firstname ?? ''}} {{$agent->agent->firstname ?? ''}}</th>
                            <td>{{$agent->amount}}</td>
                            <td>
                                @if($agent->status == 0)
                                    <strong>Pending</strong>
                                @elseif($agent->status == 1)
                                    <strong>Completed</strong>
                                @elseif($agent->status == 2)
                                    <strong>Canceled</strong>
                                @else
                                    <strong>Not Set</strong>
                                @endif

                            </td>
                            <td>{{\Carbon\Carbon::parse($agent->username)->format('Y-m-d')}}</td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
