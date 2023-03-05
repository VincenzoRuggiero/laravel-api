@extends('layouts.admin')

@section('content')
   <div class="container">
        <div class="row my-3">
          <div class="col-12 text-center">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Create Type</a>
          </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th>#ID</th>
                        <th>Technology name</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($technologies as $technology)
                      <tr>
                        <th>{{ $technology->id }}</th>
                        <td>{{ $technology->name }}</td>
                        <td>
                          <a href="{{ route('admin.technologies.show', $technology->id )}}" class="btn btn-primary">Show</a>
                          <a href="{{ route('admin.technologies.edit', $technology->id )}}" class="btn btn-success">Edit</a>
                          <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="delete">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" title="delete">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
   </div>
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection