<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <link href="../css/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <body class="bg">
    <div class="container">
        <div class=" modal-dialog   " style="margin-top: 10%;" >
            <form action="loginCheck"  >
                @csrf
                <div class="modal-content  bg-content">

                    <div class="m-2" >
                        <h4 class="modal-title text-center "> Welcome to TodoList! </h4>
                    </div>

                    <div class="modal-body" id = "model-body">


                        <div class="form-group">

                            <input type="text" name="name" placeholder="Username" required="" class="form-control bg-content" autofocus="autofocus" id="inputText">
                        </div>

                        <div class="form-group">
                            <input  class="form-control  bg-content" type="password" name="password" placeholder="Password" required="" id="inputPassword">
                        </div>

                        <div class="form-group">
                            <input  class="form-control  bg-content" type="email" name="email" placeholder="Email" required="" id="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary control" method="post">login</button>
                        </div>
                        <div class="form-group">
                            <button  type="button" onclick="register();" class="btn btn-primary form-control">register</button>
                        </div>
                        <div id="response" value="true"></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
    <script>
        function register() {
            location.href = "{{'loginRegister'}}";
        };
    </script>


    </html>
</DOCTYPE>
