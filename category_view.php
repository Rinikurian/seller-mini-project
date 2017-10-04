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
        
          
        </tr>
      </thead>
      <tbody>
        <?php
        $sql="SELECT * FROM category";
        $result=mysqli_query($dbcon,$sql);
        $i=0;
        while($row=mysqli_fetch_array($result))
                {
                    echo
            "<tr>
             <td>{$row['categoryid']}</td>
              <td>{$row['categoryname']}</td>
              
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
               <button class="btn btn-primary" id="" onclick="location.href = 'staff_home.php';" style="float:left;">Back</button>

    
    </body>
    </html