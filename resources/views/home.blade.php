{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

@if (session('admin'))
    <div class="alert alert-danger">
        <p class="text-center">{{ session('admin') }}</p>
    </div>
@endif
{{-- @endsection --}}
