<?php
/**
 * Created by PhpStorm.
 * User: Mojtaba
 * Date: 6/29/2021
 * Time: 6:22 PM
 */

$data[0] = array(
    "gallery_id" => 4,
    "gallery_title" => "Title",
    "gallery_image" => "51a877f7c05692cbc3e6f98cd7973ba2-1624629029.jpg"
);
$data[1] = array(
    "gallery_id" => 1,
    "gallery_title" => "Picture Two",
    "gallery_image" => "51a877f7c05692cbc3e6f98cd7973ba2-1624629029.jpg"
);

class assocTable
{
    public static function table($fields, $items = array(), $links)
    {
        $keyOfArray = array_keys($fields[0]);
        foreach ($keyOfArray as $key => $value) {
            if(array_key_exists($value, $items['header']) && array_key_exists("label", $items['header'][$value])) {
                $items['header'][$value]['label'] = $items['header'][$value]['label'];
            }
            else
                $items['header'][$value]['label'] = ucfirst(str_replace("_", " ", $value));

        }
//        var_dump($labels['header']);
//        var_dump($keyOfArray);
//        die;
        echo "<table class='table table-bordered'>";
        echo "<thead class='bg-white'>";
        echo "<tr>";

        foreach ($items['header'] as $key => $value) {
            echo "<th>" .  $value['label'] . "</th>";
        }
        echo "<th> Actions </th>";
        echo "</tr>";
        echo "<tbody>";
        foreach ($fields as $columns) {
            echo "<tr>";
            foreach ($items['header'] as $key => $value) {
                echo "<td ";
                echo array_key_exists('options', $value) ? $value['options'] : "";
                echo ">";
                if(array_key_exists("type", $value)) {
                    if($value['type'] == "image") {
                        echo "<img src='" . $columns[$key] . "'/>";
                    }
                }
                else  echo $columns[$key] ;
                echo "</td>";
            }
            echo "<td>";
            foreach ($items['actions'] as $key => $value) {
                echo "
<a href='" . $value['url'] . "?" .  $items['priamryKey'] . "=" .  $columns[$items['priamryKey']]  . "'> <i class='fa fa-trash'></i> </a>";
            }
            echo "</td>";
            echo "</tr>";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container p-5">
    <div class="row">
        <?php
        // You can added a below properties for your columns :
        /*
         * options
         * label
         * type
         * */
        /*
         * Primary Key For Show Id in Actions!
         * */
        /*
         * Actions must be have url!
         * */
        $items = [
            'priamryKey' => 'gallery_id',
            'header' =>
                [
                    'gallery_id' => [
                        "options" => "onclick=\"alert('hello')\""
                    ],
                    'gallery_title' => [
                        'label' => "Title"
                    ],
                    'gallery_image' => [
                        'type' => 'image',
                    ]
                ],
            'actions' => [
                'delete' => [
                    'url' => "delete.php"
                ],
                'update' => [
                    'url' => 'edit.php'
                ]
            ]
        ];
        assocTable::table($data, $items, array());
        ?>
    </div>
</div>
</body>
</html>
