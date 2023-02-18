@extends('layouts.admin-layout')

@section('right')
    <div id="ckfinder"></div>
    <script>CKFinder.widget('ckfinder', {height: 600});</script>
@endsection


