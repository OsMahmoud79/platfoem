@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">

              








<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"> Name </th>
      <th scope="col"> Title </th>
      <th scope="col"> image</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      
    </tr>
  </thead>
  <tbody>
    
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{ $post->title }}</th>
      <th scope="row">{{ $post->featrued }}</th>

      <td>
       {{-- <a class="" href="{{ route('post.edit',['id'=>$$post->id]) }}"> --}}
        <i class="far fa-edit">Edit</i>
      {{-- </a> --}}
      </td>
      <td> 
        <a class="" href="{{ route('post.delete',['id'=>$post->id]) }}">
        <i class="far fa-edit">Delete</i>
      {{-- </a> --}}
      </td>
    </tr>
   @endforeach
  </tbody>
</table>





            
                   


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
