@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Route</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="" id="route_form">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Start</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="start" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">End</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="end">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Search
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <ul id="result"></ul>

        </div>
    </div>

@endsection

@section('add_head')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>
@endsection

@section('add_end_page')
<script src="/js/task3.js" type="text/javascript"></script>
@endsection