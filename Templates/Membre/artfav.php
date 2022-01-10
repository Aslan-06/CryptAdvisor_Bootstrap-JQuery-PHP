
<ul>
    <?php if(isset($data) && !empty($data)):?>
        <?php foreach ($data as $value):?>
        <li>
            <a href='?action=details&module=Article&action=<?= $value->id?>'> </a>
        </li>
        <?php endforeach?>
        <?php else:?>
            pas d'article fav
    <?php endif?>
</ul>