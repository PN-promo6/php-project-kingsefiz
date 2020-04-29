<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Recipe
{
    public $id;
    public $title;
    public $country;
    public $category;
    public $ingredients;
    public $description;
    public $imageUrl;
    public $creationDate;
    public User $creator;

    use Serializer;
}
