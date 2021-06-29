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
    public static function table($fields, $labels = array(), $links)
    {
        if ($labels == array()) {
            $keyOfArray = array_keys($fields[0]);
            foreach ($keyOfArray as $key => $value) {
                $labels[$value] = ucfirst(str_replace("_", " ", $value));
            }
        }
        echo "<table class='table table-bordered'>";
        echo "<thead class='bg-white'>";
        echo "<tr>";

        foreach ($labels as $key => $value) {
            echo "<th>" . $value . "</th>";
        }
        echo "<th> Actions </th>";
        echo "</tr>";
        echo "<tbody>";
        foreach ($fields as $columns) {
            echo "<tr>";
            foreach ($labels as $key => $value) {
                echo "<td>" . $columns[$key] . "</td>";
            }
            echo "<td>";
            foreach ($links as $link) {
                echo "
<a href='". $link['url'] .$columns[array_keys($labels)[0]]."'> " . $link['template'] . "</a>";
            }
            echo  "</td>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container p-5">
    <div class="row">
        <?php
        //            $labels = ['gallery_id' => "Id", "gallery_title" => "Title Of Picture", "gallery_image" => "Image"];
        $links =
            [
                'delete' =>
                    [
                        'template' => "<i class='fa fa-trash'></i>",
                        'url' => "delete.php?id="
                    ],
                'update' =>
                    [
                        'template' => "<i class='fa fa-pen'></i>",
                        'url' => "update.php?id="
                    ]
            ];
        assocTable::table($data,array(), $links);
        ?>
    </div>
</div>
</body>
</html>
