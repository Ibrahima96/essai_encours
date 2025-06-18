<?php 
include_once './header.php';
include_once './config/link_database.php';

$p = $_POST;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($p['nom']) && isset($p['email']) && isset($p['salaire'])) {
        $nom = trim($p['nom']);
        $email = trim($p['email']);
        $salaire = floatval($p['salaire']);

        if (!empty($nom) && !empty($email) && $salaire > 0) {
            $query = 'INSERT INTO employes (nom, email, salaire) VALUES (:nom, :email, :salaire)';
            $requete = $pdo->prepare($query);
            $requete->execute([
                'nom' => $nom,
                'email' => $email,
                'salaire' => $salaire
            ]);

            header('Location: show.php?msg=' . urlencode("Ajout effectué avec succès 🎊"));
            exit;
        }
    }
}
?>


<h2 class="text-center font-thin text-2xl mt-5">Ajouters les Employers</h2>
<form action="" method="POST" class=" max-w-xl space-y-3 flex flex-col mx-auto mt-20 pt-10 pb-20">
    <a href="./show.php" class="btn underline btn-ghost px-5 w-fit">Retour</a>
    <label class="mb-3 block">
        <input
            type="text"
            placeholder="nom"
            class="input w-full" name="nom">
    </label>
    <label class="mb-3 block">
        <input
            type="email"
            placeholder="email"
            class="input w-full" name="email">
    </label>
    <label class="mb-3 block">
        <input
            type="text"
            placeholder="salaire"
            class="input w-full" name="salaire">
    </label>
    <input type="submit" value="ajouter" class="w-fit px-8 btn btn-info text-white">
</form>