<h1><a href="/">Site das Flores</a></h1>
<?php foreach($articles as $article): ?>
<div class="tile">
<?php echo $article['content']; ?>
<a href="<?php echo base_url($article['md5']) ?>">[link]</a>
</div>
<?php endforeach; ?>