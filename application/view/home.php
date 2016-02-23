<?php $this->show('common/header') ?>
    <div class="headline"><?php echo "Hello, JunePHP!";?></div>
    <div class="info">
        <p><?=$usage?></p>
        <p>
            <?php if ($version): ?>
                Mysql is Online, Version:<?=$driver?> <?=$version?>
            <?php endif ?>
        </p>
    </div>
    <div class="copyright">
        <p>Author:<a href="mailto:<?=$app_author_email?>"><?=$app_author?></a> &nbsp;&nbsp;&nbsp;&nbsp;  Github：<a href="<?=$app_website?>"><?=$app_name?></a></p>
    </div>
<?php $this->show('common/footer') ?>
