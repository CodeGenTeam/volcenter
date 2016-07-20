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
                                    <image src="/bin/img/users/{{ $user->image }}" width="200px" style="margin-top: 10px" />
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

                        <div class="one-block" id="list_education">
                        <h3>Образование</h3>
                            @foreach($user->study as $study)
                                <div class="one-block">
                                    <input type="hidden" value="{{$study->id}}" id="education_id">
                                <label for="study">Учебное заведение: </label>
                                <input type="text" name="study" class="form-control" id="study" placeholder="Название образ. учрежд." value="{{$study->place_name}}">

                                <label for="study-start">Начало обучения</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" name="study-start" value="{{$study->time_start}}" id="study-start">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                <label for="study-end">Конец обучения</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" name="study-stop" value="{{$study->time_stop}}" id="study-stop">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                <label>Группа(класс)</label>
                                    <input type='text' class="form-control" name="group" value="{{$study->group}}" id="group">
                                @if($study->getStudyUniversity != null)
                                {{--@foreach($study->getStudyUniversity as $university)--}}
                                        {{--<label>направление(факультет)</label>--}}
                                        {{--<input type='text' class="form-control" name="faculty" value="{{$university->faculty}}" id="faculty">--}}
                                        {{--<label>специальность(кафедра)</label>--}}
                                        {{--<input type='text' class="form-control" name="chair" value="{{$university->chair}}" id="chair">--}}
                                {{--@endforeach--}}
                                @endif
                                    <div class="col-sm-1 pull-right">
                                        <button type="button" tabindex="500" title="Удалить" class="btn btn-default removestudy" style="display: block;padding:5px;margin-top:5px">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-1 pull-right">
                                        <button type="button" tabindex="500" title="Сохранить" class="btn btn-default savestudy" style="display: block;padding:5px;margin-top:5px">
                                            <i class="glyphicon glyphicon-floppy-disk"></i>
                                        </button>
                                    </div>
                                    </div>
                            @endforeach
                        </div>
                        <div class="one-block">
                            <div style="float: left;">
                                <label><input type="radio" name="radio" checked="checked" value="1">Общеобразовательное</label><br />
                                <label><input type="radio" name="radio" value="2">Высшее, професс.</label>
                            </div>
                            <button class="btn btn-primary pull-right" id="add_study" style="margin-top: 5px;">Добавить учебное заведение</button>
                        </div>

                        <div class="one-block">
                        <label for="birthday">Языки</label>
                        <table class="table table-striped" id="list_language">
                            <tbody>
                            @if($user->language)
                            @foreach($user->language as $language)
                            <tr>
                                <input type="hidden" value="{{$language->id}}" id="language_level_id">
                                <td>
                                    <select name="language" class="form-control" id="language">
                                        @foreach($languages as $lang)
                                            @if($lang->id==$language->language_id)
                                                <option value="{{$lang->id}}" selected="selected">{{$lang->lang_name}}</option>
                                            @else
                                                <option value="{{$lang->id}}">{{$lang->lang_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="language_level" class="form-control" id="language_level">
                                        @foreach($level_languages as $level_language)
                                            @if($level_language->id==$language->level_language_id)
                                                <option value="{{$level_language->id}}" selected="selected">{{$level_language->name}}</option>
                                            @else
                                                <option value="{{$level_language->id}}">{{$level_language->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td style="display: flex">
                                    <button type="button" tabindex="500" title="Сохранить" class="btn btn-default savelang" style="display: block;padding:5px;margin-top:5px;margin-right: 5px;"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                                    <button type="button" tabindex="500" title="Удалить" class="btn btn-default removelang" style="display: block;padding:5px;margin-top:5px">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                                @endif
                            </tbody>
                        </table>

                            <div class="one-block">
                            <button class="btn btn-primary pull-right" id="addlang">Добавить язык</button>
                                </div>
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <h1>Личные сообщения:</h1>
                            @if(empty($user->messages))
                                <h2>Тут пока ничего нет.</h2>
                            @else
                                @foreach($user->messages as $message)
                                    <h2>{{ $message->title }}</h2>
                                    <p>{{ $message->content }}</p>
                                    <p>От: <a href="/user/profile/{{ $message->sender->id }}">{{ $message->sender->firstname }} {{ $message->sender->lastname }}</a></p>
                                    <hr>
                                @endforeach
                            @endif
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
    $('.date').datetimepicker({
        'format': 'YYYY-MM-DD'
    });
    $('body').on('click', '.date', function() {
        $(this).datetimepicker({
            'format': 'YYYY-MM-DD'
        });
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
            //defaultPreviewContent: '<img src="/bin/img/no-image.png" alt="Your Avatar" style="width:160px"><h6 class="text-muted">Click to select</h6>',
        }).on("filebatchselected", function(event, files) {
            $input.fileinput("upload");
            var old_img = $("form#item-form [name=image]").val();
            if (old_img) {
                ajax({old_img: old_img},'','','/user/save_img');
            }
        }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
            $("#file_uploaded").html(
                    "<input type='hidden' name='image' value='" + data.jqXHR.responseJSON.filename + "'/>" +
                    " <image src='/bin/img/users/" + data.jqXHR.responseJSON.filename + "' width='200px' style='margin-top: 10px'> " +
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
    $('#addlang').click(function(){
        $.get("/languages", function( data ) {
            $languages = data['languages'];
            $level_languages = data['level_languages'];
        }).then(function(){
            $html = '<tr>'+
             '<td><select name="language" class="form-control" id="language">';
             for (var i = 0; i < $languages.length; i++) {
             $html = $html +
             '<option value="'+$languages[i]["id"]+'">'+ $languages[i]["lang_name"]+'</option>';
             }
             $html = $html + '</select></td><td><select name="language_level" class="form-control" id="language_level">';
             for (var i = 0; i < $level_languages.length; i++) {
             $html = $html + '<option value="'+$level_languages[i]["id"]+'">'+ $level_languages[i]["name"]+'</option>';
             }
             $html = $html + '</select> </td> <td style="display: flex">'+
             '<button type="button" tabindex="500" title="Сохранить" class="btn btn-default savelang" style="display: block;padding:5px;margin-top:5px;margin-right: 5px;"><i class="glyphicon glyphicon-floppy-disk"></i></button>'+
             '<button type="button" tabindex="500" title="Удалить" class="btn btn-default removelang" style="display: block;padding:5px;margin-top:5px">'+
             '<i class="glyphicon glyphicon-remove"></i>'+
             '</button></td></tr>'
             $('#list_language tbody').append($html);
        });
    });
    $('body').on('click', '.savelang', function() {
        var num = $('#list_language tr .savelang').index(this);
        var data = {
            'id':$('#list_language #language_level_id').eq(num).val(),
            'language_id':$('#list_language #language').eq(num).val(),
            'level_language_id':$('#list_language #language_level').eq(num).val()
        };
        $.ajax({
            type: "POST",
            url: '/languages',
            data: data,
            success: function( msg ) {
                console.log(msg);
                if(msg['id']!=undefined)
                    $('#list_language tr').eq(num).append('<input type="hidden" value="'+msg['id']+'" id="language_level_id">');
            },
            error: function(data) {
                $('html').html(data.responseText);
            }
        });
    });

    $('body').on('click', '.removelang', function() {
        var num = $('#list_language tr .removelang').index(this);
        var data = {'id':$('#list_language #language_level_id').eq(num).val()};
        $.ajax({
            type: "DELETE",
            url: '/languages',
            data: data,
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
        $('#list_language tr').eq(num).remove();
    });

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
                if(msg['id']!=undefined)
                $('#listprofile .form-group').eq(num).append('<input type="hidden" value="'+msg['id']+'" id="profile_id">');
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

    $('body').on('click', '.removestudy', function() {
        var num = $('#list_education .one-block .removestudy').index(this);
        var data = {'id':$('#list_education .one-block #education_id').eq(num).val()};
        $.ajax({
            type: "DELETE",
            url: '/studies',
            data: data,
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
        $('#list_education .one-block').eq(num).remove();
    });

    $('body').on('click', '.savestudy', function() {
        var num = $('#list_education .one-block .col-sm-1 .savestudy').index(this);
        var data = {
            'id':$('#list_education .one-block #education_id').eq(num).val(),
            'place_name':$('#list_education .one-block #study').eq(num).val(),
            'study_start':$('#list_education .one-block #study-start').eq(num).val(),
            'study_stop':$('#list_education .one-block #study-stop').eq(num).val(),
            'group':$('#list_education .one-block #group').eq(num).val(),
            'faculty':$('#list_education .one-block #faculty').eq(num).val(),
            'chair':$('#list_education .one-block #chair').eq(num).val()
        };
        $.ajax({
            type: "POST",
            url: '/studies/'+'{{$user->id}}',
            data: data,
            success: function( msg ) {
                if(msg['id']!=undefined)
                        //change
                    $('#list_education .one-block').eq(num).append('<input type="hidden" value="'+msg['id']+'" id="profile_id">');
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });
        /*var data = {
            'id':$('#list_education #education_id').eq(num).val(),
            'place_name':$('#list_education #study_start').eq(num).val(),
            'time_start':'',
            'time_stop':'',
            'group':''
        };
        $.ajax({
            type: "POST",
            url: '/studies',
            data: data,
            success: function( msg ) {
                console.log(msg);
            },
            error: function(data) {
                $('html').html(data.responseText);
            },
        });*/
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
    $('#add_study').click(function () {
        $html = '<div class="one-block"><label for="study">Учебное заведение: </label>'+
        '<input type="text" name="study" class="form-control" id="study" placeholder="Название образ. учрежд." >' +
        '<label for="study-start">Начало обучения</label>'+
        '<div class="input-group date">'+
        '<input type="text" class="form-control" name="study-start" id="study-start">' +
        '<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>'+
        '<label for="study-end">Конец обучения</label>'+
        '<div class="input-group date">'+
        '<input type="text" class="form-control" name="study-stop" id="study-stop">'+
         '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div>'+
         '<label>Группа(Класc)</label><input type="text" class="form-control" name="group" id="group">';

        if($('input[type=radio]:checked').val()=='1')
        {
            $html = $html +
                    '<div class="col-sm-1 pull-right">'+
                    '<button type="button" tabindex="500" title="Удалить" class="btn btn-default removestudy" style="display: block;padding:5px;margin-top:5px">'+
                    '<i class="glyphicon glyphicon-remove"></i></button></div><div class="col-sm-1 pull-right">'+
                    '<button type="button" tabindex="500" title="Сохранить" class="btn btn-default savestudy" style="display: block;padding:5px;margin-top:5px">'+
                    '<i class="glyphicon glyphicon-floppy-disk"></i></button></div></div>';
            $('#list_education').append($html);
        }
        else
        {
            $html = $html + ' <label>направление(факультет)</label>'+
                '<input type="text" class="form-control" name="faculty" id="faculty">'+
                '<label>специальность(кафедра)</label>'+
                '<input type="text" class="form-control" name="chair" id="chair">'+
                '<div class="col-sm-1 pull-right">'+
                '<button type="button" tabindex="500" title="Удалить" class="btn btn-default removestudy" style="display: block;padding:5px;margin-top:5px">'+
                '<i class="glyphicon glyphicon-remove"></i></button></div><div class="col-sm-1 pull-right">'+
                '<button type="button" tabindex="500" title="Сохранить" class="btn btn-default savestudy" style="display: block;padding:5px;margin-top:5px">'+
                '<i class="glyphicon glyphicon-floppy-disk"></i></button></div></div>';
            $('#list_education').append($html);
        }
        $('.date').click();
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