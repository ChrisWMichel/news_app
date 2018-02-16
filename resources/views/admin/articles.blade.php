@extends('layouts.admin_layout')

@section('content')

    <app-articles></app-articles>


@endsection

@section('jquery')
    <script>
        $(document).ready(function () {
            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu');
            $('#article-menu').addClass('active-menu');
        })
    </script>
@endsection