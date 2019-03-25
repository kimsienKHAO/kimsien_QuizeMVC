<div id="users">
    <div class="col-md-12 row-fluid">
        <div class="pull-left">
            <input class="search" placeholder="Search" />
        </div>
        
        <form method='post' action="index.php?action=logout">
            <input class="btn btn-info" type="submit" value="Logout" name="but_logout">
        </form>
        <form method='post' action="index.php?action=manageuser">
            <input class="btn btn-warning float-right" type="submit" value="manage" name="but_manage">
        </form>
        <div class="pull-right">
            <a href="index.php?action=add"><i class="glyphicon glyphicon-plus-sign" style="font-size:20px;"></i></a> &nbsp;
        </div>
        
    </div>
    <form action="employee.php" method="post">
        <table class="table-bordered col-md-12">
            <th class="sort text-center">ID</th>
            <th class="sort text-center" data-sort="fname">Student Name</th>
            <th class="sort text-center" data-sort="age">Age</th>
            <th class="sort text-center" data-sort="salary">Salary</th>
            <th class="sort text-center">Action</th>
            <!-- IMPORTANT, class="list" have to be at tbody -->
            <tbody class="list">
                <?php
                    $i = 1;
                    foreach($data['employee_data'] as $rows){
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-center"><?php echo $rows['firstname']. " ".$rows['lastname']; ?></td>
                                <td class="text-center"><?php echo $rows['age']; ?></td>
                                <td class="text-center"><?php echo $rows['salary']; ?></td>
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