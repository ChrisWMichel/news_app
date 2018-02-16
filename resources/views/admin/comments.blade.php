@extends('layouts.admin_layout')

@section('content')

    <comments></comments>
@endsection

@section('jquery')
    <script>
        $(document).ready(function () {

            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu'); //.end().end().addClass('active-menu');
            //$(this).addClass('active-menu');
            $('#comments').addClass('active-menu');
            console.log('dashboard-menu')


        })
    </script>
@endsection