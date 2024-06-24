<?php require(__DIR__.'/../header.php'); ?>
    <!-- <h3>Главная страница</h3> -->
    <?php foreach($articles as $article):?>
    <div class="card mt-4" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?=$article['title'];?></h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
        <p class="card-text"><?=$article['text'];?></p>
        <!-- <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a> -->
    </div>
</div>
<?php endforeach;?>
<?php require(__DIR__.'/../footer.php'); ?>