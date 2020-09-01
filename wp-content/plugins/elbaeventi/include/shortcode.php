<?php
//Recupero la data di inizio dell'evento per la ricerca
function ee_shortcode()
{
    ob_start(); ?>
<form method="post" action="">
    <input type="text" name="starts_at" /placeholder="Inserisci una data di inizio (formato 2018-06-20)">
    <button type="submit">Cerca eventi</button>
</form>
<?php
    //se il valore della data di inizio è vuoto definisco io una data
    $starts = isset($_POST['starts_at']) ? $_POST['starts_at'] : '';
    if ($starts == '') {
        $starts = '2018-06-20';
    }

    $url = "https://dati.elbaeventi.it/api/v1/events?start=${starts}&end=2018-06-22"; // percorso dell'endpoint API
    // Proteggo il url con hash md5
    $key = md5($url);
    // Uso transient per evitare di ricaricare la richiesta entro un limite e ricarica la cache
    $response = get_transient($key);
    if ($response === false) {
        $data = file_get_contents($url); // metto il contenuto dell'api in una variabile
        $response = json_decode($data, true); // coverto una stringa codificata JSON e in una variabile PHP.
        set_transient($key, $response, 10000);
    }
    // recupero i vari parametri ottenuti dall'api
    foreach ($response as $item) {
        $url = $item['url'];
        $title = $item['title'];
        // se c'è una foto allora la mettiamo, altrimenti mettiamo un placeholder
        $photo = '';
        if (count($item['photos']) > 0) {
            $photo = $item['photos'][0];
        } else {
            $photo = 'https://via.placeholder.com/400x200?text=Immagine%20non%20disponibile';
        }

        $day = new DateTime($item['startsAt']);

        $category = '';
        if (count($item['categories']) > 0) {
            $category = $item['categories'][0]['name'];
        } else {
            $category = 'Nessuna categoria';
        }

        $content = $item['content']; ?>
<div class="container">
    <div class="left">
        <a href="<?php echo $url ?>"><img class="img" src=<?php echo $photo ?>></a>
    </div>
    <div class="right">
        <h2 class="media-heading"><a href="<?php echo $url ?>"><?php echo $title ?></a></h2>
        <div class="date">
            <p>
                <i class="fa fa-calendar"></i>
                <abbr><?php echo $day->format('l d/m/Y'); ?></abbr>
            </p>
        </div>
        <p>
            <i class="fa fa-tags"></i>
            <a><?php echo $category ?></a>
        </p>
        <div class="description">
            <p><?php echo $content ?></p>
        </div>
    </div>
</div>
<?php
    }

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
// registro lo shortcode
add_shortcode('events', 'ee_shortcode');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\Lavoro\wordpress\wp-content\plugins\elbaeventi\include\style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="left"></div>
        <div class="right"></div>
    </div>
</body>

</html>
