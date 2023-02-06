<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Все объявления') }}
        </h2>
    </x-slot>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@foreach($boards as $board)
<div>
<div class="boardAds">
    <div class="imagesAndPhone">
        <div class= "image">Картинка:{{ $board->filename }}</div>
        <div class="button"> <p>Показать телефон</p>
    </div>
</div>
<div class="description-salesman">
    <a href="board/{{$board->id}}">
    <div>Название модели:{{$board->title}}</div>
    </a>
    <div class="description">Описание:{{$board->description}}</div>
     <div>Продавец:{{ $board->salesman }}</div>
</div>

    <div class="price">Цена:{{ $board->price }}</div>


</div>
@endforeach

</x-app-layout>
