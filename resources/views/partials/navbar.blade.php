<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler p-0 border-0 ml-auto pt-2" type="button" data-toggle="offcanvas">
                    <div class="burger-container">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </button>

                <div class="navbar-collapse offcanvas-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="https://www.projetnouveaucentre.ca/{{ \App::getLocale() }}">@lang('pages.navbar.projet')</a>
                        </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link toggle-modal" href="/register" data-modaltype="register" data-action="@lang('pages.register.button')">@lang('pages.navbar.devenir-membre')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link toggle-modal" href="/loginstep1" data-modaltype="loginstep1" data-action="@lang('pages.login1.button')" >@lang('pages.navbar.espace-membre')</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link toggle-modal" href="/profile" data-modaltype="profile" data-action="@lang('pages.profile.button')">@lang('pages.navbar.profil')</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-none">
                            <a class="nav-link toggle-modal" href="/mycard" data-modaltype="mycard">@lang('pages.navbar.ma-carte')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">@lang('pages.navbar.deconnexion')</a>
                        </li>
                    @endauth
                        <li class="nav-item langues">
                            <a class="nav-link" href="{{route('lang.switch',['lang'=> __('pages.switch-lang') ])}}">@lang('pages.switch-lang')</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>