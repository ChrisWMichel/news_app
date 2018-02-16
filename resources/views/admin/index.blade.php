@extends('layouts.admin_layout')

@section('content')

    <app-dashboard></app-dashboard>

@endsection

@section('jquery')
    <script>
        $(document).ready(function () {

            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu'); //.end().end().addClass('active-menu');
            //$(this).addClass('active-menu');
            $('#dashboard-menu').addClass('active-menu');



        })
    </script>
@endsection