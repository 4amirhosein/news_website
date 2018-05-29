<?php 





/**
* 
*/
class Admin extends CI_controller
{
	
	public function index()
	{
		$data['news'] = $this->News_model->getNews();
		$data['main_content'] = 'admin' ;
		$this->load->view('layouts/main' , $data);
	}

	public function sortNews()
	{
		if( isset($_POST['desc']))
		{
			$data['news'] = $this->News_model->sortNews('DESC');
			$data['main_content'] = 'admin' ;
			$this->load->view('layouts/main' , $data);
		}	
		else if( isset($_POST['asc'])  ){
			$data['news'] = $this->News_model->sortNews('ASC');
			$data['main_content'] = 'admin' ;
			$this->load->view('layouts/main' , $data);
		}

	}


	public function removeNews(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['remove_news_submit'])){
				if($this->News_model->removeNews($_POST['news_id'])){
					redirect('/index.php/Admin');
				} else {

				}
			}
			else{
			 	redirect('/index.php/Admin');
			}
		}
	}


	public function editNews()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['edit_news_submit'])){
				$data = array('title' => $_POST['title']  , 'abstract' => $_POST['abstract'] , 'main_text' => $_POST['main_text'] ,'category_id' => $_POST['category_id']   );
				if($this->News_model->editNews( $data , $_POST['news_id'])){
					redirect('/index.php/Admin');
				} else {

				}
			}
			else{
			 	redirect('/index.php/Admin');
			}
		}
	}
	public function addNews(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['add_news_submit'])){
				$data = array('title' => $_POST['title']  , 'abstract' => $_POST['abstract'] , 'main_text' => $_POST['main_text'] ,'category_id' => $_POST['category_id'] , 'is_accepted' => 1  );
				if($this->News_model->addNews($data)){
					redirect('/index.php/Admin');
				} else {

				}
			}
			else{
			 	redirect('/index.php/Admin');
			}
		}

	}

	public function approveNews(){

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['delete_news_submit'])){
				if($this->News_model->removeNews($_POST['news_id'])){
					redirect('/index.php/Admin');
				} else {

				}
			}
			else if(isset($_POST['aprrove_news_submit'])){
				$data = array( 'is_accepted' => 1  );
				if($this->News_model->changeIsAccepted($data , $_POST['news_id'])){
					redirect('/index.php/Admin');
				} else {

				}

			}
			else{
			 	redirect('/index.php/Admin');
			}
		}

	}
}










 ?>