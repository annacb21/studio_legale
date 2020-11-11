<?php $teams = get_teams(); ?>

<div id="team">
    <h1 class="page_title">Il team</h1>
    <div class="cards-list">

<?php
for($i = 0; $i < count($teams); $i++) {
$photo = display_image($teams[$i]->get_img());
$team = <<<DELIMETER
<div class="card">
    <img src="../public/{$photo}" alt="Foto team">
    <div class="card_title">
        <h2>{$teams[$i]->get_name()}</h2>
    </div>
    <div class="card_desc">
        <p>{$teams[$i]->get_role()}</p>
        <p>{$teams[$i]->get_email1()}</p>
        <p>{$teams[$i]->get_email2()}</p>
        <p>{$teams[$i]->get_desc()}</p> 
    </div>
    <a href="../public/index.php?team&id={$teams[$i]->get_id()}'">Vedi curriculum</a>
</div>
DELIMETER;

echo $team;
}
?>

    </div>
</div>