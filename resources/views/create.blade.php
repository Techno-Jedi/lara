<x-app-layout>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('board.store') }}" method="POST">
@csrf

<div>Продавец: {{Auth::user()->name}}
<input
id="salesman"
name="salesman"
type="hidden"

value={{$user_id}} />
</div>

<div>Название
<input id="title"
    type="text"
    name="title"
    class="@error('title') is-invalid @enderror"/>
    @error('title')
    <div class="alert alert-danger">{{$error}}</div>
@enderror
</div>

<div>Описание
<textarea id="description"
type="text"
name="description"
class="@error('title') is-invalid @enderror"></textarea>
@error('description')
    <div class="alert alert-danger">{{$error}}</div>
    @enderror
</div>

<div>Цена
<input id="price"
 name="price"
 type="number"
 class="@error('title') is-invalid @enderror"/>
 @error('price')
    <div class="alert alert-danger">{{$error}}</div>
    @enderror
</div>

<div>Картинка
<input id="filename"
name="filename"
type="text"
class="@error('title') is-invalid @enderror"/>
@error('filename')
    <div class="alert alert-danger">{{$error}}</div>
    @enderror
</div>
<button name = button type="submit">Сохранить </button>
</form>
</x-app-layout>
