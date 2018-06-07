@if($errors->count() > 0)
    <div class="errors">
        @foreach($errors->all() as $error)
            <div class="notification is-danger">
                {{ $error }}
            </div>
        @endforeach
    </div>
    <hr>
@endif