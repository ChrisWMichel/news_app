@extends('layouts.admin_layout')

@section('content')

    <manage-articles></manage-articles>


@endsection

@section('jquery')
    <script>
        $(document).ready(function () {
            $(this).parents('ul.nav').find('.active-menu').removeClass('active-menu');
            $('#manage-article-menu').addClass('active-menu');

            $('#material-tabs').each(function() {

                var $active, $content, $links = $(this).find('a');

                $active = $($links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function() {
                    $(this.hash).hide();
                });

                $(this).on('click', 'a', function(e) {

                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault();
                });
            });
        })
    </script>
@endsection