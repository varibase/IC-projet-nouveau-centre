<div class="container">
    <div class="row">
        <div class="col">
            <h1>@lang('pages.confirm.titre')</h1>
            <p>@lang('pages.confirm.soustitre')</p>
            <div id="result"></div>
            <div id="errors"></div>

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="/user/password">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">@lang('pages.confirm.password')</label>
                            <input type="password" class="form-control" name="password" id="password" required minlength="4" maxlength="12">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.password-length')
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">@lang('pages.confirm.confirm-password')</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required minlength="4" maxlength="12">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.password-length')
                            </div>
                        </div> 
                    </div>
                </div>
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">
            </form>
        </div>   
    </div>
</div>