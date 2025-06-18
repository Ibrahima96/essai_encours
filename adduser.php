<?php include_once './header.php' ?>
<h2 class="text-center font-thin text-2xl mt-5">Ajouters les Employers</h2>
<form action="" method="POST" class=" max-w-xl space-y-3 flex flex-col mx-auto mt-20 pt-10 pb-20">
        <a href="./show.php" class="btn underline btn-ghost px-5 w-fit">Retour</a>
        <label class="mb-3 block">
            <input
                type="text"
                placeholder="nom"
                class="input w-full" name="username">
        </label>
        <label class="mb-3 block">
            <input
                type="email"
                placeholder="email"
                class="input w-full" name="email" >
        </label>
        <label class="mb-3 block">
            <input
                type="text"
                placeholder="salaire"
                class="input w-full" name="salaire">
        </label>
        <input type="submit" value="ajouter" class="w-fit px-8 btn btn-info text-white">
    </form>