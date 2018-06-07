@extends('admin.layouts.app')
@section('content')
    @include('admin.snippets.errors')

    <form action="{{ route('admin.categories.update', $category->id) }}" class="form" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" name="name" type="text" placeholder="Category name" value="{{ old('name', $category->name) }}">
            </div>
        </div>

        <div class="field">
            <label class="label">Parent category</label>
            <div class="control">
                <div class="select">
                    <select class="select  is-fullwidth" name="parent_id" >
                        <option value="0">-</option>

                        @foreach($categories as $categoryItem)
                            <option
                                    value="{{ $categoryItem->id }}"
                                    {{ ($category->parent_id == $categoryItem->id) ? 'selected' : '' }}
                                    {{ ($category->id == $categoryItem->id) ? 'disabled' : '' }}
                            >
                                {!! str_repeat('&nbsp;', $categoryItem->depth * 3) !!}{{ $categoryItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save</button>
            </div>
            <div class="control">
                <a class="button is-text" href="{{ route('admin.categories.index') }}">Cancel</a>
            </div>
        </div>
    </form>
@endsection