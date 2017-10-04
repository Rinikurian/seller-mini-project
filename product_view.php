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
          <th>ID</th>
          <th>NAME</th>
          <th>IMAGE</th>
          <th>DESCRIPTION</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        $sql="SELECT * FROM product";
        $result=mysqli_query($dbcon,$sql);
        $i=0;
        while($row=mysqli_fetch_array($result))
                {
                    echo
            "<tr>
             <td>{$row['productid']}</td>
              <td>{$row['productname']}</td>
              <td>{$row['productimage']}</td>
              <td>{$row['description']}</td>
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
               <button class="btn btn-primary" id="" onclick="location.href = 'staff_home.php';" style="float:left;">Back</button>

    
    </body>
    </html