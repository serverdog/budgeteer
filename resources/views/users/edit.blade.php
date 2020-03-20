
@extends('layouts.app')

@section('content')

{!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'patch']) !!}
    <div class="row">
    @component("card", ["size" => "6 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary
    text-gray-100","title" => "Edit Profile"])


   
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
            
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
        </div>


    @endcomponent

    @component("card", ["size" => "6 border-dark no-padding card-full" , "title_bg" => "bg-gradient-success
    text-gray-100","title" => "Edit Settings"])
        <div class="form-group col-sm-12">    
            {!! Form::label('incidentals', 'Monthly Incidentals Budget:') !!}
            {!! Form::number('incidentals', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-12">        
            {!! Form::label('currency', 'Currency:') !!}
            {!! Form::select('currency_id', $currencies,  null, ['class' => 'form-control']) !!}
        </div>
                

    @endcomponent
</div>


    <div class="text-center">
        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
    </div>


{!! Form::close() !!}

@endsection
                     