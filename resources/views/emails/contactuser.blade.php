<x-mail::message>
    Hello!
    A customer has just sent a message to please review below for the details. Click on the link below should you need to access the CMS
<p>Name: {{$data['name']}}</p>
<p>Company: {{$data['subject']}}</p>
<p>Phone: {{$data['mobile']}}</p>
<p>Email: {{$data['email']}}</p>
<p>Message: {{$data['message']}}</p>

<x-mail::button :url="'https://pihs.codenextit.com/userLogin'">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
