<?php

include_once '../admin/classes/db.class.php';
include_once '../admin/classes/product.class.php';



$products = new products();
$perPage = $_POST['perPage'];
$page = $_POST['page'];
$category = $_POST['cat'];


$data = $products->getProductsPage($page, $perPage,$category);
$totIma = $products->getTotPrductsCount($category)->iCount;
$maxpages = ceil($totIma/$perPage);



$i=0;
$a=0;
foreach($data as $row) {
//    $id = $row->id;
if(!empty($row->title_sinhala)){
  $title_sinhala = '<h4>'.$row->title_sinhala.'</h4>';
}else{
  $title_sinhala = '<h4>&nbsp;</h4>';
}

    if($category == 'BillPayment'){
                        echo '
                            <div class="col-lg-3 col-md-3 col-sm-4 padB30">
                                <div class="col-lg-12 col-md-12 col-sm-12 proBor">
                                    <div class="col-sm-12_ proBor_">
                                        <a href="product_view.php?id=' . $row->id . '">
                                        <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                        </a>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <div class="minHPro">
                                            <h3 class="pTitle">' . $row->title . '</h3>
                                            '.$title_sinhala.'
                                            <p class="pDes">'.substr($row->description,0,40).'</p>
                                        </div>
                                    </div>    
                                </div>
                            </div>   
                        ';
                    }else{
                        echo '
                            <div class="col-lg-3 col-md-3 col-sm-4 padB30">
                            <div class="col-lg-12 col-md-12 col-sm-12 proBor">
                                <div class="col-sm-12_ proBor_">
                                    <a href="product_view.php?id=' . $row->id . '">
                                    <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                    </a>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <div class="minHPro">
                                        <h3 class="pTitle">' . $row->title . '</h3>
                                        '.$title_sinhala.'
                                        <h4>Rs ' . $row->price . '/=</h4>
                                        <p class="pDes">'.substr($row->description,0,40).'</p>
                                    </div>

                                    <div class="input-group" style="width: 160px; margin: 0 auto;">
                                        <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity'.$a.'"  min="1" required>
                                        <span class="input-group-btn">

                                        ';
                        ?>
                            <button class="btn crBtn btn-primary"
                                    onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity<?php echo $a?>').value)">ADD
                                TOCART
                            </button>

                            <?php echo '
                                            </span>
                                        </div>

                                      </div>
                                </div>
                                </div>
                        ';
                    }

                 

    $i++;
}

echo '<div class="col-sm-12 text-center"><br>';
for($i=0; $i < $maxpages; $i++){
    if($i==$page){
        echo ' <button class="btn btn-warning" onclick=""> '.($i+1).'</button> ';
    }else{
        echo ' <button class="btn btn1" onclick="loadPros(\''.$i.'\')"> '.($i+1).'</button> ';
    }

}
echo '<br><br></div >';

?>
