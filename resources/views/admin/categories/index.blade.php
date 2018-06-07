@extends('admin.layouts.app')

@section('content')
    @include('admin.snippets.messages')

    <div class="has-text-right">
        <a href="{{ route('admin.categories.create') }}" class="button is-link"><i class="fa fa-plus"></i> Add new category</a>
    </div>
    <hr>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <th colspan="2">Name</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>
                    <p style="padding-left: {{ $category->depth * 20 }}px">
                        {{ str_repeat('-', $category->depth) }}
                        {{ $category->name }}
                    </p>
                </td>

                <td class="has-text-right" style="width:150px;">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="button is-primary is-small">Edit</a>

                    {{-- Хардкод временный--}}
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="button is-danger is-small">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection