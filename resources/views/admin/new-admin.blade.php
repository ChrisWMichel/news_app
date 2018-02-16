@extends('layouts.admin_layout')

@section('content')

    <new-admin></new-admin>

@endsection

@section('jquery')
    <script>
        $(document).ready(function () {

            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu'); //.end().end().addClass('active-menu');
            //$(this).addClass('active-menu');
            $('#new_admin').addClass('active-menu');



        })
    </script>
@endsection