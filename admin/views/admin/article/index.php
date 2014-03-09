
<p>news</p>
<div>
	<ul>
		<?php
			foreach($news as $item){
				
				echo '<li><h3>'.$item['title'].'</h3></li>';
				echo $item['text'].'<hr/>';
			}
		?>
	</ul>
</div>