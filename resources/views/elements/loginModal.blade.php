<div class="modal fade" id="modalLoginForm" tabindex="-1" aria-labelledby="modalLoginFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('login') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form mb-2" style="padding-top: 20px">
                        <input type="login" id="login" class="form-control @error('login') is-invalid @enderror"
                               name="login" placeholder="{{ __('messages.username') }}" maxlength="16" minlength="4" required
                               autocomplete="login" autofocus>
                        @error('login')
                        @php echo "<script type='text/javascript'>
                            $(document).ready(function(){
                                $('#modalLoginForm').modal('show');
                            });
                            </script>";
                        @endphp
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-2">
                        <input type="password" id="password" class="form-control @error('login') is-invalid @enderror"
                               name="password" placeholder="{{ __('messages.password') }}" maxlength="30" minlength="4" required
                               autocomplete="current-password">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-login" id="login_button">Login</button>
                </div>
                <p><a href="{{url('forgot-password')}}" style="font-size: 14pt;color: #b7934c;font-style:italic;">{{ __('messages.forgot') }} ?</a></p>
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

    #login_button {
        background-color: #b7934c
    }
</style>
