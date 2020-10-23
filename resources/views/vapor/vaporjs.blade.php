@extends('layouts.master')

@push('scripts')
    <script src="{{ asset('js/vapor/app.js') }}"></script>
    <ul>
        <li>{{ auth()->check() ? 'logged in' : 'anon' }}</li>
        <li>Media Library Disk: {{ config('media-library.disk_name') }}</li>
        <li>Filesystems default: {{ config('filesystems.default') }}</li>
    </ul>
    <script>
        function uploadToS3() {
            console.log('uploading', document.getElementById('file').files[0])

            Vapor.store(document.getElementById('file').files[0], {
                progress: progress => {
                    this.uploadProgress = Math.round(progress * 100);
                }
            }).then(response => {
                let firstFile = document.getElementById('file').files[0];

                console.log({
                    uuid: response.uuid,
                    key: response.key,
                    bucket: response.bucket,
                    name: firstFile.name,
                    content_type: firstFile.type,
                });

                axios.post('/post-s3-upload ', {
                    uuid: response.uuid,
                    key: response.key,
                    bucket: response.bucket,
                    name: firstFile.name,
                    content_type: firstFile.type,
                });
            }).catch(error => console.error(error));
        }
    </script>
@endpush

@section('content')
    <x-h2>Media Library on Vapor test</x-h2>


    <x-field label="file">
        <input type="file" id="file" ref="file">
    </x-field>

    <x-button onclick="uploadToS3()" dusk="submit">Submit</x-button>
@endsection
