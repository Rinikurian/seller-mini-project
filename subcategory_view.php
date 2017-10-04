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
        $sql="SELECT * FROM subcategory";
        $result=mysqli_query($dbcon,$sql);
        $i=0;
        while($row=mysqli_fetch_array($result))
                {
                    echo
            "<tr>
             <td>{$row['subcategoryid']}</td>
              <td>{$row['subcategoryname']}</td>
              
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
               <button class="btn btn-primary" id="" onclick="location.href = 'staff_home.php';" style="float:left;">Back</button>

    
    </body>
    </html