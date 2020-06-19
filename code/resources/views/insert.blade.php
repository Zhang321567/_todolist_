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
    <div class="container">
        <div class=" modal-dialog bg-content " style="margin-top: 10%;" >
            <form action="insert_homepage" method="post">
                <div class="modal-content bg-content">

                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add List
                        </h4>
                    </div>
                    <div class="modal-body" id="modal-body">

                        <div class="form-group">
                            <label  >Creat Work</label>
                            <input type="text"  id="work" name="work" placeholder="Work"  class="form-control bg-content" required="">
                        </div>

                        <div class="form-group">
                            <label>Share with</label>
                            <select class="form-control bg-content" name="Share" >
                                @foreach($friends as $val)
                                    <option value="{{$val->friend}}" >{{$val->friend}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary control" >Add</button>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
{{--    <div style="width: 600px">--}}
{{--        <center><h3>添加项目</h3></center>--}}
{{--        <form action="insert_homepage" method="post">--}}
{{--            <div >--}}
{{--                <label for="work">Work：</label>--}}
{{--                <input type="text"  id="work" name="work" placeholder="Work">--}}
{{--            </div>--}}

{{--            <div >--}}
{{--                <label for="status">Status：</label>--}}
{{--                <input type="text" name="status" id="status" >--}}
{{--            </div>--}}

{{--            <div >--}}
{{--                <label for="share" >Share：</label>--}}
{{--                <input type="text"  id="share" name="share" placeholder="Share">--}}
{{--            </div>--}}

{{--            <div >--}}
{{--                <input type="submit" value="提交" style="margin-left: 250px">--}}
{{--            </div>--}}

{{--            <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--        </form>--}}
{{--    </div>--}}
    </body>
    </html>
</DOCTYPE>
