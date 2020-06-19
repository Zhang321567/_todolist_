<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Add_list</title>
        <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    </head>
    <body>
    <div style="width: 600px">
        <center><h3>添加</h3></center>
        <form action="add_list_op" method="post">
            <div class="form-group">
                <label for="item">item：</label>
                <input type="text" id="item" name="item" placeholder="Item">
            </div>

            <div>
                <label for="status">Status：</label>
                <select name="status" id="status" class="form-control">
                    <option value="进行中">进行中</option>
                    <option value="已完成">已完成</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="提交" style="margin-left: 250px">
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
    </body>
    </html>
</DOCTYPE>
