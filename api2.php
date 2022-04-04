<?php
header("Content-Type: application/json");
$all = getallheaders();

$shared_key = $all["Authentification"] ?? "";

$key = explode(" ", $shared_key);
if(count($key)>1){
  if(!($key[0]=="OttawaDentistry")){
    $reply = [
      "error" => "Token Identifiant Invalide",
      "token" => $shared_key
    ];

    echo json_encode($reply);
    exit;
  }
  else{
    switch ($key[1]) {
      case "ottawaPassword":
        $status = true;
        break;
      default:
        $status = false;
        break;
    }
    if($status){
      $reply = [
        "token" => $key[0],
        "type" => "Correct"
      ];
      echo "\n";
      echo json_encode($reply);
      }

      $shared_key = $all["Dentist"] ?? "";

      switch ($shared_key) {
        case "A":
          $office = "1 Helgin Street";
          break;
        case "B":
          $office = "3 Bank Street";
          break;
        default:
          $office = "inconnu";
          break;
      }

      $reply = ["Nom" => $shared_key, "Office" => $office];
      echo json_encode($reply);

      exit;


  }
}
