@include('header')
    <div class="ui two column centered grid">
        <div class="column">
        {{ Form::open(array('action'=>'LoginController@auth')) }}
            <div class="ui form segment" style="margin-top: 20%">
                <h2 class="ui center aligned icon header">
                    <i class="sign in icon"></i>
                    Authenticating
                </h2>
                <div class="field">
                    <div class="ui corner labeled input"> 
                    {{ Form::input('text', 'username', null, array('placeholder'=>'Your Username')) }}
                        <div class="ui corner label">
                            <i class="asterisk icon"></i>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui corner labeled input">
                    {{ Form::input('text', 'password', null, array('placeholder'=>'Your Password')) }}
                        <div class="ui corner label">
                            <i class="asterisk icon"></i>
                        </div>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input type="checkbox">
                        <label>Remember Me</label>
                    </div>
                </div>
                {{ Form::submit('Authenting',array('class'=>'ui teal button')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
@include('footer')
