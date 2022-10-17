<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qual seu signo</title>
</head>

<body>            
    <?php                
    $data = $_POST['dataNasc'];
    $date = new DateTime($data);
    $dateSig = $date->format('m/d');                
    
    $xml = simplexml_load_file('sig.xml');
                    
    echo '<h2> Seu signo é ';
    foreach ($xml->signo as $registro) :
        if ($dateSig >= $registro->dataInicio and $dateSig <= $registro->dataFim) {
            echo '<span style="color:red">' . $registro->signoNome . '</span></h2>';
            echo '<p>' . $registro->descricao . '<p>';
        }
    endforeach;
    ?>       

    <a href="./index.php">Voltar</a>        
    
</body>
</html>