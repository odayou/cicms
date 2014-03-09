<a href="create"  href="./news/create"> add a item</a>
<?php
foreach($news as $news_item):?>
<h2><?php echo $news_item['title']; ?></h2>
<div class="article">
	<?php echo $news_item['text']; ?>
</div>
<p><?php echo anchor("./news/".$news_item['id'],"View article") ?></p>
<p><hr/></p>
<?php endforeach;?>