<form method="post" action="/register/{{ session('location') }}">
    @csrf
    <input type="text" name="first_name" id="first_name" placeholder="First Name"><br>
    <input type="text" name="last_name" id="last_name" placeholder="Last Name"><br>
    <input type="text" name="email" id="email" placeholder="Email"><br>
    <input type="text" name="phone" id="phone" placeholder="Cellulaire"><br>
    <input type="text" name="company" id="company" placeholder="Company"><br>
    <input type="text" name="lang" id="lang" placeholder="lang"><br>
    <input type="checkbox" name="optin" id="optin">Optin<br>
    <input type="checkbox" name="terms" id="terms">Terms<br>
    <input type="submit" value="Register"><input type="reset" value="Reset">
</form>
{{ App::getLocale() }}
{{ session('location') }}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif