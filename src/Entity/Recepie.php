<?php

namespace Entity;

use Entity\User;

class Recepie
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
}
