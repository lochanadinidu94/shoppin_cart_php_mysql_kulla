<?php

/**
 *
 */
class products
{

    var $db;

    function products()
    {
        $this->db = new DB();
    }


    function addProduct($category, $pro_type, $title, $stitle, $price, $stock, $show, $description, $target, $disQuantity, $dis_price)
    {
        return $this->db->query("INSERT INTO `products` (category, product_type , title, title_sinhala, price, stock_size, show_in_home, description,cvr_img, dis_size, dis_price) VALUES ('$category', '$pro_type', '$title', '$stitle', '$price', '$stock', '$show', '$description','$target', '$disQuantity', '$dis_price')");
    }

    function get_products()
    {

        $result = $this->db->query("SELECT * FROM products WHERE status =1 ORDER BY id DESC");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function getSliderImages()
    {

        $result = $this->db->query("SELECT * FROM slider WHERE status =1 ORDER BY id DESC");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function update_product($category, $pro_type, $title, $stitle, $price, $stock, $show, $description, $disQuantity, $dis_price, $id)
    {
        return $this->db->query("UPDATE products SET category='$category', product_type='$pro_type', title='$title',title_sinhala='$stitle', price='$price', stock_size='$stock', show_in_home='$show', description='$description', dis_size='$disQuantity', dis_price='$dis_price' WHERE id=$id");
    }


    function setCvrimg($src, $id)
    {
        return $this->db->query("UPDATE `products` SET cvr_img='$src' WHERE id=$id");
    }


    function get_product($id)
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND id='$id'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function getTotProCount()
    {
        $result = $this->db->query("SELECT COUNT(id) AS iCount FROM `products` ");
        return mysql_fetch_object($result);
    }

    function delAllDetails($id)
    {
        return $this->db->query("DELETE FROM `products` WHERE id='$id'");
    }

    function delSlider($id)
    {
        return $this->db->query("DELETE FROM `slider` WHERE id='$id'");
    }


    function getProductsPage($page, $perpage, $category)
    {

        $offset = $page * $perpage;
        $query = "SELECT * FROM products WHERE status =1 AND category = '$category' ORDER BY id DESC LIMIT $offset, $perpage";

        $result = $this->db->query("$query");
        $return = array();
        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function getTotPrductsCount($category)
    {
        $query = "SELECT COUNT(id) AS iCount FROM `products` WHERE status =1 AND category = '$category'";

        $result = $this->db->query("$query");

        return mysql_fetch_object($result);
    }


    function get_product_wiew($id)
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND id='$id'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_product_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='InitialProducts' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_grocery_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='GroceryItems' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function get_HomeCareCleaning_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='HomeCareCleaning' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_CPersonalCareToiletries_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='PersonalCareToiletries' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_BabyCare_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='BabyCare' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_StationeriesSchoolItems_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='StationeriesSchoolItems' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_FrozenChilledfoods_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='FrozenChilledfoods' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function get_VegetableFruit_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='VegetableFruit' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_ElectricElectronics_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='ElectricElectronics' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_BillPayment_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='BillPayment' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_Other_index()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND category='Other' AND show_in_home=1 ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function getSearchResult($search)
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND title LIKE '%" . $search . "%' OR title_sinhala LIKE '%" . $search . "%' ORDER BY id DESC LIMIT 12");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function getRecentProImages()
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 ORDER BY id DESC LIMIT 4");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function getStock($id)
    {
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND id=$id");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function updateStock($id, $newStock)
    {
        return $this->db->query("UPDATE products SET stock_size='$newStock' WHERE id=$id");
    }


    function getStockSize()
    {
        $result = $this->db->query("SELECT * FROM products WHERE stock_size<50 ORDER BY stock_size ASC ");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function addSliderImage($image)
    {
        return $this->db->query("INSERT INTO `slider` (src) VALUES ('$image')");
    }


}

?>