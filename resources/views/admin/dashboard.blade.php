@extends('layouts.app')
@php
    $users = Auth::user();
@endphp
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="mt-5 text-white fw-light">Benvenuto
                <strong> {{ Auth::user()->name }}</strong>

            </h1>


            <div class="dropdown mt-5">
                <button class="btn btn-secondary dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                   Azioni
                </button>
                <ul class="dropdown-menu bg-light ">
                    <li><a class="dropdown-item text-center" href="{{ route('admin.posts.index') }}">I Tuoi Progetti</a></li>
                    <hr>
                    <li><a class="dropdown-item text-center" href="{{ route('admin.posts.create') }}">Aggiungi Progetto</a></li>
                    
      
                </ul>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 bg-success text-white me-3">
                    <div class="card-header fw-bold">{{ __('I Tuoi Dati') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table text-white">
                            <thead class="text-warning">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>

                                </tr>
                            </thead>
                            <tbody class="fw-bold">

                                <tr>
                                    <td>{{ Auth::user()->id }}</td>
                                    <td> {{ Auth::user()->name }}</td>
                                    <td> {{ Auth::user()->email }}</td>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
