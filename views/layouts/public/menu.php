<ul class="nav nav-stacked">
    <?php if(!empty($allMenu) && is_array($allMenu)):?>
        <?php foreach ($allMenu as $menu): ?>
            <?php if(count($menu['child']) == 1):?>
                <li <?php if (isset($menu['class'])) {echo 'class=active';} ?>>
                    <a href="<?=\yii\helpers\Url::toRoute($menu['child'][0]['url'])?>">
                        <i class="<?=$menu['icon'] ?>"></i>
                            <?=$menu['name'];?>
                    </a>
                </li>
            <?php else:?>
                <li class="menu <?php if (isset($menu['class'])) {echo 'active';} ?>">
                    <a class="menu-toggle" href="#">
                        <i class="<?=$menu['icon'] ?>"></i>
                        <?=$menu['name'];?>
                        <i class="caret"></i></a>
                    </a>
                    <ul class="submenu">
                    <?php if(!empty($menu['child']) && is_array($menu['child'])):?>
                        <?php foreach ($menu['child'] as $menuitem): ?>
                            <li <?php if (isset($menuitem['class'])) {echo 'class=active';} ?>>
                                <a href="<?=\yii\helpers\Url::toRoute($menuitem['url'])?>">
                                    <i class="fa fa-sort-alpha-asc fa-fw"></i>
                                    <span>
                                        <?=$menuitem['title']?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach;?>
                    <?php endif; ?>
                    </ul>
                </li>
            <?php endif;?>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
