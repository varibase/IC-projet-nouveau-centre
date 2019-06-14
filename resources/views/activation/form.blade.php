@extends('activation.layout.master')

@section('content')
    <div class="row mx-0">
        <div class="col py-4">
            <h2 style="font-size:1.75rem;">Inscrivez-vous aujourd’hui &agrave; la carte Projet Nouveau Centre Privilèges et courez la chance de gagner une carte&#8209;cadeau de 100 $<sup>*</sup></h2>
            <div id="result"></div>
            <div id="errors"></div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col pb-4">
            <form id="call2actionform" class="needs-validation" novalidate method="post" data-action="/activation/store" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="first_name">@lang('pages.register.firstname')<sup>*</sup></label>
                            <input type="text" class="form-control rounded-0 border-0" name="first_name" id="first_name" required
                                   value="{{ old('first_name') }}" >
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.firstname')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="last_name">@lang('pages.register.lastname')<sup>*</sup></label>
                            <input type="text" class="form-control rounded-0 border-0" name="last_name" id="last_name" required value="{{ old('last_name') }}" >
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
                            <input type="text" class="form-control rounded-0 border-0" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ old('email') }}" autocapitalize="none">
                            <div class="invalid-feedback">
                                @lang('pages.formerrors.email')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">@lang('pages.register.phone')</label>
                            <input type="text" class="form-control phone-number rounded-0 border-0" name="phone" id="phone"  value="{{ old('phone') }}" placeholder="+1(999)-999-9999" pattern="[\+]\d(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}">
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
                            <select class="form-control rounded-0 border-0" name="company" id="company" style="width: 100%">
                                <option selected disabled></option>
                                @foreach($companies as $company)
                                    <option>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <label for="lang">@lang('pages.register.lang')</label>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang1" value="fr" @if(App::getLocale() == "fr") {!! "checked" !!} @endif >
                                <label class="form-check-label" for="lang1">@lang('pages.register.langFR')</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form-control-lg" type="radio" name="lang" id="lang2" value="en" @if(App::getLocale() == "en") {!! "checked" !!} @endif >
                                <label class="form-check-label" for="lang2">@lang('pages.register.langEN')</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    J'accepte <a href="{{ asset("files/legal-".\App::getLocale().".pdf") }}" style="text-decoration: underline; color:#000000;" target="_blank">les conditions d'utilisations</a> et les <a href="{{ asset("files/PNC-concours.pdf") }}" style="text-decoration: underline; color:#000000;">règlements du concours</a>
                                </label>
                                <div class="invalid-feedback">
                                    @lang('pages.formerrors.terms')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="optin" id="optin">
                                <label class="form-check-label" for="optin">
                                    @lang('pages.register.optin')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-2">
                        <button type="submit" class="btn btn-dark btn-lg rounded-0" id="call2action">DEVENIR MEMBRE</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-2">
                        <p class="small"><sup>*</sup>Carte-cadeau du Centre Eaton de Montréal, échangeable dans plus de 170 magasins.</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .select2-container--default .select2-selection--single {
            border: none;
            border-radius:0;
            height: calc(2.19rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #000 transparent transparent transparent;
            border-style: solid;
            border-width: 8px 7px 0 7px;
            margin-left: -12px;
            margin-top: 0;
        }
        .select2-container--open .select2-dropdown--above,
        .select2-container--open .select2-dropdown--below {
            border-bottom:none ;
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.7);
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#company").select2({
                width:'resolve',
                tags: true,
                selectOnClose: true,
                templateSelection: function (data) {
                    if (data.id === '') {
                        return "@lang('pages.register.company-placeholder')";
                    }
                    return data.text;
                },
                createTag: function(params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term+" (@lang('pages.register.company-add'))",
                        newTag: true
                    };
                },
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
@endpush