<!doctype html>
<html >
<head>
    <title> DVD detail page </title>
    <style>
        .lefthandside{
            float: left;
            width: 100px ;
            font-weight: bold;
        }

        .righthandside{
            margin-left: 100px;
        }

        #container{
            margin: auto;
            width: 400px;
        }

        .textarea{
            width: 200px;
            height: 100px;
        }

        #reviews fieldset{
            width: 500px;
        }
    </style>
</head>
    <body>
    <div id="container">
    <div id="details">
        <h2> DVD details </h2>
        <div class="lefthandside"> Title </div>
        <div class="righthandside"> <?php echo $dvd->title  ?></div>

        <div class="lefthandside"> Genre </div>
        <div class="righthandside"> <?php echo $dvd->genre_name  ?></div>

        <div class="lefthandside"> Format </div>
        <div class="righthandside"> <?php echo $dvd->format_name  ?></div>

        <div class="lefthandside"> Label </div>
        <div class="righthandside"> <?php echo $dvd->label_name  ?></div>

        <div class="lefthandside"> Sound </div>
        <div class="righthandside"> <?php echo $dvd->sound_name  ?></div>

        <div class="lefthandside"> Rating </div>
        <div class="righthandside"> <?php echo $dvd->rating_name  ?></div>

        <div class="lefthandside"> Award </div>
        <div class="righthandside"> <?php echo $dvd->award  ?></div>
        <br/>
        <div class="lefthandside"> Release date </div>
        <div class="righthandside"> <?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y') ?></div>

    </div>
        <div id="messages">
            <?php if ((Session::has('success'))) : ?>
                <p> <?php echo Session::get('success')?> </p>
            <?php endif ?>

            <?php foreach ($errors->all() as $error) : ?>
                <p style="color: red"><?php echo $error ?> </p>
            <?php endforeach ?>
            </div>

        <div id="review">
            <h3> Write a review </h3>
            <fieldset>
                <form method="post" action="<?php echo url('dvds/addreview') ?>">
                    <input type="hidden" name="dvd_id" value="<?php echo $id ?>">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
            <div class="lefthandside">Title</div>
            <div class="righthandside"><input name="title" value="<?php echo Request::old('title')?>"/> </div>
            <div class="lefthandside">Rating</div>
            <div class="righthandside"><select name="rating">
                 <?php for ($i = 1; $i<=10; $i++) : ?>
                     <?php if ($i == Request::old('rating')) : ?>
                    <option selected="true"> <?php echo $i ?> </option>
                     <?php else : ?>
                         <option > <?php echo $i ?> </option>
                         <?php endif ?>
                    <?php endfor ?>
                </select> </div>
            <div id="description">
                <div class="lefthandside">Description</div>
                <div class="righthandside"><textarea class="textarea" name="description" value="<?php echo Request::old('description')?>" >  </textarea> </div>
            </div>
                <div id="submit" name="submit"> <input type="submit"> </div>
                    </form>
            </fieldset>
</div>

        <div id="reviews">
            <?php if (sizeof($reviews)>0) : ?>
            <h3> Reviews </h3>
                <?php endif?>
            <?php foreach ($reviews as $review) : ?>
            <fieldset>

                <div class="lefthandside">Title:</div>
                <div class="righthandside"><p> <?php echo $review->title ?> </p> </div>

                <div class="lefthandside">Rating:</div>
                <div class="righthandside"><p><?php echo $review->rating ?></p> </div>

                <div class="lefthandside">Description:</div>
                <div class="righthandside"><p><?php echo $review->description?> </p> </div>

            </fieldset>
            <?php endforeach ?>
            </div>
        </div>
    </body>
</html>