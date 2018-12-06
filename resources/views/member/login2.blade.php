<div class="container">
    <div class="row">
        <div class="col">
            <h1>@lang('pages.login2.titre')</h1>
            <div id="result"></div>
            <div id="errors"></div>

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="/login">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
               
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">@lang('pages.login2.password')</label>
                            <input type="password" class="form-control" name="password" id="password" required autocapitalize="none">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.password')
                            </div>
                        </div>
                    </div>
                    @include('member.logintools')
                </div>
            </form>
        </div>   
    </div>
</div>