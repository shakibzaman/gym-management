@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Member
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" id="member-signup-form">
            @csrf
                <h2>Personal Info</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" class="form-control" required>
                        @if($errors->has('phone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group form-class">
                        <label for="roles">Gender *</label>
                        <select name="gender_id" class="form-control select" required>
                            @foreach($genders as $key=>$gender)
                                <option value="{{ $key }}" >{{ $gender }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('medical_condition_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('medical_condition_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="address">Emergency Contact Number</label>
                        <input type="text" name="emergency_contact" class="form-control" required>
                        @if($errors->has('emergency_contact'))
                            <em class="invalid-feedback">
                                {{ $errors->first('emergency_contact') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="address">Remarks</label>
                        <input type="text" name="remarks" class="form-control" >
                        @if($errors->has('remarks'))
                            <em class="invalid-feedback">
                                {{ $errors->first('remarks') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" name="nationality" class="form-control" required>
                        @if($errors->has('nationality'))
                            <em class="invalid-feedback">
                                {{ $errors->first('nationality') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                        @if($errors->has('address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="address">Father Name</label>
                        <input type="text" name="father_name" class="form-control" required>
                        @if($errors->has('father_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('father_name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="address">Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" required>
                        @if($errors->has('mother_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mother_name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth </label>
                        <input type="date" name="dob" class="form-control" required>
                        @if($errors->has('dob'))
                            <em class="invalid-feedback">
                                {{ $errors->first('dob') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="occupation">Occupation </label>
                        <input type="text" name="occupation" class="form-control" >
                        @if($errors->has('occupation'))
                            <em class="invalid-feedback">
                                {{ $errors->first('occupation') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="blood_group">Blood Group </label>
                        <input type="text" name="blood_group" class="form-control" >
                        @if($errors->has('blood_group'))
                            <em class="invalid-feedback">
                                {{ $errors->first('blood_group') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <h2>Membership Duration</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-class">
                        <label for="roles">Medical Condition *</label>
                        <select name="medical_condition_id" class="form-control select" required>
                            @foreach($medical_condtions as $key=>$condition)
                                <option value="{{ $key }}" >{{ $condition }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('medical_condition_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('medical_condition_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
                        </p>
                    </div>
                    <div class="form-group form-class">
                        <label for="duration">Membership Durations *</label>
                        <select name="membership_duration" class="form-control select" required>
                            @foreach($durations as $key=>$duration)
                                <option value="{{ $key }}" >{{ $duration }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('duration'))
                            <em class="invalid-feedback">
                                {{ $errors->first('duration') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="roles">Member Type *</label>
                        <select name="member_type_id" class="form-control select" required>
                            @foreach($member_types as $key => $type)
                                <option value="{{ $type->id }}" >{{ $type->member_type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('member_type_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('member_type_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
                        </p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Monthly Fees</label>
                        <input type="text" name="monthly_fees" class="form-control" required>
                        @if($errors->has('monthly_fees'))
                            <em class="invalid-feedback">
                                {{ $errors->first('monthly_fees') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="address">Admission Fees</label>
                        <input type="text" name="admission_fees" class="form-control" required>
                        @if($errors->has('admission_fees'))
                            <em class="invalid-feedback">
                                {{ $errors->first('admission_fees') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                </div>
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
    $(document).ready(function(){
        $(document).submit(function(event){
            event.preventDefault();
            $.ajax({
                url: "/admin/member",
                type:"POST",
                data:
                    $('#member-signup-form ').serialize(),
                success:function(response){
                    if(response.status == 422)
                    {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Phone number already Recorded',
                            icon: 'error',
                            confirmButtonText: 'Back'
                        })
                    }
                    if(response.status == 200)
                    {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Member recorded Successful',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        })
                        window.location.href = "/admin/member";
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
