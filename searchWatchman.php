 <?php
    include_once './util.php';
    include_once 'dbconnect.php';
    $conn = new DBConnector();
    $pdo = $conn->connectToDB();
    if (isset($_POST['search'])) {
    ?>
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>id</th>
                 <th>Profile Picture</th>
                 <th>FirstName</th>
                 <th>LastName</th>
                 <th>Location</th>
                 <th>Service</th>
                 <th>Choose</th>
             </tr>
         </thead>
         <tbody>
             <?php
                $keyword = $_POST['keyword'];
                $query = $pdo->prepare("SELECT * FROM `hirer` WHERE  (`firstname` LIKE '%$keyword%' or `lastname` LIKE '%$keyword%' or `location` LIKE '%$keyword%')AND `service` IN ('Watchman ') ");
                $query->execute();
                while ($row = $query->fetch()) {

                ?>
                 <tr>
                     <td><?php echo $row['id'] ?></td>
                     <td><img src="images/ <?php echo $row['image']; ?>" width="100" height="100"></td>
                     <td><?php echo $row['firstname'] ?></td>
                     <td><?php echo $row['lastname'] ?></td>
                     <td><?php echo $row['location'] ?></td>
                     <td><?php echo $row['service'] ?></td>
                     <td><a href="checkout.php?hirer=<?php echo $row['email']; ?>"><i class="material-icons" style='font-size:48px;color:black'>&#xf00c;</i> </a>
                     </td>
                 </tr>
             <?php
                }
                ?>
         </tbody>
     </table>
 <?php
    } else {
    ?>
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>id</th>
                 <th>Profile Picture</th>
                 <th>FirstName</th>
                 <th>LastName</th>
                 <th>Location</th>
                 <th>Services</th>
                 <th>Choose</th>
             </tr>
         </thead>
         <tbody>
             <?php
                $query = $pdo->prepare("SELECT * FROM `hirer` where service IN ('Watchman ')
                                ");
                $query->execute();
                while ($row = $query->fetch()) {
                ?>
                 <tr>
                     <td><?php echo $row['id'] ?></td>
                     <td><img alt="DP" src="images/ <?php echo $row['image']; ?>" width="100" height="100">
                     </td>
                     <td><?php echo $row['firstname'] ?></td>
                     <td><?php echo $row['lastname'] ?></td>
                     <td><?php echo $row['location'] ?></td>
                     <td><?php echo $row['service'] ?></td>
                     <td><a href="checkout.php?hirer=<?php echo $row['email']; ?>"><i class="material-icons" style='font-size:48px;color:black'>&#xf00c;</i> </a>
                     </td>

                 </tr>
             <?php
                }
                ?>

         </tbody>
     </table>
 <?php
    }
    ?>
 </div>