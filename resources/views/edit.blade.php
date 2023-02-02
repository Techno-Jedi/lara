<x-app-layout>
@foreach($boards as $board)
@endforeach
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)

            @endforeach
        </ul>
    </div>
@endif
<form method = "POST" action="/board/{{$board->id}}">
@csrf
@method('PUT')
<div>Название
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror"
    value='{{ $board->title }}'/>
    @error('title')
    <div class="alert alert-danger">{{$error}}</div>
@enderror
</div>
<div>Описание
<textarea id="description"
type="text"
name="description"
class="@error('description') is-invalid @enderror">{{ $board->description }}</textarea>
@error('description')
    <div class="alert alert-danger">{{$error}}</div>
    @enderror
</div>
<div>Цена
<input id="price"
type="number"
name="price"
class="@error('price') is-invalid @enderror"
value='{{ $board->price }}'/>
@error('price')
    <div class="alert alert-danger">{{$error}}</div>
@enderror
</div>
<div>Продавец
<input id="salesman"
type="text"
name="salesman"
class="@error('title') is-invalid @enderror"
value='{{ $board->salesman }}'/>
@error('salesman')
    <div class="alert alert-danger">{{$error}}</div>
@enderror
</div>
<div>Картинка
<input  id="filename"
type="text"
name="filename"
class="@error('title') is-invalid @enderror"
value='{{ $board->filename }}'/>
@error('filename')
    <div class="alert alert-danger">{{$error}}</div>
@enderror
</div>

<button name = button type="submit">Сохранить </button>

</form>
</x-app-layout>
