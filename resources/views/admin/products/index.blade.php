@extends('admin.layouts.app')

@section('content')
    @include('admin.snippets.messages')

    <div class="has-text-right">
        <a href="{{ route('admin.products.create') }}" class="button is-link"><i class="fa fa-plus"></i> Add new product</a>
    </div>
    <hr>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th colspan="2">Category</th>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{ $product->image }}" style="width: 80px;">
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    @if(! is_null($product->category))
                        {{ $product->category->name }}
                    @endif
                </td>

                <td class="has-text-right" style="width:150px;">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="button is-primary is-small">Edit</a>

                    {{-- Хардкод временный--}}
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="button is-danger is-small">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection