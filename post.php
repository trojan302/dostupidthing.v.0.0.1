<?php 
include "config/config.php";
include "views/header.php";

$id = $_GET['id'];
$view = $_GET['type'];

if(isset($view) && isset($id)){
$spost = $db->query("SELECT * FROM post WHERE id='$id' ");
$post = $spost->fetch_assoc();
if ($post['id'] == $id) {
$flag = $db->query("SELECT * FROM flag WHERE id= '".$post['flagid']."' ");
$flag_name = $flag->fetch_assoc();
?>

	<div class="betta-content betta-padding" style="margin-top: 20px;">
        <div class="betta-center">
        	<h1><?php echo $post['title']; ?></h1>
            <span class="betta-small">Date : <?php echo $post['date']; ?> | By <?php echo $post['author']; ?></span> | <span class="betta-small betta-round betta-tag"><?php echo $flag_name['flag_name']; ?></span>
            </div>
        	<hr>
            <img src="<?php echo $post['img']; ?>" alt="Placeholder" class="betta-left" style="width: 30%;margin: 0px 10px 10px 0px;">
            <div class="betta-large betta-justify">
            <?php echo $post['body']; ?>
        </div>
    </div>

	
<?php 
include "views/footer.php";
}else{
?>
    <div class="betta-content betta-padding" style="margin-top: 20px;">
        <div class="betta-justify">
            <h1>Object not found!</h1>
            <hr>
            <p>The requested URL was not found on this server. If you entered the URL manually please check your spelling and try again. If you think this is a server error, back to <a href="<?= $base_dir; ?>">homepage</a></p>
            <h3>Error 404</h3>
        </div>
    </div>
<?php
} 
}else{
?>
    <div class="betta-content betta-padding" style="margin-top: 20px;">
        <div class="betta-justify">
            <h1>Object not found!</h1>
            <hr>
            <p>The requested URL was not found on this server. If you entered the URL manually please check your spelling and try again. If you think this is a server error, back to <a href="<?= $base_dir; ?>">homepage</a></p>
            <h3>Error 404</h3>
        </div>
    </div>
<?php
}
?>