<?php

namespace Entity;

use ludk\Utils\Serializer;

class User
{
    public int $id;
    public string $username;
    public string $password;

    use Serializer;
}
