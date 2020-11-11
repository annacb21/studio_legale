<?php $acts = get_activities(); ?>

<div id="activities">
    <h1 class="page_title">Aree di attività</h1>
    <div class="cards-list">

<?php
for($i=0; $i < count($acts); $i++) {
$act = <<<DELIMETER
<div class="card">
    <div class="card_title">
        <p>{$acts[$i]->get_name()}</p>
    </div>
    <div class="card_desc">
        <p>{$acts[$i]->get_short_desc()}</p>
    </div>
    <a href="../public/index.php?activities&id={$acts[$i]->get_id()}'">Approfondisci</a>
</div>
DELIMETER;
echo $act;
}
?>

    </div>
</div>