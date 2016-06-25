@extends('layouts.main')

@section('content')

<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-horizontal">
                    <div class="col-md-6">
                        <div class="one-block">
                    <label for="email">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block"><b>{{ $errors->first('email') }}</b></span>
                            @endif
                        </div>
                        <div class="one-block">
                            <label for="login">Login: </label>
                            <input type="login" name="login" class="form-control" id="login" placeholder="Login" value="{{ $user->login }}">
                            @if ($errors->has('login'))
                                <span class="help-block"><b>{{ $errors->first('login') }}</b></span>
                            @endif
                        </div>
                        <div class="one-block">
                    <label for="firstname">Имя: </label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Имя" value="{{$user->firstname}}">
                            @if ($errors->has('firstname'))
                                <span class="help-block"><b>{{ $errors->first('firstname') }}</b></span>
                            @endif
                    <label for="lastname">Фамилия: </label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Фамилия" value="{{$user->lastname}}">
                            @if ($errors->has('lastname'))
                                <span class="help-block"><b>{{ $errors->first('lastname') }}</b></span>
                            @endif
                        <label for="middlename">Отчество: </label>
                        <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Отчество" value="{{$user->middlename}}">
                            @if ($errors->has('middlename'))
                                <span class="help-block"><b>{{ $errors->first('middlename') }}</b></span>
                            @endif
                            </div>
                        <div class="one-block">
                        <label for="birthday">Дата рождения: </label>
                            <div class='input-group date'>
                                <input type='text' class="form-control" name="birthday" id='birthday' value="{{$user->birthday->format('Y-m-d') }}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                            </div>
                            @if ($errors->has('birthday'))
                                <span class="help-block"><b>{{ $errors->first('birthday') }}</b></span>
                            @endif
                        </div>
                        <div class="one-block">
                        <label for="phone">Телефон: </label>
                            @if(! is_null($user->phones))
                            @foreach($user->phones as $phone)
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Номер телефона" value="{{$phone->phone}}">
                            @endforeach
                            @else
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Номер телефона">
                            @endif
                        </div>
                        <div class="one-block">
                            <label>Адрес проживания: </label>
                            @if($user->addresses!='[]')
                                @foreach($user->addresses as $address)
                                    <input type="hidden" value="{{$address->id}}" id="address_id">
                                    <input type="text" name="country" class="form-control" id="country" placeholder="Страна" value="{{$address->country}}">
                                    <input type="text" name="city" class="form-control" id="city" placeholder="Город" value="{{$address->city}}">
                                    <input type="text" name="street" class="form-control" id="street" placeholder="Улица" value="{{$address->street}}">
                                    @if($address->house!=0)
                                        <input type="text" name="house" class="form-control" id="house" placeholder="Дом" value="{{$address->house}}">
                                    @else
                                        <input type="text" name="house" class="form-control" id="house" placeholder="Дом">
                                    @endif
                                    <input type="text" name="ext" class="form-control" id="ext" placeholder="Дробь, буква" value="{{$address->ext}}">
                                @if($address->flat!=0)
                                        <input type="text" name="flat" class="form-control" id="flat" placeholder="Квартира" value="{{$address->flat}}">
                                    @else
                                        <input type="text" name="flat" class="form-control" id="flat" placeholder="Квартира">
                                    @endif
                                @endforeach
                            @else
                                <input type="text" name="country" class="form-control" id="country" placeholder="Страна">
                                <input type="text" name="city" class="form-control" id="city" placeholder="Город">
                                <input type="text" name="street" class="form-control" id="street" placeholder="Улица">
                                <input type="text" name="house" class="form-control" id="house" placeholder="Дом">
                                <input type="text" name="ext" class="form-control" id="ext" placeholder="Дробь, буква">
                                <input type="text" name="flat" class="form-control" id="flat" placeholder="Квартира">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="one-block">
                            <h3>Фотография</h3>
                            <div class="form-group col-sm-12" id="file_uploaded" style="text-align: center;">
                                <input type="hidden" name="image" value="{{ $user->image }}" />
                                @if ($user->image)
                                    <image src="/user_panel_bin/images/users/{{ $user->image }}" width="200px" style="margin-top: 10px" />
                                    <button id="delete_img" type="button" tabindex="500" title="Удалить фотографию" class="btn btn-default fileinput-remove fileinput-remove-button" style="display: block;margin: 0 auto;margin-top: 10px;">
                                    <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                @endif
                            </div>

                            {{--@if ($user->image)
                                <button id="delete_img" type="button" tabindex="500" title="Удалить фотографию" class="btn btn-default fileinput-remove fileinput-remove-button" style="display: block;margin: 0 auto;margin-top: 10px;">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            @endif--}}
                            <input id="image" type="file" multiple class="image file-loading" data-show-preview="false" data-show-upload="false">
                        </div>
                        <div class="one-block" id="listprofile">
                                    <h3>Профили</h3>
                            @if(!is_null($user->profiles))
                                    @foreach($user->profiles as $profile)
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <input type="hidden" value="{{$profile->id}}" id="profile_id">
                                    <select class="form-control" id="profile_list">
                                        @foreach($profile_types as $profile_type)
                                            @if($profile_type->id==$profile->getProfileType->id)
                                                <option value="{{$profile_type->id}}" selected="selected">{{$profile_type->name}}</option>
                                            @else

                                                <option value="{{$profile_type->id}}">{{$profile_type->name}}</option>
                                                @endif
                                        @endforeach
                                    </select>
                                        </div>
                                    <div class="col-sm-5" id="link_list">
                                        <input type="text" class="form-control" value="{{$profile->link}}">
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" tabindex="500" title="Сохранить" class="btn btn-default saveprofile" style="display: block;padding:5px;margin-top:5px">
                                            <i class="glyphicon glyphicon-floppy-disk"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" tabindex="500" title="Удалить" class="btn btn-default removeprofile" style="display: block;padding:5px;margin-top:5px">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                    </div>

                                    </div>
                                    @endforeach
                            @endif
                        </div>
                        <button class="btn btn-primary pull-right" id="add_profile">Добавить профиль</button>
                        <div class="one-block">
                        <label for="study">Учебное заведение: </label>
                        <input type="text" name="study" class="form-control" id="study" placeholder="Адрес проживания" value="ЮУрГУ">

                        <label for="study-start">Начало обучения</label>
                            <div class='input-group date' id='study-start'>
                                <input type='text' class="form-control" name="study-start" value="" id="study-start">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                            </div>

                        <label for="study-end">Конец обучения</label>
                            <div class='input-group date' id='study-end'>
                                <input type='text' class="form-control" name="study-end" value="" id="study-end">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                            </div>
                        <button class="btn btn-primary pull-right" style="margin-top: 5px;">Добавить учебное заведение</button>
                        </div>


                        <div class="one-block">
                        <label for="birthday">Языки</label>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <select name="english-level" class="form-control">
                                        <option value="low-intermediate">Английский</option>
                                        <option value="intermediate">Испанский</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="english-level" class="form-control">
                                        <option value="low-intermediate">Low intermediate</option>
                                        <option value="intermediate">Intermediate</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                            <button class="btn btn-primary pull-right">Добавить язык</button>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="update" name="update">Обновить</button>
                            <button type="submit" class="btn btn-danger" id="remove" name="remove">Удалить аккаунт</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script>
		$('#birthday').datetimepicker({
			'format': 'YYYY-MM-DD'
		});
        $('#study-start').datetimepicker({
            'format': 'YYYY-MM-DD'
        });

        $('#study-end').datetimepicker({
            'format': 'YYYY-MM-DD'
        });
