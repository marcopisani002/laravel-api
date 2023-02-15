@extends('layouts.app')



@section('content')
  <h1>{{'Modifica post #' . $post->id}}</h1>


  <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    @csrf()
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $post->name) }}">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>


    <div class="mb-3">
      <label class="form-label">Tecnologie:</label>
      <br>
      {{-- una checkbox per ogni tag disponibile. L'utente sceglie quali e quanti associare a questo post --}}
      @foreach ($technologies as $tech)
      
        <div class="form-check form-check-inline @error('technologies') is-invalid @enderror">
          
          {{-- Il name dell'input ha come suffisso le quadre [] che indicheranno al server,
                di creare un array con i vari tech che stiamo inviando --}}
          <input class="form-check-input @error('technologies') is-invalid @enderror" type="checkbox"
            id="tagCheckbox_{{ $loop->index }}" value="{{ $tech->id }}" name="technologies[]"
            {{-- Preseleziono i tag già assegnati al post, aggiungendo l'attributo checked sugli input
              controllo se la collection dei tag associati a questo post,
              contiene l'id del tag che sto stampando in questo momento --}}
            {{ $post->technologies->contains('id', $tech->id) ? 'checked' : '' }}>
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
      <textarea name="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $post->description) }}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Immagine di copertina</label>
      <input type="text" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img" value="{{ old('cover_img', $post->cover_img) }}">
      @error('cover_img')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    

    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Annulla</a>
    <button class="btn btn-primary">Salva</button>
  </form>
 
@endsection
