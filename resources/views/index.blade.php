<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Объявления пользователя') }}
        </h2>
    </x-slot>

@foreach($boards as $board)
<div class='board'>
<a href="board/{{$board->id}}">
    <div>Название:{{$board->title}}</div>
    </a>
    <div>Описание:{{$board->description}}</div>
    <div>Цена:{{ $board->price }}</div>
    <div>Картинка:{{ $board->filename }}</div>
    <div>Продавец:{{ $board->salesman }}</div>
    <div>
        ========
    </div>
</div>
@endforeach

</x-app-layout>
