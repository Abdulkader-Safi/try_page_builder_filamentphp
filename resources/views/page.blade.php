<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{$page['meta_description']}}">

    <meta property="og:image" content="{{$page['meta_image']}}">

    <title>{{$page['meta_title']}}</title>


    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full min-h-screen bg-blue-50 flex flex-col gap-5 items-start justify-start">
    @foreach ($page['sections'] as $section)
    @if($section['type'] == 'type1')
    <livewire:sections.section-type-one :section="$section" :key="$section['id']" />
    @elseif ($section['type'] == 'type2')
    <livewire:sections.section-type-two :section="$section" :key="$section['id']" />
    @elseif ($section['type'] == 'break_line')
    <div class="w-full h-1 bg-black"></div>
    @endif
    @endforeach
</body>

</html>