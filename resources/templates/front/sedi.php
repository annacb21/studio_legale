<div id="sedi">
    <!-- page title -->
    <h1 class="page_title">Sede di <?php echo show_sede(); ?></h1>
    <div id="sede-comtainer">
        <div id="sede-left">
            <div id="sede-img">
                <img src="images/porta1.jpg" alt="">
            </div>
            <div id="sede-info">
                <h2><?php echo show_sede(); ?></h2>
                <p>via Emanuele Filiberto 43</p>
                <p>35122 Padova PD</p>
                <p>tel. e fax 049 654313</p>
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
                        <option value="padova">Padova</option>
                        <option value="roma">Roma</option>
                    </select>
                </div>

                <div class="input-field">
                    <label for="area">Area di consulenza</label>
                    <select name="area" id="area">
                        <option value="diritto">Diritti della persona, tutela, amministrazione di sostegno e trust</option>
                        <option value="affidamento">Affidamento figli e protezione dei minori a rischio</option>
                        <option value="separazioni">Separazioni, divorzi, scioglimento unioni tra persone dello stesso sesso e convivenze</option>
                        <option value="successioni">Successioni ed eredità</option>
                        <option value="adozioni">Adozioni e procreazione medicalmente assistita</option>
                        <option value="incidenti">Incidenti e omicidi stradali</option>
                        <option value="penale">Diritto penale della persona, dei minori e della famiglia</option>
                        <option value="violenza">Violenza alle donne, stalking, strumenti di tutela e ordini di protezione a favore del soggetto vulnerabile</option>
                        <option value="locazioni">Locazioni, recupero crediti, vendita di beni dei debitori e piani di rientro</option>
                        <option value="navigazione">Diritto della navigazione</option>
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