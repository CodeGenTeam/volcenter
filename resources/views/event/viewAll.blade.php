@extends('layouts.main')

@section('content')

<script>
    $.ajax({
        method: "GET",
        url: '/event',
    })
    .done(function( data ) {
        webix.ui({
          rows:[
              { view:"template", 
                type:"header", template:"My App!" },
              { view:"datatable",
                autoConfig:true,
                editable:true,
                data: data
              }
          ]
        });
    });
</script>

@endsection