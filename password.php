<?php //Hachage du mdp

// correct password
$password = "Loumi";
echo 'Le mot de passe est: ' . $password . ' <br>';

// hash the password and assign to variable "$HashedPassword"
$HashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo 'Le hashage du mot de passe est : ' . $HashedPassword . '<br><br>';

// Comparons les variables $password et $HashedPassword

//if($password_verify('Loumi', $HashedPassword)) {
if($password_verify($_POST[variable], $HashedPassword)) {
    echo 'Password matches!' .'<br>';
} else {
    echo 'Mot de passe invalide' . '<br>';
}

?>
