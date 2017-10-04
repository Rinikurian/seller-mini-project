<!doctype html>
<html>
<body>

<div>
 

 <?php
 include("db.php");
 ?>
      <table border="5" style="background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>SUPPLIER ID</th>
          <th>NAME</th>
          <th>MOBILE</th>
          <th>EMAIL</th>
          <th>GST NUMBER</th>
          <td>ADDRESS</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql="SELECT * FROM supplier";
        $result=mysqli_query($dbcon,$sql);
        $i=0;
        while($row=mysqli_fetch_array($result))
                {
                    echo
            "<tr>
             <td>{$row['supplierid']}</td>
              <td>{$row['name']}</td>
              <td>{$row['mobile']}</td>
              <td>{$row['email']}</td>
              <td>{$row['gstnumber']}</td>
              <td>{$row['address']}</td> 
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
               <button class="btn btn-primary" id="" onclick="location.href = 'staff_home.php';" style="float: right;">Back</button>

    </body>
    </html