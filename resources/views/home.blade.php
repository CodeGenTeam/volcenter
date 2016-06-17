@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(Auth::guest())
                            You are guest!
                        @else
                            You are logged in!
                    @endif
                    @if(Auth::check())
                            {{ Pex::userRules()->getGroups()[0]}}
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
