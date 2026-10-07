@props([
    'title' => config('app.name', 'Bedding Atelier'),
    'description' => '',
    'canonical' => url('/'),
])

@php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $title,
        'description' => $description,
        'url' => $canonical,
        'inLanguage' => 'ru-RU',
    ];
@endphp

<script type="application/ld+json">
{!! json_encode(
    $structuredData,
    JSON_UNESCAPED_UNICODE
    | JSON_UNESCAPED_SLASHES
    | JSON_HEX_TAG
    | JSON_HEX_AMP
    | JSON_HEX_APOS
    | JSON_HEX_QUOT
) !!}
</script>