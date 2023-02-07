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
<form method = "POST" action="/board/{{$board->id}}" class="adsForm">
    @csrf
    @method('PUT')
        <div class="input_form_div">
        <p>Название:</p>
            <input
                class="input_form"
                id="title"
                type="text"
                name="title"
                class="@error('title') is-invalid @enderror"
                value='{{ $board->title }}'
            />
            @error('title')
                <div class="alert alert-danger">{{$error}}</div>
            @enderror
    </div>

    <div class="textarea_div">
        <p>Описание:</p>
    <textarea
        id="description"
        class="textarea"
        type="text"
        name="description"
        class="@error('description') is-invalid @enderror">{{ $board->description }}
    </textarea>
        @error('description')
            <div class="alert alert-danger">{{$error}}</div>
        @enderror
    </div>

    <div class="input_price_div">
        <p>Цена:</p>
            <input
                class="input_price"
                id="price"
                type="number"
                name="price"
                class="@error('price') is-invalid @enderror"
                value='{{ $board->price }}'
            />
            @error('price')
                <div class="alert alert-danger">{{$error}}</div>
            @enderror
    </div>

    <div class="input_form_div mb-10">
        <p>Продавец:</p>
            <input
                id="salesman"
                class="input_form"
                type="text"
                name="salesman"
                class="@error('title') is-invalid @enderror"
                value='{{ $board->salesman }}'
            />
            @error('salesman')
                <div class="alert alert-danger">{{$error}}</div>
            @enderror
    </div>

<div class="loadingAndSave">
        <div class="imagesAndPhone">
            <div class="image">
            <img src="{{ Vite::asset('public/board/' . $board->image) }}" />

            </div>
            <div class="button ">
                 <p>
                    <button type="submit">Сохранить</button>
                 </p>
        </div>
    </div>
        <div class="loading ">
            <label for="image">Загрузка</label>
                <input
                    class="file_img"
                    id="image"
                    name="image"
                    type="file"
                    class="@error('image') is-invalid @enderror"
                    />
                    @error('image')
                    <div class="alert alert-danger">{{$error}}</div>
                    @enderror
        </div>

</form>
</x-app-layout>
