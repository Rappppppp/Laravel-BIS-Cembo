<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    {{-- Greeting --}}
    @if (! empty($greeting))
    <h1>{{ $greeting }}</h1>
    @else
    @if ($level === 'error')
    <h1>Whoops!</h1>
    @else
    <h1>Hello!</h1>
    @endif
    @endif

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
    <p>{{ $line }}</p>
    @endforeach
    
    {{-- Action Button --}}
    @isset($actionText)
    <?php
        $color = match ($level) {
            'success', 'error' => $level,
            default => 'primary',
        };
    ?>
    <x-mail::button :url="$actionUrl" :color="$color">
    {{ $actionText }}
    </x-mail::button>
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
    <p>{{ $line }}</p>
    @endforeach

    {{-- Salutation --}}
    @if (! empty($salutation))
    <p>{{ $salutation }}</p>
    @else
    <p>Regards,<br>BIS Cembo</p>
    @endif

    {{-- Subcopy --}}
    @isset($actionText)
    <p>
        @lang(
            "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
            'into your web browser:',
            [
                'actionText' => $actionText,
            ]
        ) <a href="{{ $actionUrl }}" style="word-break: break-all;">{{ $displayableActionUrl }}</a>
    </p>
    @endisset
</body>
</html>
