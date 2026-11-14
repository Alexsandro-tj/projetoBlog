<!DOCTYPE html>
<?php
/** @var PostagensModel $model
 */
/* require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
 */
//header("Content-Type:text/html; charset=ISO-8859-1", true);
// conexão com BD MySQL

$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$db = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
    $conexao = mysqli_connect($host, $user, $pass, $db, $port);
} catch (\Throwable $e) {

    echo "Erro de sistema: " . $e->getMessage() . $e->getCode();
}


$NPostagens = 0;
/* $sql = "SELECT * FROM t_apres";
if ($result = mysqli_query($conexao, $sql)) {
    if ($registro = mysqli_fetch_row($result)) {
        $BLOCO_APRESENT = array(
            "img" => "$registro[2]",
            "nome" => "$registro[1]",
            "descri" => "$registro[1]"
        );
    }
} */

 $BLOCO_POST = []; 
$sql = "SELECT * FROM t_post";
if ($result = mysqli_query($conexao, $sql))
    while ($registro = mysqli_fetch_row($result)) {
        $BLOCO_POST[] = $registro;
    } 

/* mysqli_close($conexao); */
function exibe_categoria(string $nome, bool $selecionado)
{
    $texto = ($selecionado)? "<span class = 'w3-tag w3-black w3-margin-bottom'>"
    : "<span class = 'w3-tag w3-light-grey w3-small w3-margin-bottom'>";

    $texto = $texto . $nome . "</span>";
    return ($texto);
}
function monta_cabecalho_principal(string $autor)
{
    $texto = "<header class = 'w3-container w3-center s3-padding-32'>";
    $texto = $texto . "<h1><b>Blog Pessoal</b></h1>";
    $texto = $texto . "<p> Seja Bem Vindo. Criado por <span class = 'w3-tag'>";
    $texto = $texto . $autor . "</span></p>";
    $texto = $texto . "</header>";
    return $texto;
}
function rodape(string $autor)
{
    $texto = "<footer class = 'w3-conatiner w3-dark-grey w3-margin-top w3-margin-bottom w3-cell-row'>";
    $texto = $texto . "<div class = 'w3-container w3-cell w3-cell-top'>";
    $texto = $texto . "<button class = 'w3-button w3-black w3-padding-large w3-margin-bottom'>";
    $texto = $texto . "Anterior" . "</button>";
    $texto = $texto . "<button class = 'w3-button w3-black w3-padding-large w3-margin-bottom'>";
    $texto = $texto . "Próximo" . "</button>";
    $texto = $texto . "</div>";
    $texto = $texto . "<div class = 'w3-container w3-cell w3-cell-bottom'>";
    $texto = $texto . "<br><br><br>";
    $texto = $texto . "<p>Todos os direitos reservados © Developed by " . $autor;
    $texto = $texto . "</p>" . "</div>";
    $texto = $texto . "<div class = 'w3-container w3-cell w3-cell-top'>";
    $texto = $texto . "<a href = '#' class = 'w3-padding w3-xxlarge fa fa-facebook'>" . "</a>";
    $texto = $texto . "<a href = '#' class = 'w3-padding w3-xxlarge fa fa-instagram'>" . "</a>";
    $texto = $texto . "<a href = '#' class = 'w3-padding w3-xxlarge fa fa-twitter'>" . "</a>";
    $texto = $texto . "</div>" . "</footer>";
    return $texto;
}
?>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Blog pessoal</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/6/w3.css">
    <link rel=”stylesheet” href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="w3-light-grey">
    
    <!--Cabeçalho-->
    <?php
    echo monta_cabecalho_principal($model->registro[0]['autor']);
    ?>
    <!--Conteúdo principal-->
    <div class="w3-row">
        <!--Coluna da Esquerda-->
        <div class="w3-col w3-container " style="width:65%">

            <?php
            while ($NPostagens < 2) {
            ?>
                <div class="w3-card-4 w3-margin w3-white">
                    <img src=" <?php echo $BLOCO_POST[$NPostagens][1] ?>" alt="Nature" style="width:100%;height: 350px;">

                    <div class="w3-container">
                        <h3><?php echo $BLOCO_POST[$NPostagens][0] . " - " ?> <b><?php echo $BLOCO_POST[$NPostagens][2] ?></b></h3>
                        <h5> <?php echo $BLOCO_POST[$NPostagens][3] ?> <span class="w3-opacity"><?php echo $BLOCO_POST[$NPostagens][4] ?></span></h5>
                    </div>

                    <div class="w3-container">
                        <p><?php echo $BLOCO_POST[$NPostagens][5] ?></p>
                        <div class="w3-row">
                            <div class="w3-colum" style="width:80%">
                                <p><button class="w3-button w3-padding-large w3-white w3-border">Leia Mais...</button></p>
                            </div>
                            <div class="w3-colum w3-hide-small" style="width:20%">
                                <p><span class="w3-padding-large w3-right"><b>COMENTÁRIOS</b><span class="w3-tag"><?php echo $BLOCO_POST[$NPostagens][6] ?></span></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $NPostagens++;
            }
            ?>
        </div>
        <!--Coluna da Direita-->
        <div class="w3-col w3-container " style="width:35%">
            <!--Bloco de Aprensentação-->
            <div class="w3-card w3-margin">

                <?php
                echo "<img src='{$model->registro[0]['foto']}' width='470px'>";
                echo "<div class='w3-container w3-white'>
                    <h4>Meu Nome é <b>{$model->registro[0]['autor']}</b></h4>
                    <p>{$model->registro[0]['descr']}</P>
                    </div>
                    </div>";
                ?>



                <hr>
                <!--Bloco Top 5-->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Postagens Mais Populares</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php
                        $sql = "SELECT * FROM t_top5";
                        if ($result = mysqli_query($conexao, $sql)) {
                            if ($registros = mysqli_fetch_all($result, MYSQLI_ASSOC)) {

                                foreach ($registros as $registro) {
                                    echo "<li class='w3-padding-16'>
                                <img src='$registro[img]' alt='' class='w3-left w3-margin-right' style='width:50px'> <span class='w3-large'>$registro[titulo]</span> <br>
                                <span>Comentários: $registro[ncoment]</span>";
                                }
                            };
                        }
                        ?>
                    </ul>
                </div>
                <hr>

                <!--Bloco Filtros-->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Categorias</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p>
                            <?php
                            echo exibe_categoria("Todas ", true);
                            echo exibe_categoria("Esportes ", false);
                            echo exibe_categoria("Política ", false);
                            echo exibe_categoria("Viajens ", false);
                            echo exibe_categoria("Família ", false);
                            echo exibe_categoria("Games ", false);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--Rodapé da Pagina-->
        <?php
        echo rodape($model->registro[0]['autor']);
        ?>
</body>

</html>