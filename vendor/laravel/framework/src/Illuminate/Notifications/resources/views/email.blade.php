@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Lỗiiii!
@else
# Xin chào!
@endif
@endif

{{-- Intro Lines --}}
<p>Bạn đang nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}

<p>Nếu bạn không thực hiện yêu cầu này, không nhấp vào nút trên</p>


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Hoàng X,
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Nếu bạn gặp sự cố hãy bấm vào nút này "{{ $actionText }}", nhấp vào đường dẫn này: [{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
