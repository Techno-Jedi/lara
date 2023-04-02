<x-app-layout>
@foreach($boards as $board)
<div>
    <div class="boardAds">
        <div class="imagesAndPhone">
           <div class= "image" >
               <img src="{{ Vite::asset('public/storage/board/' .  $board->image )}}">
           </div>
        </div>
    <div class="description-salesman">
        <a href="board/{{$board->id}}">
            <div>Название:{{$board->title}}</div>
        </a>
         <div >Описание:{{$board->description}}</div>
    </div>
    <div class="priceAndChange" >
        <div class="price">Цена:{{ $board->price }}</div>
            <div class="DeleteAndChange">
               <a href="board/{{$board->id}}/edit">
                    <div class="change">
                        <button>Изменить</button>
                    </div>
               </a>
           <form action="board/{{$board->id}}" method="post">
                @csrf
                @method('delete')
                <div class="delete"><button type="submit">Удалить</button></div>
           </form>
           </div>
        </div>
    </div>
</div>
@endforeach
</x-app-layout>
