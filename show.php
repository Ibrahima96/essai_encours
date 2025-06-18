<?php

require_once './config/link_database.php';

$requet = $pdo->prepare("SELECT * FROM employes");
$requet->execute();
$rows = $requet->fetchAll(PDO::FETCH_OBJ);

?>
<!-- header -->
<?php require_once './header.php' ?>

<body>
    <h1 class="text-center text-2xl sm:text-3xl font-thin mt-10 mb-20">Tableau des Employers</h1>

    <section class="pt-10 pb-20 max-w-6xl mx-auto  rounded">
        <a href="adduser.php" class="btn mb-4 font-thin btn-md px-8 bg-blue-300/25">Ajouter</a>
        <table class="w-full table base-200 table-zebra">
            <thead class="py-2">
                <tr>

                    <th>nom</th>
                    <th>email</th>
                    <th>salair</th>
                    <th class="px-16">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row->nom ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->salaire ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row->id ?>" class=" btn btn-ghost inline-flex mr-2  text-sm font-thin"><img src="https://img.icons8.com/?size=100&id=IQwdXd0kulpV&format=png&color=000000" alt="" class="w-9 avatar"></a>
                            <a href="delete.php?id=<?= $row->id ?>" class=" btn btn-ghost inline-flex mr-2 text-sm font-thin"><img src="https://img.icons8.com/?size=100&id=2knQ4stRSwda&format=png&color=000000" alt=""  class="w-9 avatar"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if(isset($_GET['msg'])) :?>
         <p role="alert" class="alert alert-success alert-soft">
            <?=$_GET['msg'] ?>
         </p>
         <?php endif?>
    </section>
    <?php require_once './footer.php' ?>