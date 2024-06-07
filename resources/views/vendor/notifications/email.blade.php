<x-mail-message>
  {{-- Greeting --}}
  @if (! empty($greeting))
  {{ $greeting }}
  @else
  @if ($level === 'error')
  @lang('Opps')
  @else
  @lang('Hola!')<br>
  @endif
  @endif
  {{-- Intro Lines --}}
  @foreach ($introLines as $line)
  {{ $line }}

  @endforeach

  {{-- Action Button --}}
  @isset($actionText)
  <a href="{{ $actionUrl }}" class="button" target="_blank">
    {{ $actionText }}
  </a>
  @endisset

  {{-- Outro Lines --}}
  @foreach ($outroLines as $line)
  <p>{{ $line }}</p>

  @endforeach
  {{-- Salutation --}}
  @if (! empty($salutation))
  {{ $salutation }}
  @else
  <p>@lang('Saludos'),<br>
    {{ config('app.name') }}</p>
  @endif

  {{-- Subcopy --}}
  @isset($actionText)
  <x-slot:subcopy>
    <p>@lang(
      "Si estás teniendo problemas dando click al botón de \":actionText\", copia y pega la url debajo\n".
      'en tu navegador web:',
      [
      'actionText' => $actionText,
      ]
      )</p>
    <a href="{{ $actionUrl }}" target="_blank" class="link">{{ $actionUrl }}</a>
  </x-slot:subcopy>
  @endisset
</x-mail-message>
