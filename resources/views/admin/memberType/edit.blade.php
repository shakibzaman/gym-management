@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Member Type Edit
    </div>

    <div class="card-body">
        <form action="{{ route("admin.member-type.update", [$member->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('member_type') ? 'has-error' : '' }}">
                <label for="name">Member Type *</label>
                <input type="text" id="name" name="member_type" class="form-control" value="{{ old('member_type', isset($member) ? $member->member_type : '') }}" required>
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
