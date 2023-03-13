<?php
include 'header.php';
include 'config.php';
?>

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto">
    <div class="row ml-2 mt-2 mr-2">
        <div class="col-md-8">
            <a href="add_user.php
            ">
                <input type="submit" value="Add User" class="btn btn-primary">
            </a>
        </div>
        <div class="col-md-4">

            <input id="search" style="height: 40px; " placeholder="Search..." class="form-control rounded" type="search">
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $count = 0;
    echo ' <table class="table my-4">';
    echo ' <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile No</th>
        <th scope="col">Gender</th>
        <!-- <th scope="col">Operations</th> -->
    </tr>
</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo ' <tr>';
        echo "<td>$count</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['mobile_no'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo '<td><a type="button" class="btn btn-primary mx-1">View</a>
        <a  href="update_user.php?id='.$row['u_id'].'" type="button" class="btn btn-success mx-1">Update</a>
        <a type="button" class="btn btn-danger mx-1">Delete</a>  </td>';
        echo "</tr>";
    }
    echo '</tbody>';
    echo "</table>";


    ?>




    <!-- <th scope="row">1</th>
    <td>Rahul</td>
    <td>Gohel</td>
    <td>@Maha@njdm.sdf</td>
    <td>@95444444444</td>
    <td>@mdo</td>
    <td><button type="button" class="btn btn-primary mx-1">View</button>
        <button type="button" class="btn btn-success mx-1">Update</button>
        <button type="button" class="btn btn-danger mx-1">Delete</button> -->
    <!-- </td> -->

    </tr>

    </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>