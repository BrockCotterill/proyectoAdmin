<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <style type="text/css">
            *{
                box-sizing:border-box;
            }
            html,body{
                height:100%;
                padding:0;
                margin:0;
            }
            body{
                display:flex;
                justify-content:center;
                align-items:center;
                flex-direction:column;
            }
            form{
                display:flex;
                justify-content:center;
                align-items:center;
                width:100%;
                flex-direction:column;
            }
            input[type="text"],input[type="password"]{
                width:40%;
                font-size:2em;
                margin:2% 0;
                text-align:center;
                border:none;
                border-bottom:2px solid blue;
            }
            input[type="submit"]{
                width:20%;
                font-size:2em;
                margin:2% 0;
                padding:2% 0%;
                border:none;
                color:white;
                background-color:black;
                border-radius:10px;
                border:2px solid white;
                transition:all 0.3s ease;
            }
            input[type="submit"]:hover{
                width:20%;
                font-size:2em;
                margin:2% 0;
                padding:2% 0%;
                border:none;
                color:black;
                background-color:white;
                border-radius:10px;
                border:2px solid black;
            }
            h4{
                border:2px solid red;
                background-color:#eb4034;
                color:white;
                border-radius:10px;
                font-size:2em;
                text-align:center;
                width:80%;
                margin:2% 5%;
                padding:2% 5%;
                
            }
        </style>
    </head>
    <body>
        <h1>Log In</h1>
        <form action="{{url('login')}}" method="post">
            @csrf
            <input type="text" value="{{old('username')}}" name="username"/>
            <input type="password" value="{{old('password')}}" name="password"/>
            <input type="submit" value="Submit"/>
        </form>
        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif
    </body>
</html>