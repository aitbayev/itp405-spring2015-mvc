<!doctype html>
<html>
    <head>
        <title> Dvd Search</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <style>


            #container{
                margin: auto;
                width: 300px;
            }

            .lefthandside{
                float: left;
                width: 100px ;
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

            h1{
                text-align: center;
            }
            </style>
    </head>
    <body>
    <div id="container">
    <h1> Dvd Search</h1>
        <form action="/dvds" method="get" class="form navbar-form">
            <div class="line">
                <div class="lefthandside">
                            Title:
                        </div>
                        <div class="righthandside">
                            <input type="text" name="dvd_title" class="size"/>
                        </div>
            </div>

            <div class="line">
                <div class="lefthandside">
                        Genre:
                </div>
                    <div class="righthandside">
                        <select name="genre" class="size">
                            <option value="All" selected> All </option>
                                 <?php foreach ($genres as $genre) : ?>
                             <option> <?php echo $genre->genre_name ?> </option>
                                  <?php endforeach ?>
                     </select>
                </div>
            </div>
            <div class="line">
            <div class="lefthandside">
                     Rating:
            </div>
                <div class="righthandside">
                     <select name="rating" class="size">
                        <option value="All" selected> All </option>
                             <?php foreach ($ratings as $rating) : ?>
                        <option> <?php echo $rating->rating_name ?> </option>
                            <?php endforeach ?>
                     </select>
                </div>
                </div>
            <br/>
            <div class="righthandside">
                     <input type="submit" value="Search" class="size" class="size" />
            </div>
        </form>
        </div>
    </body>
</html>