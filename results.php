<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
        $searchtype = $_POST['searchtype'];
        $searchterm = $_POST['searchterm'];

    // TODO 2: Check and filter data coming from the user.
    if(isset($searchtype)&&
    isset($searchterm)){
        
    }
     // TODO 3: Setup a connection to the appropriate database.
     $conn = new mysqli('localhost', 'root', '', 'publications');
     if ($conn->connect_error) die("Fatal Error");

     // TODO 4: Query the database.
    $query="SELECT * FROM catalogs where $searchtype LIKE '%$searchterm%'";
    $result=$conn->query($query);

    // TODO 5: Retrieve the results.
    $rows = $result->num_rows;

     // TODO 6: Display the results back to user.
     echo "<table>
         <tr>
             <th>Isbn</th>
             <th>Author</th>
             <th>Title</th>
             <th>Price</th>
         </tr>
     ";

     for ($h = 0; $h < $rows; $h++) {
         $row = $result->fetch_array(MYSQL_NUM);
         echo "<tr>";
             for ($i=0; $i < 4; $i++) {
                 echo "<td>" . htmlspecialchars($row[$i]) . "</td>";
                 
             }
         echo "</tr>";
     }else{
        echo"Error.Please search again";

     }

     echo "</table>";

     // TODO 7: Disconnecting from the database.
    $conn->close();

    ?>
</body>
</html>

