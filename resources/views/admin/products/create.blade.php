@extends('admin.layouts.app')
@section('content')
    @include('admin.snippets.errors')

    <form action="{{ route('admin.products.store') }}" class="form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" name="name" type="text" placeholder="Product name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label class="label">Category</label>
            <div class="control">
                <div class="select">
                    <select class="select  is-fullwidth" name="category_id" >
                        @foreach($categories as $category)
                            <option
                                    value="{{ $category->id }}"
                                    {{ (old('category_id')== $category->id) ? 'selected' : '' }}
                            >
                                {!! str_repeat('&nbsp;', $category->depth * 3) !!}{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea" name="description">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <input class="input" name="image" type="file">
            </div>
        </div>

        <hr>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save</button>
            </div>
            <div class="control">
                <a class="button is-text" href="{{ route('admin.products.index') }}">Cancel</a>
            </div>
        </div>
    </form>
@endsection