@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Bill
    </div>

    <div class="card-body">
        <form id="bill-create-form">
            @csrf
            <div class="form-group">
                <label for="month_name">Month Name</label>
                <select name="month_name" id="income_category" class="form-control select">
                    @foreach($monthsName as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
                <label for="month_name">Year</label>
                <select name="year" id="year" class="form-control select">
                    <option value="{{ $year }}">{{$year}}</option>
                    <option value="{{ $year-1 }}">{{$year-1}}</option>
                    <option value="{{ $year+1 }}">{{$year+1}}</option>
                </select>
                @if($errors->has('income_category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('income_category_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <select name="name" id="name" class="form-control select2" required>
                    @foreach($members as $id => $member)
                        <option value="{{ $id }}">{{ $member }}</option>
                    @endforeach
                </select>
                @if($errors->has('income_category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('income_category_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.income.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($income) ? $income->amount : '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.income.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="name">Bill Type</label>
                <select name="bill_type" class="form-control select2" required>
                    <option value="1">Monthly Fees</option>
                    <option value="2">Admission Fees</option>
                </select>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>

</div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>
        $( document ).ready(function() {
            $(document).submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: "/admin/bill",
                    type:"POST",
                    data: $('#bill-create-form ').serialize(),
                    success:function(response){
                        if(response.status == 200)
                        {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Bill Added',
                                icon: 'success',
                                confirmButtonText: 'ok'
                            })
                            window.location.href = "/admin/bill";
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Error!',
                            text: 'A Error Occured',
                            icon: 'error',
                            confirmButtonText: 'Back'
                        })
                    }
                });
            })
        })
    </script>
@stop
