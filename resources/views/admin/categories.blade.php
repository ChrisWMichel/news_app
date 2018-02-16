@extends('layouts.admin_layout')

@section('content')

    <app-categories></app-categories>


@endsection

@section('jquery')
    <script>
        $(document).ready(function () {
            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu');
            $('#category-menu').addClass('active-menu');
            //console.log('article page')
        })
    </script>
@endsection