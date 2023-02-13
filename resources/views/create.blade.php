<x-app-layout>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Форма заполнения') }}
        </h2>
    </x-slot>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    </div>
@endif
    <div class="adsForm">
        <form action="{{ route('board.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div>Продавец: {{Auth::user()->name}}
    <input
        id="salesman"
        name="salesman"
        type="hidden"
        value={{$user_id}}
    />
</div>

    <div class="input_form_div">
            <p>Название</p>
        <input
            id="title"
            class="input_form"
            type="text"
            name="title"
            class="@error('title') is-invalid @enderror"/>
            @error('title')
        <div class="alert alert-danger">{{$error}}</div>
            @enderror
    </div>

    <div class="textarea_div">
        <p>Описание</p>
        <textarea
            id="description"
            class="textarea"
            type="text"
            name="description"
            class="@error('title') is-invalid @enderror">
        </textarea>
            @error('description')
        <div class="alert alert-danger">{{$error}}</div>
            @enderror
    </div>

    <div class="input_price_div">
        Цена
        <input
            id="price"
             name="price"
             type="number"
             class="@error('title') is-invalid @enderror"
         />
        @error('price')
    <div class="alert alert-danger">{{$error}}</div>
        @enderror
    </div>
    <div class="loadingAndSave">
        <div class="imagesAndPhone">
            <div class= "image" >
                    <img src="{{ Vite::asset('public/storage/board/' )}}">
                  </div>
            <div class="button ">
                 <p>
                    <button type="submit">Сохранить</button>
                 </p>
        </div>
    </div>
     <div class="loadingAndSave">
        <div class="loading ">
            <label for="image">Загрузка</label>
                <input
                    class="file_img"
                    id="image"
                    name="picture"
                    type="file"
                    class="@error('image') is-invalid @enderror"/>
        </div>
                  @error('picture')
                  <div class="alert alert-danger">{{$error}}</div>
                  @enderror
        </div>
        </form>
    </div>
</x-app-layout>
