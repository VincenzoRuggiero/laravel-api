@foreach ($errors->all() as $message)@endforeach


<form action="{{ route($routeName, $technology) }}" method="POST" enctype="multipart/form-data">
@csrf
@method($method)

    {{-- Input title --}}
    <div class="mb-3">
        <label for="name" class="form-label">Technology title</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" maxlength="100" name="name" value="{{ old('name', $technology->name) }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror    
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $routeName == 'admin.technologies.update' ? 'Update technology' : 'Create technology' }}
        </button>
    </div>
</form>