<?php
class Api extends CI_Controller {

    public function products(){

        $title = $this->input->post("title", true);
        $price = $this->input->post("price", true);

        $this->load->model("Product_model");

        $product_id = $this->Product_model->insert([
            'category_id' => 1,
            'title' => $title,
            'brief' => $title,
            'price' => $price,
            'ori_price' => 0,
            'created_date' => date("Y-m-d H:i:s"),
        ]);

        echo json_encode([
            'product_id' => $product_id
        ]);

    }

}
?>