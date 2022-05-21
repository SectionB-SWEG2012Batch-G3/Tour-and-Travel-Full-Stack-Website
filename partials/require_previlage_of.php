<?php
function require_previlage_of($user_role, ...$allowed_for)
{
    if (!in_array($user_role[0], $allowed_for)) {
        echo "no auth";
        header("Location: http://localhost/Tour-and-Travel-Full-Stack-Website/partials/unauthorized.php");
    }
}
