                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    @lang('pages.register.terms1') <a style="color: #000;" target="_blank" href="{{ asset("files/legal-".\App::getLocale().".pdf") }}">@lang('pages.register.terms2')</a>
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