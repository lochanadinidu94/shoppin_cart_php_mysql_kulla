<?php

//
//include_once("../classes/images.class.php");
//include_once("../classes/db.class.php");
$products =  new products();

$data = $products->get_products();


$tabledata = '<table id="all-images" class="table table-striped table-bordered">
<thead>
<tr>
<th  >Image</th>
<th >Category</th>
<th >Type</th>
<th >Product Name</th>
<th >Action </th>


</tr>
</thead>
<tbody>
';

foreach($data as $row){
    $tabledata .= '<tr>
  <td align="center"><img src="functions/'.$row->cvr_img.'" style="max-height:100px;"></td>
  <td align="center">'.$row->category.'</td>
  <td align="center">'.$row->product_type.'</td>
  <td align="center">'.$row->title.'</td>
  <td align="center"><a title="Delete"  href="functions/delete_product.php?id='.$row->id.'" style="cursor:pointer;"><img src="images/restaurant.png" width="30px">
  <a title="Edit"  href="product_edit.php?id='.$row->id.'" style="cursor:pointer;"><img src="images/edit.png" width="30px"></td>

  </tr>
  ';
}

$tabledata.='</tbody></table>';

echo $tabledata;


?>
