<x-mail::message>
# Your new post

{{ $post->title }} <br><br>
{{ $post->body }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
