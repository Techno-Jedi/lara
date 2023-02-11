<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Все объявления') }}
        </h2>
    </x-slot>
       @vite(['resources/js/app.js'])
@vite(['resources/css/app.css', 'resources/js/app.js'])
@foreach($boards as $board)
<div>

<div class="boardAds">
    <div class="imagesAndPhone">
        <div class= "image" >
         <img src="{{ Vite::asset('public/storage/board/' .  $board->image )}}">
       </div>
        <div class="button"> <p onclick="index.showPhone(event)" id="showPhone">Показать телефон</p>
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
