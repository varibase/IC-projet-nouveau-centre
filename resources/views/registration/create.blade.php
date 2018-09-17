<div class="container">
    <div class="row">
        <div class="col">
            <h1>@if ($params->registration) @lang('pages.register.titre') @else @lang('pages.profile.titre') @endif</h1>
            <div id="result"></div>
            <div id="errors"></div>

            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="{{ $params->route }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="first_name">@lang('pages.register.firstname')<sup>*</sup></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" required 
                            value="{{ (!empty($user->first_name) ? $user->first_name : '') }}" {{ $params->fieldAttribute }} >
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.firstname')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="last_name">@lang('pages.register.lastname')<sup>*</sup></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required value="{{ (!empty($user->last_name) ? $user->last_name : '') }}" {{ $params->fieldAttribute }} >
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
                            <input type="text" class="form-control phone-number" name="phone" id="phone"  value="{{ (!empty($user->phone->phone_no) ? $user->phone->phone_no : '') }}" placeholder="+1(999)-999-9999" pattern="[\+]\d(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}">
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
                                @if ($params->registration)
                                    <option selected disabled></option>
                                @endif
                                @empty($user->company->name)
                                    <option selected disabled></option>
                                @endempty
                                @foreach($companies as $company)
                                    <option
                                            @isset($user->company->name)
                                                @if($user->company->name == $company->name)
                                                    selected
                                                    @php $checked = true @endphp
                                                @endif
                                            @endisset
                                    >{{ $company->name }}</option>
                                @endforeach
                                @empty($checked)
                                    @isset($user->company->name)
                                        <option selected>{{ $user->company->name }}</option>
                                    @endisset
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <label for="lang">@lang('pages.register.lang')</label>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang1" value="fr" @if($params->language == "fr") {!! "checked" !!} @endif >
                                <label class="form-check-label" for="lang1">@lang('pages.register.langFR')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang2" value="en" @if($params->language == "en") {!! "checked" !!} @endif >
                                <label class="form-check-label" for="lang2">@lang('pages.register.langEN')</label>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($params->registration)
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

    var phoneMask = ['+', '1', '(', /[1-9]/, /\d/, /\d/, ')', '-', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/];

    var myInput = document.querySelector('.phone-number');

    var maskedInputController = vanillaTextMask.maskInput({
        inputElement: myInput,
        mask: phoneMask,
        showMask:false
    })

</script>