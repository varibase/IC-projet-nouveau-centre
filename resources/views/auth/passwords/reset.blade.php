<div class="container">
    <div class="row">
        <div class="col">
            <h1>@lang('pages.passwordchange.titre')</h1>
            <div id="result"></div>
            <div id="errors"></div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="{{ route('password.request') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">@lang('pages.register.email')</label>
                            <input type="text" class="form-control" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ $email ?? old('email') }}">
                                <div class="invalid-feedback">
                                    @lang('pages.formerrors.email')
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="password">@lang('pages.confirm.password')</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                                <div class="invalid-feedback">
                                    @lang('pages.formerrors.password-length')
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">@lang('pages.confirm.confirm-password')</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required minlength="4" maxlength="12">
                                <div class="invalid-feedback">
                                    @lang('pages.formerrors.password-length')
                                </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>   
    </div>
</div>