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

    <div class="w-full bg-red-200 flex justify-around items-center">
        <span>{{$section['title']}}</span>
        <span>{{$section['type']}}</span>
    </div>

    @if($section['type'] == 'type1')
    <h2>{{ $section['content']['title'] }}</h2>
    <img src="{{Storage::url($section['content']['image']) }}" alt="">

    @elseif ($section['type'] == 'type2')
    <h2>{{ $section['content']['title'] }}</h2>
    <p>{{ $section['content']['description'] }}</p>

    @endif

    @endforeach
</body>

</html>