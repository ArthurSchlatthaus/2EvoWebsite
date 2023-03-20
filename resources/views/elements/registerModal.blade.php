<div class="modal fade" id="modalRegisterForm" tabindex="-1" aria-labelledby="modalRegisterFormLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('register') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form mb-2" style="padding-top: 20px">
                        <input type="text" id="login_register" class="form-control @error('login_register') is-invalid @enderror"
                               name="login_register" placeholder="{{ __('messages.username') }}" maxlength="16" minlength="4" required
                               autofocus>
                        @error('login_register')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="password" id="password_register"
                               class="form-control @error('password') is-invalid @enderror" name="password_register"
                               placeholder="{{ __('messages.password') }}" maxlength="30" minlength="4" required>
                        @error('password_register')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="password" id="password_register_confirmation"
                               class="form-control @error('password_repeat') is-invalid @enderror"
                               name="password_register_confirmation" placeholder="{{ __('messages.password_repeat') }}" maxlength="30" minlength="4"
                               required>
                        @error('password_register_confirmation')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" placeholder="{{ __('messages.email') }}" maxlength="30" minlength="4" required>
                        <i class="fas fa-info-circle" onclick="function openinfo() {
                            document.getElementById('infotext').style.display='block'
                        }
                        openinfo()"></i>
                        <div style="display: none" id="infotext">{{__('messages.emailinfo')}}</div>
                        @error('email')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="email" id="email_confirmation"
                               class="form-control @error('email_confirmation') is-invalid @enderror" name="email_confirmation"
                               placeholder="{{ __('messages.email_repeat') }}" maxlength="30" minlength="4" required>
                        @error('email_confirmation')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="text" id="social_id"
                               class="form-control @error('social_id') is-invalid @enderror" name="social_id"
                               placeholder="{{ __('messages.social_id') }}" maxlength="7" minlength="7" required>
                        @error('social_id')
                        @php echo ("<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalRegisterForm').modal('show');
                            });
                            </script>");
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-login" id="register_button">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .modal-content input:focus {
        background-color: #1b1b1b;
        border-color: #b7934c;
        box-shadow: none;
    }

    .modal-content {
        position: absolute;
        top: 15px;
        right: 20px;
        color: #fff;
    }

    .btn-login {
        width: 50%;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .modal-footer {
        border: none;
        justify-content: center;
        padding: 0 0 30px 0;
    }

    .modal-content input {
        background-color: #1b1b1b;
        margin: 0px 0 15px 0;
        color: #b7934c !important;
    }

    .modal-content {
        background-color: #282726;
        border-radius: 2px;
    }

    .modal-body {
        padding: 15px 45px 16px 45px;
    }

    .modal-dialog {
        margin: 8rem auto;
    }

    #register_button {
        background-color: #b7934c
    }

    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

</style>

