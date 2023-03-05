@extends('layouts.admin')

@section('content')
   <div class="container mt-5">
        <div class="row d-flex justify-content-center">

         <div class="card col-12" style="width: 36rem;">

            <div class="card-body">
              <h5 class="card-title">{{ $type->name }}</h5>
              

              {{-- Action buttons --}}
              <div class="btn-wrapper d-flex justify-content-between">
                  <div>
                     <a class="btn btn-outline-dark @if(!isset($prev)) disabled @endisset" href="{{ route('admin.types.show', $prev->id ?? '') }}">Prev</a>
                  </div>
                  <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-success mx-2">Edit</a>
                  <form class="d-inline delete" action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="delete">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger" title="delete">Delete</button>
                  </form>
                  <div>
                     <a class="btn btn-outline-dark @if(!isset($next)) disabled @endisset" href="{{ route('admin.types.show', $next->id ?? '') }}">Next</a>
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