@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-start">
            <h2 class="text-secondary">Create a new project</h2>

            {{-- errori di validazione --}}
            @include('partials.errors')

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                </div>
                <div class="mb-3">
                    <!--preview img upload -->
                    <div class="preview">
                        <img id="file-img-preview" class="w-50 my-3">
                    </div>
                    <!--/preview img upload -->
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div>
                    <label for="type_id" class="form-label">Type</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="my-3">Technologies:</div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="technologies" value="{{ $technology->id }}"
                                name="technologies[]" {{in_array($technology->id, old('technologies', [])) ? 'checked': ''}}> <!--name: come array perchè gli voglio passare più elementi // in old metto un array vuolto perchè inizialmente non passo alcun elemento-->
                            <label class="form-check-label" for="technologies">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
                <!-- bottone di conferma creazione -->
                <button type="submit" class="btn btn-primary my-3">Confirm</button>
            </form>
        </div>
    </div>
@endsection
