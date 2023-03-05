@foreach ($errors->all() as $message)@endforeach


<form action="{{ route($routeName, $type) }}" method="POST" enctype="multipart/form-data">
@csrf
@method($method)

    {{-- Input title --}}
    <div class="mb-3">
        <label for="name" class="form-label">Type title</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" maxlength="100" name="name" value="{{ old('name', $type->name) }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror    
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $routeName == 'admin.types.update' ? 'Update type' : 'Create type' }}
        </button>
    </div>
</form>