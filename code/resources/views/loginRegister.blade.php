<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>登录</title>
        <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body class="bg">
    <div class="container">
        <div  class=" modal-dialog opac  " style="margin-top: 10%;">
            <form action="add" method="post">
                @csrf
                <div class="modal-content  bg-content">

                    <div class="modal-header">
                        {{--                        <img src="../images/logo.png" class="img-responsive m-auto" width="100xp">--}}
                        <h4 class="modal-title text-center "> Create your account </h4>
                    </div>
                    <div class="modal-body" id = "model-body">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" required="" class="form-control" autofocus="autofocus">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" required="" id="pwd" class="form-control">

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Confirm Password" required="" id="pwd1" class="form-control"
                                   onkeyup="validate()">
                        </div>



                        <div id="tishi"> </div>

                        <div class="form-group">

                            <input type="email" name="email" placeholder="Email" required="" class="form-control">
                        </div>

                    </div>


                    <div class="modal-footer">
                        <input  type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                        <div class="form-group ">
                            <button class="btn btn-primary control " type="submit" id="logon" >regist</button>
                        </div>


                    </div>

            </form>
        </div>
    </div>


    <script>
        function validate() {
            let pwd1 = document.getElementById("pwd").value;
            let pwd2 = document.getElementById("pwd1").value;
            <!-- 对比两次输入的密码 -->
            if(pwd1 == pwd2)
            {
                document.getElementById("tishi").innerHTML="<font color='green'> </font>";
                document.getElementById("logon").disabled = false;
            }
            else {
                document.getElementById("tishi").innerHTML="<font color='red'>password different</font>";
                document.getElementById("logon").disabled = true;
            }
        }
    </script>


        </form>
    </div>
    </body>
    </html>
</DOCTYPE>
