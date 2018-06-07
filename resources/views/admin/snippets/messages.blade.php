@if(! is_null(session('success')))
    <div class="notification is-success">
        {{ session('success') }}
    </div>
    <hr>
@endif