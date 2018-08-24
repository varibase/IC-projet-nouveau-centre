<div class="container">
    <div class="row">
        <div class="col">
            <h1>@lang('pages.login1.titre')</h1>
            <div id="result"></div>
            <div id="errors"></div>

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="/loginstep2">
                @csrf
               
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">@lang('pages.register.email')</label>
                            <input type="text" class="form-control" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.email')
                            </div>
                        </div>
                    </div>
                    @include('member.logintools')                  
                </div>
            </form>
        </div>   
    </div>
</div>