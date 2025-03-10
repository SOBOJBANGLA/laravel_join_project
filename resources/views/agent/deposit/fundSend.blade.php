@extends('layouts.agent')
@section('agent')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Deposit</h4>

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
                                <th>Amount</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funds as $deposit)
                                <tr>
                                    <th scope="row">{{$deposit->amount}}</th>
                                    <td>{{\Carbon\Carbon::parse($deposit->created_at)->format('Y-m-d')}}</td>


                                </tr>

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
