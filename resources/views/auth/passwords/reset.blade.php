@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }}">
                            <label for="user_email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="user_email" type="email" class="form-control" name="user_email" value="{{$user->email}}" required autofocus>
                                @if ($errors->has('user_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>
                                @endif


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_password') ? ' has-error' : '' }}">
                            <label for="user_password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control" name="user_password" required>

                                @if ($errors->has('user_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_password_confirm') ? ' has-error' : '' }}">
                            <label for="user_password_confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="user_password_confirm" type="password" class="form-control" name="user_password_confirm" required>

                                @if ($errors->has('user_password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
