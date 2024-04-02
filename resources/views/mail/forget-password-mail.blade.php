<x-mail::message>
# Introduction

Dear {{ $data["name"] }}.

your otp is {{ $data["otp"] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
