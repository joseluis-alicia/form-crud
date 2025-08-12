@extends('layouts.administrator.main')
@section('content')

<div class="row mt-1">
    <div class="card">
        <div class="card-header">
            <div class="card-title text-center">
                <h5 class="text-uppercase">edit pimpinan</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('update.pimpinan', $pimpinan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('administrator.pimpinan._form', ['pimpinan' => $pimpinan])
            </form>
        </div>
    </div>
</div>

@endsection
