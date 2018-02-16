@extends('layouts.admin_layout')

@section('content')

    <manage-members></manage-members>
@endsection

@section('jquery')
    <script>
        $(document).ready(function () {

            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu'); //.end().end().addClass('active-menu');
            //$(this).addClass('active-menu');
            $('#manage-members').addClass('active-menu');
            console.log('dashboard-menu')


        })
    </script>
@endsection