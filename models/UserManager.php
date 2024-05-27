<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}
function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;

  // Requête SQL pour récupérer l'utilisateur avec le nom d'utilisateur donné
  $response = $PDO->query("SELECT id, password FROM user WHERE nickname = '$username'");
  $user = $response->fetch(PDO::FETCH_ASSOC);

  if ($user && $user['password'] === $password) {
    // Si l'utilisateur existe et le mot de passe est correct
    return $user['id'];
  } else {
    // Si l'utilisateur n'existe pas ou le mot de passe est incorrect
    return -1;
  }
}
