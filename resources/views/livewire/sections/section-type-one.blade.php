<div class="w-full flex-col flex justify-start items-start">
    <div class="w-full flex flex-col justify-start items-start">
        <span>{{$section['title']}}</span>
        <span>{{$section['type']}}</span>
    </div>


    <h2>{{ $section['content']['title'] }}</h2>
    <img src="{{Storage::url($section['content']['image']) }}" alt="">
</div>