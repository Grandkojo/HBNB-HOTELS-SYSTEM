<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <?php
        include "admin/config.php";

        $q = $_GET['q'];

        $sql = "SELECT NAME, LOCATION FROM room WHERE NAME LIKE :search OR LOCATION LIKE :search";
        $stmt = $conn->prepare($sql);
        $searchParam = '%' . $q . '%';
        $stmt->bindParam(':search', $searchParam);
        $stmt->execute();
        $residence = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table class='table table-hover'>";
        $limit = 5;
        $count = 0;
        foreach ($residence as $value) {
            echo "<tr>";
            echo "<td class='text-center' style='cursor:pointer'>" . $value['LOCATION'] . "</td>";
            echo "</tr>";
            $count++;

            if ($count >= $limit) {
                break;
            }
        }

        echo "</table>";

        ?>
</body>

</html>