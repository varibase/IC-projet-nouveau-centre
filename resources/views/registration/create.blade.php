<div class="container">
    <div class="row">
        <div class="col">
            <h1>@if ($registration) @lang('pages.register.titre') @else @lang('pages.profile.titre') @endif</h1>
            <div id="result"></div>
            <div id="errors"></div>

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="@if ($registration)/register/{{ session('location') }}@else{{ route('profile.update') }}@endif">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="first_name">@lang('pages.register.firstname')<sup>*</sup></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" required 
                            value="{{ (!empty($user->last_name) ? $user->last_name : '') }}" @if (!$registration) {!! "disabled" !!} @endif >
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.firstname')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="last_name">@lang('pages.register.lastname')<sup>*</sup></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required value="{{ (!empty($user->last_name) ? $user->last_name : '') }}" @if (!$registration) {!! "disabled" !!} @endif>
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.lastname')
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email">@lang('pages.register.email')<sup>*</sup></label>
                            <input type="text" class="form-control" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ (!empty($user->email) ? $user->email : '') }}">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.email')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">@lang('pages.register.phone')</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="+1(999)-999-9999" pattern="[\+]\d(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}" value="{{ (!empty($user->phone_no) ? $user->phone_no : '') }}">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.phone')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="company">@lang('pages.register.company')</label>
                            <select class="form-control" name="company" id="company" style="width: 100%">
                                <option>@lang('pages.register.companylist.1')</option>
                                <option>@lang('pages.register.companylist.2')</option>
                                <option>@lang('pages.register.companylist.3')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <label for="lang">@lang('pages.register.lang')</label>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                            @if ($registration)
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang1" value="fr" @if(App::getLocale() == "fr") {!! "checked" !!} @endif >
                            @else 
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang1" value="fr" @if($user->lang == "fr") {!! "checked" !!} @endif >
                            @endif
                                <label class="form-check-label" for="lang1">@lang('pages.register.langFR')</label>
                            </div>
                            <div class="form-check form-check-inline">
                            @if ($registration)
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang2" value="en" @if(App::getLocale() == "en") {!! "checked" !!} @endif >
                            @else 
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang2" value="en" @if($user->lang == "en") {!! "checked" !!} @endif >
                            @endif
                                <label class="form-check-label" for="lang2">@lang('pages.register.langEN')</label>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($registration)
                    @include('registration.optins')
                @endif
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $("#company").select2({
            dropdownParent: $('.modal'),
            width:'resolve',
            tags: true,
            selectOnClose: true
        });
    });
</script>