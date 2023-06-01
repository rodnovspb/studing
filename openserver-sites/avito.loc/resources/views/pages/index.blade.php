@extends('layouts.layout')

@section('content')



















@endsection

@push('scripts_header')
    <script src="{{ asset('storage/js/ckeditor/ckeditor.js') }}"></script>
@endpush

@push('scripts_footer')
    <script>
        window.addEventListener('load', ()=>{
            if(document.body.querySelector('#ckeditor')){
                CKEDITOR.replace('ckeditor', {
                    filebrowserBrowseUrl:  "/ckeditor/ckfinder/ckfinder.html",
                    filebrowserUploadUrl:  '/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'})}})



    </script>
@endpush

