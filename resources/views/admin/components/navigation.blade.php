<?php foreach((array) config('navigation') as $group => $elem): ?>
    <li class="text-muted menu-title"><?=$group?></li>
    <?php foreach($elem as $el): ?>
        <?php if (isset($el['pages'])): ?>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="<?=$el['icon']?>"></i>
                    <span> <?=$el['name']?></span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <?php foreach($el['pages'] as $ch): ?>
                    <li><a href="<?=$ch['url']?>"><?=$ch['name']?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php else : ?>
        <li class="has_one">
            <a href="<?=$el['url']?>" class="waves-effect">
                <i class="<?=$el['icon']?>"></i>
                <span> <?=$el['name']?> </span>
            </a>
        </li>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>