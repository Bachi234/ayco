<?php
class ModAdmin extends CI_Model
{
    public function signup($data){
        return $this->db->insert('admin',$data);
    }
    public function checkAdmin($data)
    {
        return $this->db->get_where('admin',$data)-> result_array();
    }
    public function checkCategory($data){
        return $this->db->get_where('categories',array('categoryName'=>$data['categoryName']));
     }
    public function addCategory($data){
        return $this->db->insert('categories',$data);
    }
    public function viewAllCategories(){
        return $this->db->get_where('categories',array('categoryStatus'=>1))->num_rows();
    }
    public function fetchAllCategories($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get_where('categories',array('categoryStatus'=>1));
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function checkCatById($categoryID){
        return $this->db->get_where('categories',array('categoryID'=>$categoryID))->result_array();
    }
    public function updateCategory($data,$categoryID){
        $this->db->where('categoryID',$categoryID); 
        return $this->db->update('categories',$data);
    }
    public function deleteCategory($categoryID){
        $this->db->where('categoryID',$categoryID); 
        return $this->db->delete('categories');
    }
    public function countCategories() {
        return $this->db->count_all('categories'); 
    }
}
