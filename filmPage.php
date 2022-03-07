<?php
$data= array("name"=>"Ce film n'est pas dans notre base de données");
$find=false;
if(isset($_GET["id"])){
   $json = file_get_contents("movies.json");
   $movies= json_decode($json, true); 

    foreach($movies as $item){
        if($_GET["id"]==$item["id"]){
            $find=true;
            $data=$item;
        }
    }
}
include "templates/header.php";
?>

<?php
if($find){
    ?>
    <div class="filmPage-wrapper">
<a href="index.php" class="link">  <h1 class="filmPage-header">MovieShuffle</h1></a>
<h1 class="month"><?= substr($data["releaseDate"], 0, 4)?></h1>    
<h1 class="date"><?=$data["releaseDate"]?></h1>
<h1 class="titleFilmPage"><?=$data["title"]?></h1>
<a href="<?= $data["video"]?>" class="link"><p class="trailer">BANDE-ANNONCE</p></a>
<p class="description"><?=$data["description"]?></p>
<?php
 $JPG=str_ireplace(" ","-", $data["title"]);
$jpg=strtolower($JPG);
$genre=implode(", ", $data["genres"]);
?>
<img src="img/poster/<?=$jpg?>.jpg" class="cover">
<p class="genreFilmPage"><?=$genre?></p>
</div>
<?php
}

include "templates/footer.php";
?>

