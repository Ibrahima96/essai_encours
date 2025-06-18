<?php
require_once './header.php';
require_once './config/link_database.php';

$id = $_GET['id'];

// Sélectionner l'employé correspondant
$requet = $pdo->prepare("SELECT * FROM employes WHERE id = :id");
$requet->execute(['id' => $id]);
$rows = $requet->fetch();

$p = $_POST;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($p['nom']) && isset($p['email']) && isset($p['salaire'])) {

        $nom = $p['nom'] ?? "";
        $email = $p['email'] ?? "";
        $salaire = $p['salaire'] ?? "";

        $requet = $pdo->prepare("UPDATE employes SET nom = :nom, email = :email, salaire = :salaire WHERE id = :id");
        $requet->execute([
            "nom" => $nom,
            "email" => $email,
            "salaire" => $salaire,
            "id" => $id
        ]);

        header('location:show.php?msg=' . urlencode("Changement effectué avec succès 😁"));
    }
}
?>


<section class="max-w-xl mx-auto px-4 pt-10 pb-32">
    <h2 class="mb-8 text-4xl font-thin text-center">Ajouter des Employers</h2>
    <a href="./show.php" class="btn inline-flex font-thin underline hover:bg-gray-100 mb-3 btn-ghost">Annuler</a>
    <form action="" method="POST" class=" w-full space-y-3 flex flex-col">

        <label class="mb-3 block">
            <input
                type="text"
                placeholder="nom"
                class="input w-full" name="nom" value="<?php echo htmlspecialchars($rows['nom']); ?>">
        </label>
        <label class="mb-3 block">
            <input
                type="email"
                placeholder="email"
                class="input w-full" name="email" value="<?php echo htmlspecialchars($rows['email']); ?>">
        </label>
        <label class="mb-3 block">
            <input
                type="text"
                placeholder="salaire"
                class="input w-full" name="salaire" value="<?php echo htmlspecialchars($rows['salaire']); ?>">
        </label>
        <input type="submit" value="modifier" class="block btn btn-info text-white">
    </form>
</section>