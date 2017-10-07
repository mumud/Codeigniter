<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataTableModel');
	}

	public function index()
	{
		$this->load->view('listView');	
	}

	public function ListData(){
      	$sql = "SELECT 
      				a.id as v_id, a.name as v_name, b.name as d_name, c.name as r_name, d.name as p_name 
      				FROM villages a 
      					LEFT JOIN districts b ON a.district_id=b.id
      					LEFT JOIN regencies c ON b.regency_id=c.id
      					LEFT JOIN provinces d ON c.province_id=d.id WHERE a.id IS NOT NULL ";

		$column_order = array(
			'a.name',
			'b.name',
			'c.name',
			'd.name' 
		);

		$column_search = array(
			'a.name',
			'b.name',
			'c.name',
			'd.name' 
		); 
		$order = array('a.name' => 'ASC');

		$list = $this->DataTableModel->get_datatables($sql, $column_search, $column_order, $order);
		$data = array();
		$no = 0;
		foreach ($list as $val) {
			$no++;
			$row = array();
			$row[] = $val->v_name;
			$row[] = $val->d_name;
			$row[] = $val->r_name;
			$row[] = $val->p_name;
			$row[] = '<a href=#" rel="tooltip">
				          <i class="fa fa-edit"></i>
				        </a>
				        &nbsp;
				        &nbsp;
				        &nbsp;
                        <a href="#" rel="tooltip">
				          <i class="fa fa-trash"></i>
				        </a>';
			$data[] = $row;
		}

		$Result = array(
		            "draw" => $_POST['draw'],
		            "recordsTotal" => $this->DataTableModel->count_all($sql),
		            "recordsFiltered" => $this->DataTableModel->count_filtered($sql, $column_search, $column_order, $order),
		            "data" => $data,
		);
		//keluarin pake json format
		echo json_encode($Result);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */