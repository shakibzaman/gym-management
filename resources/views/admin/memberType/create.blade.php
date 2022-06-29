@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Type
    </div>

    <div class="card-body">
        <form action="{{ route("admin.member-type.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.expenseCategory.fields.name') }}*</label>
                <input type="text" id="member_type" name="member_type" class="form-control" value="{{ old('member_type', isset($expenseCategory) ? $expenseCategory->name : '') }}" required>
                @if($errors->has('member_type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('member_type') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
