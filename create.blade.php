@extends('')
@section('content')

<div class="row mt-1">
    <div class="card">
        <div class="card-header">
            <div class="card-title text-center">
                <h5 class="text-uppercase">tambah pimpinan</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('store.pimpinan') }}" method="POST" enctype="multipart/form-data">
                @include('administrator.pimpinan._form')
            </form>
        </div>
    </div>
</div>

@endsection
