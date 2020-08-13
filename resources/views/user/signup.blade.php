@extends('layout.master')
@section('title')
    Signup - Videolab.com
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div id="logbox">
                    <div class="alert alert-success alert-block statusmsg"  >
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> <span id="msq" class="text-success"></span></strong>
                    </div>
                            <form id="signup" method="post" action="">
                                <h1>create an account</h1>
                                <input name="userid" id="userid" type="text" placeholder="What's your username?" pattern="^[\w]{3,16}$" autofocus="autofocus" class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="Your username please!"/>
                                <input name="email" id="email" type="email" placeholder="Email address" class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="We'll need your email!"/>
                                <input name="password" id="password" type="password" placeholder="Choose a password"  class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="You need a password!"/>
                                <input name="password2" id="password2" type="password" placeholder="Confirm password"  class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="Confirm your password!"/>
                                <span id="confirmpworgmsg" class="text-danger">Passwords do not match</span>
                                <input type="submit" id="signupbtn" value="Sign me up!" class="inputButton"/>
                                <div class="text-center">
                                    Already have an account? <a href="{{url('sign-in')}}" id="login_id">Sign-in</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>

        </div>

    </div>
    @endsection
