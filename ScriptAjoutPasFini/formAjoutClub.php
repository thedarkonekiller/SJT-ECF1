<h1>Formulaire d'ajout pour un Club</h1>
<form action="" method="POST">
<label for="sujet">Dans qu'elle ligue ce club evolue ?</label>
<select name="ligue">
    <option value="pL">Premier League</option>
    <option value="lS">Liga Santander</option>
    <option value="bL">Bundesliga</option>
    <option value="l1">Ligue 1</option>
    <option value="sA">Serie A</option>
    <option value="lN">Liga Nos</option>
    <input type="text" name="nameClub" placeholder="Ex : Paris Saint-Germain">
    <input type="text" name="createDate" placeholder="Ex : 1970">
    <input type="text" name="locStade" placeholder="Ex : Parc des Princes">
    <textarea name="paragClub" cols="30" rows="10" placeholder="Ex&nbsp;:&nbsp; Le Paris Saint-Germain a vu le jour le 12 août 1970, fruit de la fusion entre un Paris FC créé un an plus tôt pour combler l'absence d'un club de haut niveau dans la capitale, et le Stade Sangermanois etc">
    </textarea>
    <input type="url" name="imgClub" placeholder="Logo du Club">
    <button type="submit">Ajouter le Club</button>
</form>