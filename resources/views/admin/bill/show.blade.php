@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Bills of  <span class="bg-success p-2"><span style="text-transform: uppercase">{{$user_info->name}}</span> . Joined {{$user_info->joined_date}} </span>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Bill Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($bills as $bill)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$bill->created_at}}</td>
                        <td>{{$bill->month_name}}</td>
                        <td>{{$bill->year}}</td>
                        <td>{{$bill->amount}}</td>
                        <td>{{ $bill->bill_type==1?"Monthly Fees":"Admission Fees" ?? '' }}</td>
                    </tr>
                    <?php $i++;?>
                @endforeach
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
