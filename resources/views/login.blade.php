<html>
    <head>
        <title>Login</title>
    </head>

    <body>

    <form method="post" action="">

    @if($errors->any())

        <h1 style="color: red; background: blue; ">

        {{ $errors->first() }}

        </h1>

        @endif

        <form method="post" action=""

    @csrf

    <label for="email">Email :</label>

    </form>

        </body>

</html>    
