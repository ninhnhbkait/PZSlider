<!DOCTYPE html>
<html>
<head>
    <title>Ví dụ 1</title>
</head>
<body>
<?php
if($data==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "<table>
          <tr>
            <td>id</td>
            <td>Title</td>
            <td>Description</td>
          </tr>";
    foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td>".$item['Book']['title']."</td>";
        echo "<td>".$item['Book']['description']."</td>";
        echo "</tr>";
    }
}
?>
</body>
</html>
