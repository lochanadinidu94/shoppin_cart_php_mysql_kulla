<?php

//
//include_once("../classes/images.class.php");
//include_once("../classes/db.class.php");
$products =  new products();

$data = $products->getSliderImages();


$tabledata = '<table id="all-images" class="table table-striped table-bordered">
<thead>
<tr>
<th  >Image</th>
<th >Action </th>


</tr>
</thead>
<tbody>
';

foreach($data as $row){
    $tabledata .= '<tr>
  <td align="center"><img src="functions/'.$row->src.'" style="max-height:100px;"></td>
  <td align="center"><a title="Delete"  href="functions/delete_slider.php?id='.$row->id.'" style="cursor:pointer;"><img src="images/restaurant.png" width="30px"></td>

  </tr>
  ';
}

$tabledata.='</tbody></table>';

echo $tabledata;


?>
