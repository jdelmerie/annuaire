<?
require_once 'inc/db-connect.inc.php';
require_once 'inc/header.inc.php';
?>
<body>

<div class="container">
    <div class="entete">
        <h1>Annuaire Robot</h1>
        <? require_once 'inc/menu.inc.php'; ?>
    </div>
        <div class="row d-flex justify-content-around">
            <?foreach ($users as $user) {?>
            <div class="col-md-3 card user-card">
                <img src="<?=$user['photo']?>" width="150px" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title" style=<?echo $user['gender']=='Male' ? 'color:blue' : 'color:pink' ?>
                        ><?=$user['first_name']?> <?=$user['last_name']?></h5>
                    <p class="card-text"><?=$user['slogan']?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">E-mail : <?=$user['email']?></li>
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Téléphone : <?=$user['phone']?></li>
                </ul>
                <div class="card-footer">
                    <a href="user.php?id=<?=$user['id']?>" class="card-link btn btn-primary">Voir la fiche</a>
                </div>

            </div>
            <?}?>
            <div class="w-100"></div>
        </div>

    <?require_once 'inc/footer.inc.php'?>
</div>
</body>
</html>

