@extends($theme.'layouts.user')
@section('title')
@lang('Bet History')
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body ">
                <div class="table-parent table-responsive m-0">
                    <table class="table  table-striped" id="service-table">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Bet Amount</th>
                                <th>Win Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bet_datas as $data)
                            <tr>
                                <td>{{$data->serial_number}}</td>
                                <td>{{$data->bet_amount}}</td>
                                <td>{{$data->win_amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$bet_datas->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')
<script src="{{ asset('assets/admin/js/fontawesome/fontawesomepro.js') }}"></script>
@endpush
@push('script')

@endpush