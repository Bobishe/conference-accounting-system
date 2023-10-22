@extends('layouts.app')

@section('content')
    <div class="container-xxl row">

        <div class="col-6"></div>
        <div class="col-6 ">
            <form class="row" method="post" action="/addEvent" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-6">
                    <label for="exampleInput1">Название</label>
                    <input type="text" class="form-control" name="name_ivent" id="exampleInput1"
                           >
                </div>
                <div class="form-group col-6">
                    <label for="exampleInputPassword1">Организатор</label>
                    <input type="text" class="form-control" name="organaizer" id="exampleInputPassword1" >
                </div>

                <div class="form-group col-6 mt-3">
                    <label for="exampleInputPassword">Последний срок сдачи</label>
                    <input type="date" class="form-control" name="last_line" id="exampleInputPassword" >
                </div>
                <div class="form-group col-6 mt-3">
                    <label for="123">Сроки проведения</label>
                    <input type="text" class="form-control" id="123" name="deadlines" >
                </div>

                <div class="form-group col-6 mt-3">
                    <label for="12">Эл.почта для отправки</label>
                    <input type="text" class="form-control" id="12" name="email" >
                </div>
                <div class="form-group col-6 mt-3">
                    <label for="23">ФИО участника</label>
                    <input type="text" class="form-control" id="23" name="name_participant" >
                </div>

                <div class="form-group col-6 mt-3">
                    <label for="34">ФИО руководителя</label>
                    <input type="text" class="form-control" id="34" name="name_meneger" >
                </div>
                <div class="form-group col-6 mt-3">
                    <label for="1">Форма участия</label>
                    <select class="form-control" id="1" name="form">
                        <option>Очная</option>
                        <option>Заочная</option>
                    </select>
                </div>


                <div class="form-group col-6 mt-3">
                    <label for="qwe">Специальность </label>
                    <select class="form-control" id="qwe" name="specialization">
                        <option>Дошкольное образование</option>
                        <option>НАчальные классы</option>
                        <option>Физическая культура</option>
                        <option>Информатика</option>
                    </select>
                </div>
                <div class="form-group col-6 mt-3">
                    <label for="34qwe">Стоимость</label>
                    <input type="text" class="form-control" id="34qwe" name="cost" >
                </div>


                <div class="form-group col-6 mt-3">
                    <label for="12dsg">Дата сдачи (сдано/не сдано)</label>
                    <input type="text" class="form-control" id="12dsg" name="date_of_delivery" >
                </div>
                <div class="form-group col-6 mt-3">
                    <label for="3241dfs">Результат</label>
                    <input type="text" class="form-control" id="3241dfs" name="result_name" >
                </div>


                <div class="form-group mt-3">
                    <label  for="upload_file">Сертификат</label>
                    <input type="file" class="form-control-file" name="upload_file" id="upload_file">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Сохранить</button>
            </form>
        </div>

    </div>
@endsection
