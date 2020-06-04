<?php require_once("header.php");
?>

<div class="container">
    <div class="row">
        <div class="offset-2 col-lg-8">
            <form method="Post">
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label for="recipeName">Nom de la recette</label>
                        <input type="text" class="form-control" name="title" id="inputEmail4" placeholder="ex : Tiramisu aux fruits rouges">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="country">Pays d'origine</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="ex : Italie">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-lg-12">
                        <label for="ingredients">Ingrédients</label>
                        <input type="text" class="form-control" name="ingredients" id="ingredients" placeholder="ex : Oeufs, mascarpone, biscuits, fruits rouges">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">Description</label>
                        <textarea style="resize: none;" class=" form-control" name="description" id="description" rows="2" placeholder="ex : Séparer les blancs des jaunes d'oeufs ... etc"></textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="category">Catégorie</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="ex : Entrée">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="imageUrl">Url de l'illustration </label>
                        <input type="text" class="form-control" name="imageUrl" id="imageUrl" placeholder="ex : https://unsplash.com/photos/pxTe1qZjcvI">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Valider</button>
            </form>
        </div>
    </div>

    <?php
    require_once("footer.php");
