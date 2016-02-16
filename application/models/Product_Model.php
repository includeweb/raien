<?php
class Product_Model extends CI_MODEL
{
    function get_type(){
        $rs = $this->db->get('type');
        return $rs;
    }
    function get_tipos(){
    	$rs = $this->db->get('tipos');
    	return $rs;
    }

    function list_productos(){
    	$this->db->select('p.*,m.nombre as marca');
    	$this->db->join('marcas m','p.marca_id = m.id');
    	$rs = $this->db->get('productos p');
    	return $rs;
    }

    function add_product($insert){
    	$this->db->insert('productos',$insert);
    	return $this->db->insert_id();
    }


    function get_product($product_id){
    	$rs = $this->db->get_where('productos',array('id'=>$product_id));
    	return $rs->row();
    }

    function update_product($id,$update){
		$this->db->where('id', $id);
		$this->db->update('productos', $update);
    }


}
