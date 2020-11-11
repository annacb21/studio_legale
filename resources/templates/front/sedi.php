<?php $sede = get_sede($_GET['id']); ?>
<?php $sedi = get_sedi(); ?>
<?php $acts = get_activities(); ?>

<div id="sedi">
    <!-- page title -->
    <h1 class="page_title">Sede di <?php echo $sede->get_city(); ?></h1>
    <div id="sede-comtainer">
        <div id="sede-left">
            <div id="sede-img">
                <img src="images/porta1.jpg" alt="">
            </div>
            <div id="sede-info">
            <h2><?php echo $sede->get_city(); ?></h2>
            <p><?php echo $sede->get_adress(); ?></p>
            <p><?php echo $sede->get_cap(); ?></p>
            <p>Tel. e fax <?php echo $sede->get_phone(); ?></p>
            </div>
        </div>
        <div id="sede-right">
            <h3>Prenota un appuntamento</h3>
            <form action="">
                <div class="input-field">
                    <label for="pname">Nome e cognome della parte</label>
                    <input type="text" id="pname" name="pname" placeholder="Nome e cognome della parte">
                </div>

                <div class="input-field">
                    <label for="cpname">Nome e cognome della controparte</label>
                    <input type="text" id="cpname" name="cpname" placeholder="Nome e cognome della controparte">
                </div>

                <div class="input-field">
                    <label for="sede">Sede dell'appuntamento</label>
                    <select name="sede" id="sede">
                        <?php
                            for($i = 0; $i < count($sedi); $i++) {
                                echo "<option value='{$sedi[$i]->get_city()}'>{$sedi[$i]->get_city()}</option>";
                            }
                         ?>
                    </select>
                </div>

                <div class="input-field">
                    <label for="area">Area di consulenza</label>
                    <select name="area" id="area">
                        <?php
                            for($i = 0; $i < count($acts); $i++) {
                                echo "<option value='{$acts[$i]->get_id()}'>{$acts[$i]->get_name()}</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>

                <div class="input-field">
                    <label for="phone">Recapito telefonico</label>
                    <input type="text" id="phone" name="phone" placeholder="Recapito telefonico">
                </div>

                <button type="submit" class="submitbtn">Invia</button>

            </form>
        </div>
    </div>
</div>