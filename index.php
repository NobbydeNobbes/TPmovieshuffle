<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);

include("templates/header.php");
?>




        <div class="movies">
        <?php foreach($movies as $items){
             
             ?>
            <div class="moviePoster">
               
              <?php $JPG=str_ireplace(" ","-", $items["title"]);
                    $jpg=strtolower($JPG);
                    $genre=implode(", ", $items["genres"]);
              ?>
              
             <a href="filmPage.php?id=<?=$items["id"]?>"> <img src="img/poster/<?=$jpg?>.jpg" class="poster"></a>
             <div class="gradient">
              <p class="title"><?= $items["title"]?></p>
              <p class="genre"><?=$genre?></p>
            </div>
               
            </div>
<?php
        }?>
        </div>
   <?php 
include("templates/footer.php");

?>