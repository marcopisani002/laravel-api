@extends('layouts.app')

@php
    $title = 'Progetto #' . $post->id;
@endphp

@section('title', $title)

@section('content')
    <h1 class="px-3 mt-5 mb-5 text-success fw-bold">{{ $title }}</h1>

    @if (session('status') === 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif



    <div class="d-flex justify-content-center">


        <div class="card bg-success text-white " style="width: 18rem;">
            {{-- Se cover_img esiste, mostra un tag img, altrimenti nulla --}}
            @if ($post->cover_img)
                <img src="{{ $post->cover_img }}" alt="" class="card-img-top w-100">
            @endif

            <div class="card-body text-white">
                <div class="card-title"><strong class="px-3 text-warning">Nome:</strong>{{ $post->name }}</div>
                <p class="card-text"><strong class="px-3 text-warning">Descrizione:</strong>{{ $post->description }}</p>
                <div class="card-title"><strong class="px-3 text-warning">Tecnologie:</strong>
                    @foreach ($post->technologies as $tech)
                      <span class="badge rounded-pill text-bg-warning text-primary fw-bold">{{ $tech->name }}</span>
                    @endforeach
                  </div>
                <div><strong class="px-3 text-warning">ID:</strong > {{ $post->id }} </div>
            </div>
        </div>
    </div>s
@endsection
