@props(['inputToken'=>'', 'routeForm'])
<form method="post" action="{{ $routeForm}}" class="reset-password-form">
@csrf    
<h4 class="reset-password-form__title">Write you email for change your password</h4>
    <p>You can recover your password through your email</p>
    {{$inputToken}}
    <label>Email
        <br>
        <input class="reset-password-form__input" type="email" name="email" id="">
    </label>
    {{$slot}}
    <input class="reset-password-form__input reset-password-form__input--purple" type="submit" value="Send">
</form>