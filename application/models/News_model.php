<?php 



/**
* 
*/
class News_model extends CI_model
{
	public function getNews(){
		$query = $this->db->query("SELECT * FROM `news`");
		return $query->result();
	}

	public function sortNews($data){
		$query = $this->db->query("SELECT * FROM `news` ORDER BY `category_id` ".$data);
		return $query->result();
	}

	public function removeNews($id){
		$this->db->where('news.news_id' , $id);	 
		return $this->db->delete('news');
	}
	public function editNews($data  , $id){
		$this->db->where('news.news_id' , $id);
		return $this->db->update('news', $data);
	}
	public function addNews($data){
		return $this->db->insert('news', $data);
	}
	public function changeIsAccepted($data , $id){
		$this->db->where ('news.news_id' , $id);
		return $this->db->update('news' , $data);
	}

}


 ?>