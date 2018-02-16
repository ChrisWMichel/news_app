@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="{{$tags['url']}}" target="_blank" >
                            <img src="{{$tags['twitter:image']}}" alt="did not work" width="400"><br>
                            <h2>{{$tags['twitter:title']}}</h2>
                            <small>{{$tags['author']}}</small>
                            <p>{{$tags['description']}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
