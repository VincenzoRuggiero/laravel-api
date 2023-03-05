@extends('layouts.admin')

@section('content')
   <div class="container mt-5">
        <div class="row d-flex justify-content-center">

         <div class="card col-12" style="width: 36rem;">

            <div class="card-body">
              <h5 class="card-title">{{ $technology->name }}</h5>
              

              {{-- Action buttons --}}
              <div class="btn-wrapper d-flex justify-content-between">
                  <div>
                     <a class="btn btn-outline-dark @if(!isset($prev)) disabled @endisset" href="{{ route('admin.technologies.show', $prev->id ?? '') }}">Prev</a>
                  </div>
                  <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-success mx-2">Edit</a>
                  <form class="d-inline delete" action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="delete">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger" title="delete">Delete</button>
                  </form>
                  <div>
                     <a class="btn btn-outline-dark @if(!isset($next)) disabled @endisset" href="{{ route('admin.technologies.show', $next->id ?? '') }}">Next</a>
                  </div>
              </div>
            </div>
          </div>
          
         </div>
   </div>

@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection