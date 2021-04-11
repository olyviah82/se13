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
                $query = $pdo->prepare("SELECT * FROM `hirer` WHERE  (`firstname` LIKE '%$keyword%' or `lastname` LIKE '%$keyword%' or `location` LIKE '%$keyword%')AND `service` IN ('Laundry') ");
                $query->execute();
                while ($row = $query->fetch()) {

                ?>
         <form method='post' action="checkout.php?action=add&email=<?php echo $row["email"]; ?>">
             <tr>
                 <td><input type="text" name="id" value=" <?php echo $row['id'] ?>" /></td>
                 <td><img src="images/ <?php echo $row['image']; ?>" width="100" height="100"></td>
                 <td><input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" /></td>
                 <td><input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" /></td>
                 <td><input type="text" name="location" value="<?php echo $row['location'] ?>" /></td>
                 <td><input type="text" name="service" value="<?php echo $row['service'] ?>" /></td>
                 <td<button type="submit" name="add "><i class="material-icons"
                         style='font-size:48px;color:black'>&#xf00c;</i> </button>
                     </td>
             </tr>
         </form>
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
             <th></th>
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
                $query = $pdo->prepare("SELECT * FROM `hirer` where service IN ('Laundry')
                                ");
                $query->execute();
                while ($row = $query->fetch()) {
                ?>
         <tr>
             <td><input type="hidden" name="email" value=" <?php echo $row['email'] ?>" size="4" readonly disabled />
             </td>
             <td><input type="text" name="id" value=" <?php echo $row['id'] ?>" size="4" readonly disabled /></td>
             <td><img src="images/ <?php echo $row['image']; ?>" width="100" height="100"></td>
             <td><input name="firstname" value="<?php echo $row['firstname'] ?>" size="5" readonly disabled /></td>
             <td><input type="text" name="lastname" value="<?php echo $row['lastname']  ?>" size="5" readonly
                     disabled /></td>
             <td><input type="text" name="location" value="<?php echo $row['location'] ?>" size="6" readonly disabled />
             </td>
             <td><input type="text" name="service" value="<?php echo $row['service'] ?>" size="5" readonly disabled />
             </td>
             <td><a href="checkout.php?action=add&&id=<?php echo $row['email']; ?>"><i class="material-icons"
                         style='font-size:48px;color:black'>&#xf00c;</i> </a>
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