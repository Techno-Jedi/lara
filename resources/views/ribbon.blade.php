<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Объявления пользователя') }}
        </h2>
    </x-slot>

@foreach($boards as $board)
<div>
<a href="board/{{$board->id}}">
    <div>Название:{{$board->title}}</div>
    </a>
    <div>Описание:{{$board->description}}</div>
    <div>Цена:{{ $board->price }}</div>
    <div>Картинка:{{ $board->filename }}</div>
    <div>Продавец:{{ $board->salesman }}</div>
    <a href="board/{{$board->id}}/edit">
    <div><button>Изменить </button></div>
    </a>
   <form action="board/{{$board->id}}" method="post">
    @csrf
    @method('delete')
   <div><button type="submit">Удалить</button></div>
   </form>
    <div>
        ========
    </div>

</div>
@endforeach

</x-app-layout>
