   <x-mail::message>
    # Congratulation
    Your account has been created
    Link: <a href="{{ route('login') }}">Click here to login</a></p>
    <x-mail::panel>
    Email: {{ $email }}
    </x-mail::panel>

    <x-mail::panel>
    Password: {{ $myPass }}
    </x-mail::panel>

    Thanks,<br>
    {{ config('app.name') }}
   </x-mail::message>
