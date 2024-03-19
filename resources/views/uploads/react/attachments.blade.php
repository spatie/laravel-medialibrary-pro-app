@extends('layouts.master', ['pageTitle' => 'React: attachment'])

@push('scripts')
    @viteReactRefresh
    @vite(['resources/js/react/app.tsx'])
@endpush

@section('content')
    <div id="attachments"></div>
@endsection
