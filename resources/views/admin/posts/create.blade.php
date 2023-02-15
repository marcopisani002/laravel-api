@extends('layouts.app')



@section('content')
    <h1>NUOVO PROGETTO</h1>




    <form action="{{ route('admin.posts.store') }}" method="POST" class="text-white m-auto px-5">
        @csrf()

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text"
                class="form-control  @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                name="name">


            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror


        </div>
        <div class="mb-3">

            {{-- una checkbox per ogni tag disponibile. L'utente sceglie quali e quanti associare a questo post --}}
            @foreach ($technologies as $tech)
                <div class="form-check form-check-inline @error('tags') is-invalid @enderror">
                    {{-- Il name dell'input ha come suffisso le quadre [] che indicheranno al server,
                      di creare un array con i vari tag che stiamo inviando --}}
                    <input class="form-check-input @error('tags') is-invalid @enderror" type="checkbox"
                        id="tagCheckbox_{{ $loop->index }}" value="{{ $tech->id }}" name="technologies[]"
                        {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tagCheckbox_{{ $loop->index }}">{{ $tech->name }}</label>
                </div>
            @endforeach

            @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Contenuto</label>
            <textarea name="description" cols="30" rows="5"
                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Immagine di copertina</label>
            <input type="text" class="form-control  @error('cover_img') is-invalid @enderror" name="cover_img"
                value="{{ old('cover_img') }}">
            @error('cover_img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="text-center">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">Annulla</a>
            <button class="btn btn-success">Salva Progetto</button>
        </div>
    </form>
@endsection
