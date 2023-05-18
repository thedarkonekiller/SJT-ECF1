<?php if (empty($_COOKIE['rgpd']) || $_COOKIE['rgpd'] != "accepted") { ?>

<div class="flex rgpd">
    <div class="flex flex-col">
        <h2>Gérer mes cookies</h2>
        <h3>Utilisation</h3>
        <p>
            Nous utilisons différents cookies qui ont pour but de :
                <ul>
                    <li>Gérer votre navigation sur notre site</li>
                    <li>Vous proposer de la publicité personnalisée</li>
                    <li>Vous proposer de la publicité géolocalisée</li>
                    <li>Partager du contenu sur les réseaux sociaux</li>
                </ul>
        </p>
        <h3>Conservation</h3>
        <p>
            Nous conservons votre choix pendant 6 mois. Vous pouvez changer d'avis à tout moment sur le lien "Gérer mes cookies" en bas à droite de chaque pages de notre site.
        </p>
            </div>
            <div class="flex">
        <form action="/webfiles/scripts/cookies/rgpd.php" method="get" class="flex">
            <button type="submit">tout accepter</button>
        </form>
    </div>
</div>

<?php } ?>