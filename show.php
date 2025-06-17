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
        <table class="w-full table base-100">
            <thead class="py-2">
                <tr>

                    <th>nom</th>
                    <th>email</th>
                    <th>salair</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row->nom ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->salaire ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row->id ?>" class=" btn btn-outline btn-primary inline-flex mr-2  text-sm font-thin">edit</a>
                            <a href="delete.php?id=<?= $row->id ?>" class=" btn btn-outline btn-secondary inline-flex mr-2 text-sm font-thin">delete</a>
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