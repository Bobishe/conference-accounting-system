@extends('layouts.app')

@section('content')

    <div style="max-width: 90%; margin-left: auto; margin-right: auto">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Организатор</th>
                        <th scope="col">Последний срок сдачи</th>
                        <th scope="col">Сроки проведения</th>
                        <th scope="col">Эл.почта для отправки</th>
                        <th scope="col">ФИО участника</th>
                        <th scope="col">ФИО руководителя</th>
                        <th scope="col">Форма участия</th>
                        <th scope="col">Специальность (дош, нач, физ, инф)</th>
                        <th scope="col">Стоимость</th>
                        <th scope="col">Дата сдачи (сдано/не сдано)</th>
                        <th scope="col">Результат</th>
                        <th scope="col">Редактор</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($events as $event)
                        <tr>
                            <td>{{$event['organaizer']}}</td>
                            <td>{{$event['last_line']}}</td>
                            <td>{{$event['deadlines']}}</td>
                            <td>{{$event['email']}}</td>
                            <td>{{$event['name_participant']}}</td>
                            <td>{{$event['name_meneger']}}</td>
                            <td>{{$event['form']}}</td>
                            <td>{{$event['specialization']}}</td>
                            <td>{{$event['cost']}}</td>
                            <td>{{$event['date_of_delivery']}}</td>
                            <td>{{$event['result']}}</td>
                            <td>{{$event['file']}}</td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>



                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"></div>
                    </div>
                    <div class="modal-dialog">
                        <div class="modal-content"></div>
                    </div>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Close</span>

                                </button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>

                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
