<?php
function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['fullName'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Auteur inconnu';
}

function isValidRecipy(array $recipy): bool {
    if (array_key_exists('isEnabled', $recipy))
    {
        $isEnabled = $recipy['isEnabled'];
    }else{
        $isEnabled = false;
    }
    return $isEnabled;
}

function getRecipes(array $recipies) : array {

    $validRecipies = [];

    foreach ($recipies as $recipy) {
        if (isValidRecipy($recipy)) {
            $validRecipies[] = $recipy;
        }
    }
    return $validRecipies;
} 

function redirectToUrl(string $url) : never
{
    header("Location: {$url}");
    exit();
}