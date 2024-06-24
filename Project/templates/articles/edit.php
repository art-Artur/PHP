<?php require(__DIR__.'/../header.php'); ?>
    <form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/update/<?=$article->getId();?>" method='POST'>
    <div class="form-group">
        <label for="title">Title arcticle</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$article->getTitle();?>">
    </div>
    <div class="form-group">
        <label for="text">Text arcticle</label>
        <textarea name="text" id="text" class="form-control"><?=$article->getText();?></textarea>
    </div>
    <input type="hidden" name="authorId" value="<?=$article->getAuthorId()->getId();?>">
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?php require(__DIR__.'/../footer.php'); ?>