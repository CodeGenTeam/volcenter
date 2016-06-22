@extends('layouts.main')

@section('content')

<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form"  id="item-form">
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}
                    <div class="col-md-6">

                        <div class="one-block">
                    <label for="email">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <div class="one-block">
                    <label for="firstname">Имя: </label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Имя" value="Степан">
                    <label for="lastname">Фамилия: </label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Фамилия" value="Паламарчук">
                        <label for="middlename">Отчество: </label>
                        <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Отчество" value="Арсеньевич">
                            </div>
                        <div class="one-block">
                        <label for="birthday">Дата рождения: </label>
                        <input type="text" name="birthday" class="form-control" id="birthday" placeholder="Отчество" value="30-06-2000">
                            </div>
                        <div class="one-block">
                        <label for="phone">Номер телефона: </label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Номер телефона" value=" 89045563954">
                            </div>
                        <div class="one-block">
                            <label for="home_place">Адрес проживания: </label>
                            <input type="text" name="home_place" class="form-control" id="home_place" placeholder="Адрес проживания" value="Ул. Ленина д. 56 кв. 6">
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
                        <div class="one-block">
                            <div class="form-group">
                                <h3>Профили</h3>
                                <label class="control-label col-sm-3" for="skype">Skype</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="skype" placeholder="Профиль скайп" value="mrkeezy67">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="vk_profile">Вконтакте</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="vk_profile" placeholder="Профиль Вконтакте" value="vk.com/flaffen">
                                </div>
                            </div>
                            </div>
                        <div class="one-block">
                        <label for="study">Учебное заведение: </label>
                        <input type="text" name="study" class="form-control" id="study" placeholder="Адрес проживания" value="ЮУрГУ">

                        <label for="study-start">Начало обучения</label>
                        <input type="text" class="form-control" id="study-start" value="2010">

                        <label for="study-end">Конец обучения</label>
                        <input type="text" class="form-control" id="study-end" value="2016">
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
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Обновить</button>
                        <button type="submit" class="btn btn-danger">Удалить аккаунт</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<script>
	$(document).on('focus', '#birthday', function() {
		$('#birthday').datetimepicker({
			'format': 'YYYY-MM-DD'
		});
	});

    $(document).on('focus', '#study-start', function() {
        $('#study-start').datetimepicker({
            'format': 'YYYY-MM-DD'
        });
    });

    $(document).on('focus', '#study-end', function() {
        $('#study-end').datetimepicker({
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