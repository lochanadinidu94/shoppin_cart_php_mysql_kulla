<?php

//
//include_once("../classes/images.class.php");
//include_once("../classes/db.class.php");
$customer =  new customer();

$email = $_GET['email'];
$data = $customer->get_orders($email);


$tabledata = '<table id="all-images" class="table table-striped table-bordered">
<thead>
<tr>
<th >Product ID</th>
<th >Product</th>
<th >Quantity</th>
<th >Price (1 Item)</th>
<th >Date Ordered</th>


</tr>
</thead>
<tbody>
';

foreach($data as $row){
    $tabledata .= '<tr>
  <td align="center">'.$row->pro_id.'</td>
  <td align="center">'.$row->pro_name.'</td>
  <td align="center">'.$row->quantity.'</td>
  <td align="center">'.$row->price.'</td>
  <td align="center">'.$row->date_orderd.'</td>

  </tr>
  ';
}

$tabledata.='</tbody></table>';

echo $tabledata;


?>
