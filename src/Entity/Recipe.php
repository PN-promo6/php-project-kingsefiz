<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Recipe
{
    public int $id;
    public string $title;
    public string $country;
    public string $category;
    public string $ingredients;
    public string $description;
    public string $imageUrl;
    public string $creationDate;
    public User $creator;

    use Serializer;
}
