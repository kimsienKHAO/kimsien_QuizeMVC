<div id="users">
       
        <div class="pull-right">
            <a href="index.php?action=add"><i class="glyphicon glyphicon-plus-sign" style="font-size:20px;"></i></a> &nbsp;
        </div>
        
    </div>
    <form action="employee.php" method="post">
        <table class="table-bordered col-md-12">
            <th class="sort text-center">ID</th>
            <th class="sort text-center" data-sort="fname">UserName</th>
            <th class="sort text-center" data-sort="age">name</th>
            <th class="sort text-center" data-sort="salary">Password</th>
            <th class="sort text-center">Action</th>
            <!-- IMPORTANT, class="list" have to be at tbody -->
            <tbody class="list">
                <?php
                    $i = 1;
                    foreach($data['employee_data'] as $rows){
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-center"><?php echo $rows['username']. " ".$rows['lastname']; ?></td>
                                <td class="text-center"><?php echo $rows['name']; ?></td>
                                <td class="text-center"><?php echo $rows['password'];?></td>
                                <td class="text-center">
                                    <a href="index.php?action=detail&id=<?php echo $rows['id']; ?>">&nbsp;<i class="glyphicon glyphicon-eye-open" style="font-size:20px;"></i></a>
                                    
                                    <a href="index.php?action=update&id=<?php echo $rows['id']; ?>">&nbsp;<i class="glyphicon glyphicon-edit" style="font-size:20px;"></i></a> 
                                    <a href="index.php?action=delete&id=<?php echo $rows['id']; ?> onclick="return confirm('are u sure?')"">&nbsp;<i class="glyphicon glyphicon-trash" style="font-size:20px; color: red;"></i></a> &nbsp;
                                </td>
                            </tr>
                        <?php
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </form>
</div>

<script>
    var options = {
        valueNames: ['id', 'fname', 'age', 'salary']
    };

    var userList = new List('users', options);
</script>