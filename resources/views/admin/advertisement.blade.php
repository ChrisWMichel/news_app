@extends('layouts.admin_layout')

@section('content')

    <advertisements></advertisements>

@endsection

@section('jquery')
    <script>
        $(document).ready(function () {

            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu'); //.end().end().addClass('active-menu');
            //$(this).addClass('active-menu');
            $('#advertisement').addClass('active-menu');



        })
    </script>
@endsection