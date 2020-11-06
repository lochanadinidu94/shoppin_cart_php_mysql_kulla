<?php



//

//include_once("../classes/images.class.php");

//include_once("../classes/db.class.php");

$customer =  new customer();



$data = $customer->get_customers();





$tabledata = '<table id="all-images" class="table table-striped table-bordered">

<thead>

<tr>

<th >ID</th>

<th >Name</th>

<th >E-mail</th>

<th >Contact</th>

<th >Purchase History</th>





</tr>

</thead>

<tbody>

';



foreach($data as $row){

    $tabledata .= '<tr>

  <td align="center">'.$row->id.'</td>

  <td align="center">'.$row->name.'</td>

  <td align="center">'.$row->email.'</td>

  <td align="center">'.$row->contact.'</td>

  <td align="center"><a title="Edit"  href="customer_orders.php?email='.$row->email.'" class="btn btn-default"">Orders</a></td>



  </tr>

  ';

}



$tabledata.='</tbody></table>';



echo $tabledata;





?>

