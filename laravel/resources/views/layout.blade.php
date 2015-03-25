<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<style>
    #container{
        margin: auto;
        width: 300px;
    }

    .lefthandside{
        float: left;
        width: 100px ;
        font-weight: bold;
    }

    .righthandside{
        margin-left: 100px;
    }

    .size{
        width: 150px;

    }

    .submit{
        margin: auto;
    }

    .line{
        line-height: 200%;
    }

    #reviews fieldset{
        width: 500px;
    }

    .textarea{
        width: 200px;
        height: 100px;
    }

</style>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>