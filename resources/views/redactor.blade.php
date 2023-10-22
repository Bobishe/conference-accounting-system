<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'КПК') }}</title>

    <!-- Scripts -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <style>


        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .bg-white {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important;
        }

        *, ::after, ::before {
            box-sizing: border-box;
        }

        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            width: 100%;
            padding-right: 10%;
            padding-left: 10%;
            margin-right: auto;
            margin-left: auto;
            display: flex;
            justify-content: space-between;
        }

        .navbar-light .navbar-brand {
            color: rgba(0, 0, 0, .9);
        }

        .navbar-brand {
            padding-top: 1.3125rem;
            padding-bottom: 1.3125rem;
            margin-right: 1rem;
            font-size: 2rem;
            text-decoration: none;
            white-space: nowrap;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        }


        .navbar-collapse {
            flex-basis: 100%;
            flex-grow: 1;
            align-items: center;
        }


        .me-auto {
            margin-right: auto !important;
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        dl, ol, ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        ul {
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }


        #myModal1 {
            width: 298px;
            height: 218px;
            padding: 18px 9px;
            border-radius: 4px;
            background: #fafafa;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            display: none;
            opacity: 0;
            z-index: 38;
            text-align: center;
        }

        #myModal1 #myModal__close {
            width: 21px;
            height: 21px;
            position: absolute;
            font-size: 29px;
            top: 1px;
            right: 11px;
            cursor: pointer;
            display: block;
        }

        #myOverlay {
            z-index: 37;
            position: fixed;
            background: rgba(0, 0, 0, .7);
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            display: none;
        }


    </style>


