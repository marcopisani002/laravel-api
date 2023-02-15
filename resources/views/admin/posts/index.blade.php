@extends('layouts.app')

@section('title', 'Lista Post')

@section('content')
<div class="d-flex justify-content-between mb-5 mt-5 me-3 px-3">

  <h2 class="text-white fw-bold ">Lista post</h2>
  <a  href="{{ route('admin.posts.create') }}" class="btn btn-success ">  + Create</a>
  

</div>
  <table class="table text-white">
    <thead class="text-warning text-center">
      <tr>
        <th>Id</th>
        <th>Cover</th>
        <th>Nome</th>
        <th>Descrizione</th>
        <th>GITHUB</th>
        <th>tecnologie</th>
        <th>Azioni</th>
      </tr>

    </thead>
    <tbody class="text-center">
  @foreach($posts as $post)
    
 
        <tr>
          <td class="text-center pt-4">{{ $post->id }}</td>
          <td><img src="{{ $post->cover_img }}" alt="" style="width: 60px"></td>
          <td class="text-center pt-4">{{ $post->name }}</td>
          <td class="text-center pt-4">{{ $post->description }}</td>
          <td><img src="https://kinsta.com/wp-content/uploads/2018/04/what-is-github-1-1-1024x512.png" class="my-with-a"><a href="www.github.com"></a></td>
          <td class="text-center pt-4">
            {{-- $post->technologies = Una collection (array) di istanze del model Technology.
                  Tutti le tecnologie associate al post corrente --}}
            @foreach ($post->technologies as $tech)
            
              {{ $tech->name . ' ' }}
            @endforeach

            
          </td>
          <td class="text-center pt-4">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i>Edit</a>
            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info"><i class="fas fa-eye"></i>Show</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
