<?php
/* @var $this PostController */

$this->breadcrumbs=array(
	'Post',
);
?>
<h1>Все страницы</h1>

<p>
	Вывод всех страниц
</p>


<?php foreach ($model as $value): ?>
    <h1><?=$value->title?></h1>
    <p><?=$value->content?></p>
    <hr><br>
<?php endforeach; ?>


<div class="tacen">
    <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
    ))?>
</div>