</head>
<body>
<div id="app container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">


            <a class="navbar-brand" href="{{ url('/') }}">
                {{ 'Система учета конфиренций КПК' }}
            </a>


            <div style="display: flex; padding-top: 1.6125rem">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   style="text-decoration: none; color: rgb(0,0,0); font-size: 1.8rem; padding-top: 8px"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/redactor">
                        {{ __('Редактировать') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                <a class="btn btn-default"
                   style="text-decoration: none; color: rgb(0,0,0); font-size: 1.8rem; margin-left: 50px;"
                   href="{{ route('logout') }}" STY
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выйти') }}
                </a>

                <a class="btn btn-success"
                   style="text-decoration: none;  font-size: 1.8rem; margin-left: 50px;"
                   href="/add"> Добавить
                </a>
            </div>
        </div>
    </nav>

    <main class="py-4">


        <div style="max-width: 90%; margin-left: auto; margin-right: auto">
            <div class="row justify-content-center">
                <div class="col-md-12">


                    <table class="table table-bordered table-striped" id="filter-table">
                        <thead>
                        <tr>
                            <th scope="col" class=""><input type="hidden" name="name_ivent">Название</th>
                            <th scope="col" class="">Организатор</th>
                            <th scope="col" class="">Последний срок сдачи</th>
                            <th scope="col" class="">Сроки проведения</th>
                            <th scope="col" class="">Эл.почта для отправки</th>
                            <th scope="col" class="">ФИО участника</th>
                            <th scope="col" class="">ФИО руководителя</th>
                            <th scope="col" class="">Форма участия</th>
                            <th scope="col" class="">Специальность</th>
                            <th scope="col" class="">Стоимость</th>
                            <th scope="col" class="">Дата сдачи</th>
                            <th scope="col" class="">Результат</th>
                            <th scope="col" class="">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class='table-filters'>
                            <td>
                                <input type="text"/>
                            </td>
                            <td>
                                <input type="text"/>
                            </td>
                            <td>
                                <input STYLE="width: 80px" type="text"/>
                            </td>
                            <td>
                                <input style="width: 80px;" type="text"/>
                            </td>
                            <td>
                                <input style="width: 120px;" type="text"/>
                            </td>
                            <td>
                                <input style="width: 150px;" type="text"/>
                            </td>
                            <td>
                                <input style="width: 150px;" type="text"/>
                            </td>
                            <td>
                                <input style=" width: 60px;" type="text"/>
                                {{--<select>
                                    <option>Очная</option>
                                    <option>Заочная</option>
                                </select>--}}
                            </td>
                            <td>
                                <input style=" width: 100px;" type="text"/>
                            </td>
                            <td>
                                <input style=" width: 80px;" type="text"/>
                            </td>
                            <td>
                                <input style=" width: 80px;" type="text"/>
                            </td>
                            <td>
                                <input style=" width: 100px;" type="text"/>
                            </td>
                        </tr>

                        {{-----------------------------------Правильно------------------------------------}}

                        @foreach($events as $event)
                            <tr class="table-data">
                                <div class="note">
                                    <div class="note__content">


                                        <td abbr="{{$event['id']}}">{{$event['name_ivent']}}</td>
                                        <td class="">{{$event['organaizer']}}</td>
                                        <td class="">{{$event['last_line']}}</td>
                                        <td class="">{{$event['deadlines']}}</td>
                                        <td class="">{{$event['email']}}</td>
                                        <td class="">
                                            {{$event['name_participant']}}
                                            {{--@foreach($childrens as $children)
                                                @if($children['event_id'] === $event['id'])
                                                    <a class="myLinkModal" href="#">{{$children['fio']}}</a><br>

                                                    <div id="myModal1">
                                                        <p>Фио:    {{$children['fio']}}</p>
                                                        <p>Номер телефрна:    {{$children['number']}}</p>
                                                        <p>Почта:    {{$children['email']}}</p>
                                                        <span id="myModal__close" class="close">ₓ</span>
                                                    </div>
                                                    <div id="myOverlay"></div>
                                                @endif
                                            @endforeach--}}
                                        </td>
                                        <td class="">{{$event['name_meneger']}}</td>
                                        <td class="">{{$event['form']}}</td>
                                        <td class="">{{$event['specialization']}}</td>
                                        <td class="">{{$event['cost']}}</td>
                                        <td class="">{{$event['date_of_delivery']}}</td>
                                        <form method="get" action="/download/{{$event['id']}}">
                                            <td class="">
                                                <button type="submit">{{$event['result_name']}}</button>
                                            </td>
                                        </form>

                                        <td style="text-align:center;">
                                            <button class="btn" data-toggle="modal" data-target="#myModal">
                                                <img src="{{ asset('img/red.svg')}}" width="20px" height="20px">
                                            </button>
                                        </td>

                                        <td style="text-align:center;">
                                            <form role="form" action="/delete/{{$event['id']}}" method="get"
                                                  name="delete"></form>
                                            <button class="btn" data-target="#delete">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path fill="none" d="M0 0h24v24H0z"/>
                                                        <path
                                                            d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z"/>
                                                    </g>
                                                </svg>
                                            </button>
                                        </td>
                                    </div>
                                </div>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>


                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                                                                                                   class="">×   </span><span
                                            class="sr-only">Close</span>

                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Редактировать</h4>

                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                                                                                                   class="">×   </span><span
                                            class="sr-only">Close</span>

                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Редактировать</h4>

                                </div>
                                <div class="modal-body1"></div>
                                <div class="modal-footer1">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

<script>

    var arr = ['name_ivent', "organaizer", "last_line", "deadlines", "email", "name_participant", "name_meneger", "form", "specialization", "cost", "date_of_delivery", "result_name"];


    /*---Фильтрация----*/
    $('.table-filters input').on('input', function () {
        filterTable($(this).parents('table'));
    });

    function filterTable($table) {
        var $filters = $table.find('.table-filters td');
        var $rows = $table.find('.table-data');
        $rows.each(function (rowIndex) {
            var valid = true;
            $(this).find('td').each(function (colIndex) {
                if ($filters.eq(colIndex).find('input').val()) {
                    if ($(this).html().toLowerCase().indexOf(
                        $filters.eq(colIndex).find('input').val().toLowerCase()) == -1) {
                        valid = valid && false;
                    }
                }
            });
            if (valid === true) {
                $(this).css('display', '');
            } else {
                $(this).css('display', 'none');
            }
        });
    }


    /*$('.table-filters select').on('select', function () {
        filterTable($(this).parents('table'));
    });

    function filterTable($table) {
        var $filters = $table.find('.table-filters td');
        var $rows = $table.find('.table-data');
        $rows.each(function (rowIndex) {
            var valid = true;
            $(this).find('td').each(function (colIndex) {
                if ($filters.eq(colIndex).find('select').val()) {
                    if ($(this).html().toLowerCase().indexOf(
                        $filters.eq(colIndex).find('select').val().toLowerCase()) == -1) {
                        valid = valid && false;
                    }
                }
            });
            if (valid === true) {
                $(this).css('display', '');
            } else {
                $(this).css('display', 'none');
            }
        });
    }*/


    /*---Информация о ученике-----*/
    $(document).ready(function () {
        $("a.myLinkModal").click(function (event) {
            event.preventDefault();
            $("#myOverlay").fadeIn(297, function () {
                $("#myModal1")
                    .css("display", "block")
                    .animate({opacity: 1}, 198);
            });
        });

        $("#myModal__close, #myOverlay").click(function () {
            $("#myModal1").animate({opacity: 0}, 198, function () {
                $(this).css("display", "none");
                $("#myOverlay").fadeOut(297);
            });
        });
    });


    /*----Удаоение записи-----*/

    $(".btn[data-target='#delete']").click(function () {
        confirm("Вы действительно хотете удалить запись?");
        $('form[name="delete"]').submit();
    });

    /*--------Редактирование записи---------*/
    $(".btn[data-target='#myModal']").click(function () {

        var columnHeadings = $("thead th").map(function () {
            return $(this).text();
        }).get();
        columnHeadings.pop();


        var columnValues = $(this).parent().siblings().map(function () {
            return $(this).text();
        }).get();

        var id = $(this).parent().siblings().map(function () {
            return $(this).attr('abbr');
        }).get();


        var modalBody = $('<div id="modalContent"></div>');
        var modalForm = $('<form role="form" name="modalForm" action="/update/' + id + '" method="post" enctype="multipart/form-data"></form> ');


        $.each(columnHeadings, function (i, columnHeader) {
            var formGroup = $('<div class="form-group"></div>');
            formGroup.append('<label for="' + columnHeader + '">' + columnHeader + '</label> {{csrf_field()}}');
            formGroup.append('<input class="form-control" name="' + arr[i] + '" id="' + columnHeader + i + '" value="' + columnValues[i] + '" /> {{--{{method_field('PATCH')}}--}}');
            modalForm.append(formGroup);
        });

        var formGroup = $('<div class="form-group"></div>');
        formGroup.append('<label  for="file">Сертификат</label>');
        formGroup.append('<input type="file" class="form-control-file" name="file" id="file">');
        modalForm.append(formGroup);


        modalBody.append(modalForm);
        $('.modal-body').html(modalBody);
    });


    $('.modal-footer .btn-primary').click(function () {
        $('form[name="modalForm"]').submit();
    });
</script>


</body>
</html>

