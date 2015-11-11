<?php
class Product_Model extends CI_MODEL
{
    function get_type(){
    	$rs = $this->db->get('type');
    	return $rs;
    }

    function add_product($insert){
    	$this->db->insert('products',$insert);
    	return $this->db->insert_id();
    }

    function list_products(){
    	$this->db->select('p.*,t.name as type');
    	$this->db->join('type t','p.type_id = t.id');
    	$rs = $this->db->get('products p');
    	return $rs;
    }

    function get_product($product_id){
    	$rs = $this->db->get_where('products',array('id'=>$product_id));
    	return $rs->row();
    }

    function update_product($id,$update){
		$this->db->where('id', $id);
		$this->db->update('products', $update); 
    }


}