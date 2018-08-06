<form method="post" action="/user/password">
    @csrf
    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"><br>
    <input type="submit" value="Set Password"><input type="reset" value="Reset">
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