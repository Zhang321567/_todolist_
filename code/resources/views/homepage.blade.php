<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
    <div class="container " style="margin-top: 5%;">
        <div class=" modal-dialog opac w-75 ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Todo List</h4>
                </div>
                <div class="modal-body">
                    <table  class="table table-hover table-striped ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>列表</th>
                            <th>状态</th>
                            <th>建立者</th>
                            <th>分享者</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $val)
                            <tr >
                                <th><a href="todo?id={{$val->id}}">查看</a></th>
                                <td>{{$val->work}}</td>
                                <td>{{$val->status}}</td>
                                <th>{{$val->name}}</th>
                                @if(Session::get('name') == $val->name)
                                    <td>{{$val->share}}</td>
                                    <td>

                                        <a href="update_homepage?id={{$val->id}}">编辑</a>
                                        <a href="delete_homepage?id={{$val->id}}">删除</a>
                                    </td>
                                @endif
                                @if(Session::get('name') != $val->name)
                                    <td>{{$val->share}}</td>
                                    <td>
                                        <a href="accept?id={{$val->id}} " >同意</a>
                                        <a href="un_accept?id={{$val->id}}">不同意</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button onclick="insert();"  class="btn btn-primary ">Add</button>
                    <button onclick="out();" class="btn btn-primary " >Logout</button>
                </div>
            </div>
        </div>


    </div>

    </body>
    <script>
        function out() {
            location.href = "{{'out'}}";
        };
        function insert() {
            location.href = "{{'insert'}}";
        };
    </script>
    </html>
</DOCTYPE>
