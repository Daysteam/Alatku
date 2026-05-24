@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach (session('error') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" aria-label="close" data-bs-dismiss="alert" class="btn-close"></button>
    </div>
@endif

