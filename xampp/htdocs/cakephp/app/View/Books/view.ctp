<html>
<title></title>
<body>
   <?php echo $this->Form->create('Book',array('url'=>'search'));?>
   <?php
    echo $this->Form->input('title');
    echo $this->Form->input('description');
    echo $this->Form->submit('Search');
   ?>
   <?php echo $this->Form->end();?>
   <?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
   <!--Hiển thị dữ liệu sau khi tìm kiếm-->
   <?php if(!empty($posts)){?>
   <table>
    <tr>
    <th><?php echo $this->Paginator->sort("id","Id");?></th>
    <th><?php echo $this->Paginator->sort("title","Tiêu đề");?> </th>
    <th><?php echo $this->Paginator->sort("description","Nội dung");?></th>
    </tr>
   <?php
    foreach($posts as $item){
     echo "<tr>";
     echo "<td>".$item['Book']['id']."</td>";
     echo "<td>".$item['Book']['title']."</td>";
     echo "<td>".$item['Book']['description']."</td>";
     echo "</tr>";
    }
   ?>
   </table>
 <?php
   echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'));
   echo " | ".$this->Paginator->numbers()." | ";
   echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled'));
 } ?>
</body>
</html>