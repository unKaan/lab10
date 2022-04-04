<?php
header("Content-Type: application/json");
$all = getallheaders();

function sql($sql, $dbconn = null)
{
 $db = pg_connect("host=localhost port=5432 dbname=lab9 user=postgres");
 $result = pg_query($db, $sql);
 return pg_fetch_all($result);
}


$shared_key = $all["Authentification"] ?? "";

$key = explode(" ", $shared_key);

$dentist_tokens = sql("select * from dentist_auth where auth = '$key[1]';");

if(count($key)>1){
  if(!($key[0]=="OttawaDentistry")){
    $reply = [
      "error" => "Token Identifiant Invalide",
      "token" => $key[0]
    ];

    echo json_encode($reply);
    exit;
  }
  else{
    if(count($dentist_tokens)>0) {
        $status = true;
    }
    else{
        $status = false;
    }
    if($status){
      $reply = [
        "token" => $key[0],
        "type" => "Correct"
      ];
      echo "\n";
      echo json_encode($reply);


      $dentist_tokens = sql("select * from dentist_client where auth_d = '$key[1]';");
        foreach ($dentist_tokens as $client) {
            $reply = [
              "Nom" => $client["client_nom"] ?? "",
              "Adhesion" => $client["adhesion"] ?? "",
            ];
            echo "\n";
            echo json_encode($reply);
          }


    }else{
      $reply = [
        "token" => $key[0],
        "type" => "Incorrect"
      ];
      echo "\n";
      echo json_encode($reply);
      exit;
    }

  }
}
