<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title> Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<h1> Results </h1>
<p> You searched for '<?php echo $dvd_title . "', with genre '" .$genre. "', and rating '" . $rating . "'"?></p>
<table class="table table-striped">
<thead>
<tr>

    <th>Title</th>
    <th>Genre</th>
    <th>Rating</th>
    <th>Label</th>
    <th>Sound</th>
    <th>Format</th>
    <th>Release date</th>
</tr>
</thead>

    <tbody


<?php foreach ($dvds as $dvd) : ?>
    <tr>
        <td> <?php echo $dvd->title ?> </td>
        <td> <?php echo $dvd->genre_name ?> </td>
        <td> <?php echo $dvd->rating_name ?> </td>
        <td> <?php echo $dvd->label_name ?> </td>
        <td> <?php echo $dvd->sound_name ?> </td>
        <td> <?php echo $dvd->format_name ?> </td>
        <td> <?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y') ?> </td>
        <td> <?php echo "<a href='/dvds/" . $dvd->id . "'> [REVIEW] </a>"?></td>


    </tr>
<?php endforeach ?>
    </tbody>

</table>

</body>
</html>