</script>
<script type="text/javascript">
    $(function () {
        var $input = $("#image");
        $input.fileinput({
            'allowedFileExtensions' : ['jpg', 'jpeg', 'png'],
            'maxFileSize': 1200,
            'maxFileCount': 1,
            uploadUrl: "/user/save_img", // server upload action
            uploadAsync: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            //defaultPreviewContent: '<img src="/user_panel_bin/images/no-image.png" alt="Your Avatar" style="width:160px"><h6 class="text-muted">Click to select</h6>',
        }).on("filebatchselected", function(event, files) {
            $input.fileinput("upload");
            var old_img = $("form#item-form [name=image]").val();
            if (old_img) {
                ajax({old_img: old_img},'','','/user/save_img');
            }
        }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
            $("#file_uploaded").html(
                    "<input type='hidden' name='image' value='" + data.jqXHR.responseJSON.filename + "'/>" +
                    " <image src='/user_panel_bin/images/users/" + data.jqXHR.responseJSON.filename + "' width='200px' style='margin-top: 10px'> " +
                    " <button id='delete_img' type='button' tabindex='500' title='Удалить фотографию' class='btn btn-default fileinput-remove fileinput-remove-button' style='display: block;margin: 0 auto;margin-top: 10px;'>" + 
                                    "<i class='glyphicon glyphicon-remove'></i>" + 
                                "</button>"
            );
            deleteEventImg();
        });

        deleteEventImg();
    });

    //delete img
    function deleteEventImg()
    {
        $("#delete_img").on('click', function (_el) {
            _el.preventDefault();
            notie.confirm('Вы действительно хотите удалить картинку?', 'Да', 'Отменить', function() {
                ajax({old_img: $("form#item-form [name=image]").val()}, function(data) {
                    if (data.success) {
                        $("#file_uploaded").html("<input type='hidden' name='image' value=''>");
                    }
                },'','/user/remove_img');
            });
        });
    }

    function ajax(params, callback, form_selector, ajax_url) {
        if (form_selector) {
            var data = $(form_selector).serializeArray();
            for (var key in data) {
                params[data[key].name] = data[key].value;
            }
        }

        $.ajax({
            'url': ajax_url,
            'data': params,
            'type': 'GET',
            'success': callback
        });
    }
    load();
    function load(){
        $.get("/profile_types", function( data ) {
            $profile_types_list = data;
        });
    }
    $('body').on('click', '.saveprofile', function() {
        var num = $('#listprofile .form-group .col-sm-1 .saveprofile').index(this);
        var data = {
            'id':$('#listprofile #profile_id').eq(num).val(),
            'profile_type_id':$('#listprofile #profile_list').eq(num).val(),
            'link':$('#link_list input').eq(num).val()
        };
        $.ajax({
            type: "POST",
            url: '/profiles',
            data: data,
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
    });
    $('body').on('click', '.removeprofile', function() {
        var num = $('#listprofile .form-group .col-sm-1 .removeprofile').index(this);
        var data = {'id':$('#listprofile #profile_id').eq(num).val()};
        $.ajax({
            type: "DELETE",
            url: '/profiles',
            data: data,
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
        $('#listprofile .form-group').eq(num).remove();
    });

    $("#add_profile").click(function () {
        var html='<div class="form-group"><div class="col-sm-5">'
        + '<select class="form-control" id="profile_list">';
        for (var i = 0; i < $profile_types_list.length; i++) {
            html = html +
                    '<option value="' + $profile_types_list[i]['id'] + '">' + $profile_types_list[i]['name'] + '</option>'
                    + '<div class="form-group">';
        }
        html = html + '</select></div>'
        +'<div class="col-sm-5" id="link_list">'
                +' <input type="text" class="form-control">'
                        +'</div><div class="col-sm-1">'
                        +'<button type="button" tabindex="500" title="Сохранить" class="btn btn-default saveprofile" style="display: block;padding:5px;margin-top:5px">'
                        +'<i class="glyphicon glyphicon-floppy-disk"></i> </button>'
                        +'</div><div class="col-sm-1">'
                        +'<button type="button" tabindex="500" title="Удалить" class="btn btn-default removeprofile" style="display: block;padding:5px;margin-top:5px">'
                        +'<i class="glyphicon glyphicon-remove"></i></button> </div>';
        $('#listprofile').append(html);
    });
    $('#remove').click(function () {
        $.ajax({
            type: "DELETE",
            url: '/user/'+'{{$user->id}}',
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
    });
    $('#update').click(function () {
        var data = {
             email:$("#email").val(),
             login:$("#login").val(),
             firstname:$("#firstname").val(),
             lastname:$("#lastname").val(),
             middlename:$("#middlename").val(),
             birthday:$("#birthday").val(),
             phone:$("#phone").val(),
             country:$("#country").val(),
             city:$("#city").val(),
             street:$("#street").val(),
             house:$("#house").val(),
             ext:$("#ext").val(),
             flat:$("#flat").val(),
             address_id:$('#address_id').val()
        };
        $.ajax({
             type: "PATCH",
             url: '/user/'+'{{$user->id}}',
             data: data,
             success: function( msg ) {
                console.log(msg);
             },
             error: function(data) {
                $('html').html(data.responseText);
             }
         });
    });
</script>
<style>
    .one-block{
        clear: both;
        padding: 10px;
    }
    image{
        max-width: 200px;
    }
    </style>
@endsection