<h1><a href="/">Blog</a></h1>
<h2>Bem-vindo ao blog das flores</h2>
<?php foreach($titles as $title): ?>
<h3>
    <a href="/<?php echo $title['md5'] ?>"><?php echo $title['title'] ?></a>

    <span class="create_at"><?php echo $title['create_at'] ?></span>
</h3>
<?php endforeach; ?>