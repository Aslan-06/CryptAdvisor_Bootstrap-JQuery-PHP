<style>

.bg-red{
    background:red;
}

.span{
    display:block;
}

</style>

<div class="bg-red">
    <span class="span">Articles possédant le tag recherché :</span>
    
    <a href="index.php?module=Article&action="><?= $article->titre?></a>
</div>