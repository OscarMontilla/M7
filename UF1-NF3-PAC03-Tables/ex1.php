<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite' ) or die(mysqli_error($db));

//insert new data into the reviews table
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment,
        review_rating)
VALUES 
    (4, "2010-09-23", "Oscar Montilla", "I thought this was a bad movie
        Even though my boyfriend made me see it against my will.", 5),
    (5, "2012-09-23", "Paco Gonzalez", "I liked Spiderman better.", 3),
    (6, "2013-09-28", "David", "I wish I'd have seen it
        later!", 2)
  

ENDSQL;
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Movie database successfully updated!';
?>

