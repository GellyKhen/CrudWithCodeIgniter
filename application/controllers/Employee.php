<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('employee_model');
	}

	function index(){
		$this->load->library('session');
		if($this->session->userdata('username'))
		{
			redirect('dashboard');
		}
		else
		{
			$this->load->view('index');
		}
	}

	function login(){
		$this->load->library('session');
		$username = $this->input->post('_txtbxUsername');
		$password = $this->input->post('_txtbxPassword');
		// $username = $_POST['_txtbxUsername'];
		// $password = $_POST['_txtbxPassword'];
		$result = $this->employee_model->checking_account($username, $password);
		if($result)
		{
			$this->session->set_userdata('username', $result);
			redirect('dashboard');
			// $this->dashboard();
		}
		else
		{
			$this->session->set_flashdata('error', 'INVALID LOG IN CREDENTIALS');
			$_SESSION['error'] = "INVALID LOG IN CREDENTIALS";
			$this->load->view('index');

			// $this->index();
		}
	}

	function dashboard(){
		//loading session library
		$this->load->library('session');

		//restrict users to go to log in page
		if ($this->session->userdata('username')) 
		{
			$this->load->view('include/default_header');
			$this->load->view('include/default_css');
			$this->load->view('include/default_sidebar');
			$this->load->view('include/default_script');
			$this->load->view('dashboard');
			$this->load->view('include/default_footer');

		}
		else
		{
			redirect('/');
		}
	}

	function viewEmployee(){
		//loading session library
		$this->load->library('session');

		//restrict users to go to log in page
		if ($this->session->userdata('username')) 
		{
			$this->load->view('include/default_header');
			$this->load->view('include/default_css');
			$this->load->view('include/default_sidebar');
			$this->load->view('include/default_script');
			$this->load->view('include/default_footer');
			$this->load->view('vEmployee');
			
		}
		else
		{
			redirect('/');
		}
	}

	function viewEmployee2(){
		//loading session library
		$this->load->library('session');

		//restrict users to go to log in page
		if ($this->session->userdata('username')) 
		{
			$this->load->view('include/default_header');
			$this->load->view('include/datatable_css');
			$this->load->view('include/default_sidebar');
			$this->load->view('include/datatable_script');
			$this->load->view('include/default_footer');
			$this->load->view('vEmployee2');
			
		}
		else
		{
			redirect('/');
		}
	}

	function viewTest(){
		//loading session library
		$this->load->library('session');

		//restrict users to go to log in page
		if ($this->session->userdata('username')) 
		{
			$this->load->view('vTest');
			
		}
		else
		{
			redirect('/');
		}
	}

	function dataEmployee(){
		$rs=$this->employee_model->get_employee_list();
		$data = [];
		if ($rs !== FALSE)
		{
			foreach ($rs->result() as $row) {

				$data['tbl'][] = array (
					'EmployeeID' => $row->employee_id
					, 'FirstName' => $row->first_name
					, 'LastName' => $row->last_name
					, 'Classification' => $row->employee_classification
					, 'Image' => $row->employee_image
				);
			}
			// $error = array('Error' => 0 , 'Description' => "Successfully");
		}
		echo json_encode($data);
	}

	function generateReportEmployee(){
		$dateFromEmployed = $this->input->post('_dateFromEmployeeEmployed');
		$dateToEmployed = $this->input->post('_dateToEmployeeEmployed');
		$fileName = $this->input->post('_txtbxNameOfFile');
		$rs = $this->employee_model->get_employee_by_id($employee_id);
		$data = [];
		if ($rs !== FALSE)
		{
			// foreach ($rs->result() as $row) {
			// 	$data = array (
			// 		'employee_id' => $row->employee_id
			// 		, 'first_name' => $row->first_name
			// 		, 'last_name' => $row->last_name
			// 		, 'employee_classification' => $row->employee_classification
			// 		, 'employee_image' => $row->employee_image
			// 	);
			// }
			$data = array (
				'employee_id' => $rs->row()->employee_id
				, 'first_name' => $rs->row()->first_name
				, 'last_name' => $rs->row()->last_name
				, 'employee_classification' => $rs->row()->employee_classification
				, 'employee_image' => $rs->row()->employee_image
				, 'date_of_employment' => $rs->row()->date_of_employment
			);
		}
		echo json_encode($data);
	}

	function dataEmployeeMYSQL(){
		$columns = array('employee_id', 'first_name', 'last_name', 'employee_classification', 'employee_image');
		$searchvalue = NULL;
		$order = NULL;
		$dir = NULL;
		$start = NULL;
		$length = $this->input->post('length');

		if(isset($_POST["search"]["value"]))
		{
			$searchvalue = $_POST["search"]["value"];
		}
		if(isset($_POST["order"]))
		{
			$order = $columns[$_POST['order']['0']['column']];
			$dir = $_POST['order']['0']['dir'];
		}
		if($_POST["length"] != -1)
		{
			$start = $_POST['start'];
			$length = $_POST['length'];
		}
		$rs1 = $this->employee_model->records_filtered($searchvalue, $order, $dir);
		$rs2 = $this->employee_model->get_employee_search($searchvalue, $order, $dir, $start, $length);

		$data = array();

		if ($rs2 !== FALSE)
		{
			foreach ($rs2->result() as $row) 
			{
				$sub_array = array();
				$sub_array[] = '<td>'.$row->employee_id.'</td>';
				$sub_array[] = '<td>'.$row->first_name.'</td>';
				$sub_array[] = '<td>'.$row->last_name.'</td>';
				$sub_array[] = '<td>'.$row->employee_classification.'</td>';
				$sub_array[] = '<td><img src="'.base_url().'uploads/'.$row->employee_image.'" alt="Employee Image" style="width:200px;height:200px;object-fit: cover;"></td>';
				$sub_array[] = '<td><button class="btn btn-default btn-warning btn-edit" type="button" title="Edit" id="'.$row->employee_id.'" data-id="'.$row->employee_id.'"> <i class="fa fa-edit"></i></button> <button class="btn btn-default btn-danger btn-delete" type="button" title="Delete" id="'.$row->employee_id.'" data-id="'.$row->employee_id.'"> <i class="fa fa-trash-o"></i></button></td>';

				$data[] = $sub_array;
			}
			// $error = array('Error' => 0 , 'Description' => "Successfully");
		}

		$rs3 = $this->employee_model->get_employee_list();

		$output = array(
			"draw"    => intval($_POST["draw"]),
			"recordsTotal"  =>  $rs3,
			"recordsFiltered" => $rs1,
			"data"    => $data
		);

		echo json_encode($output);
	}

	function dataEmployeeMSSQL(){

        $sIndexColumn = "employee_id";
        /* DB table to use */
        $sTable = "employee";

        /* Database connection information */
        $gaSql['user']       = $this->db->username;
        $gaSql['password']   = $this->db->password;
        $gaSql['db']         = $this->db->database;
        $gaSql['server']     = $this->db->hostname;

        /*
        * Columns
        * If you don't want all of the columns displayed you need to hardcode $aColumns array with your elements.
        * If not this will grab all the columns associated with $sTable
        */

        $aColumns = array(
            "employee_id"
            , "first_name"
            , "last_name"
            , "employee_classification"
            , "employee_image"
            , "date_of_employment"
        );
        $connectionInfo = array("UID" => $gaSql['user'], "PWD" => $gaSql['password'], "Database"=>$gaSql['db'],"ReturnDatesAsStrings"=>true);
        $gaSql['link'] = sqlsrv_connect( $gaSql['server'], $connectionInfo);
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


        /* Ordering */
        $sOrder = "";
        // if ( isset( $_GET['order'] ) ) {
        //     $sOrder = "ORDER BY  ";
        //     for ( $i=0 ; $i<count($_GET['order']) ; $i++ ) {
        //         if ( $_GET['columns'][$i]['orderable'] == "true" ) {
        //             $sOrder .= $aColumns[(int)$_GET['order'][$i]['column']]." ".$_GET['order'][$i]['dir'] .", ";
        //         }
        //     }
        //     $sOrder = substr_replace( $sOrder, "", -2 );
        //     if ( $sOrder == "ORDER BY" ) {
        //         $sOrder = "";
        //     }
        // }

        $sWhere = "";
        //echo $sOrder;

        /* Filtering */

        if ( ( isset($_GET['search']['value']) && trim($_GET['search']['value']) != "") ) 
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ) 
            {
                $sWhere .= $aColumns[$i]." LIKE '%". strtoupper(trim($_GET['search']['value']))."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ")";
        }
        //echo $sWhere;

        /* Paging */
        $top = (isset($_GET['start']))?((int)$_GET['start']):0 ;
        $limit = (isset($_GET['length']))?((int)$_GET['length'] ):10;

        $sQuery = "SELECT TOP $limit *
        FROM $sTable
        $sWhere ".( ( $sWhere == "" ) ? " WHERE ":" AND ")." $sIndexColumn NOT IN
        (
        SELECT $sIndexColumn FROM
        (
        SELECT TOP $top *
        FROM $sTable
        $sWhere
        $sOrder
        )
        as [virtTable]
        )
        $sOrder";

        $rResult = sqlsrv_query($gaSql['link'],$sQuery) or die("$sQuery: " . sqlsrv_errors());

        $sQueryCnt = "SELECT * FROM $sTable $sWhere";
        $rResultCnt = sqlsrv_query( $gaSql['link'], $sQueryCnt ,$params, $options) or die (" $sQueryCnt: " . sqlsrv_errors());
        $iFilteredTotal = sqlsrv_num_rows( $rResultCnt );

        $sQuery = "SELECT * FROM $sTable";
        $rResultTotal = sqlsrv_query( $gaSql['link'], $sQuery ,$params, $options) or die(sqlsrv_errors());
        $iTotal = sqlsrv_num_rows( $rResultTotal );

        $output = array(
            "sEcho" => intval(isset($_GET['sEcho']) ? $_GET['sEcho'] : 0) ,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "iTotalRecords" => $iTotal,
            "aaData" => array()
        );
        while ( $aRow = sqlsrv_fetch_array( $rResult ) ) 
        {
            $row = array(
                $aRow['employee_id']
                , $aRow['first_name']
                , $aRow['last_name']
                , $aRow['employee_classification']
                , $aRow['date_of_employment']
                , '<img src="'.base_url().'uploads/'.$aRow['employee_image'].'" alt="Employee Image" style="width:200px;height:200px;object-fit: cover;">'
                , '<button class="btn btn-default btn-warning btn-edit" type="button" title="Edit" id="${result.EmployeeID}" data-id="'.$aRow['employee_id'].'"> <i class="fa fa-edit"></i></button> 
                <button class="btn btn-default btn-danger btn-delete" type="button" title="Delete" id="${result.EmployeeID}" data-id="'.$aRow['employee_id'].'"> <i class="fa fa-trash-o"></i></button>'

            );
            If (!empty($row)) 
            { 
                $output['aaData'][] = $row; 
            }
        }
        echo json_encode($output);
    }

	function CLIENTSIDE(){
		$load_table = $this->employee_model->get_employee_list();        
		$list = array();
			if( $load_table )
			{   
				foreach ($load_table->result() AS $row)
				{
					array_push($list,array(
						$row->product_id,
						$row->first_name,	
						$row->last_name,
						// number_format($row->product_price, 2),
						"<img src='uploads/".$row->employee_image."'>",
						
						"<div class='tblbtn'>
						<button href='#emyModal' data-toggle='modal' class='btn btn-sm btn-primary' id='btnEdit' data-id='".$row->product_code."' data-filename='".$row->product_image."'><i class='fa fa-pencil'></i>
						</button>
						<button class='btn btn-sm btn-danger btnDelete' id='btnDelete' data-id='".$row->product_code."'>
							<i class='fa fa-trash-o'></i>
						</button>
						</div>",
					)); 
				}
			}
			echo json_encode(array("aaData" => $list));
	}

	function addEmployee(){
		// base_url()uploads/result.Image
		$first_name = $this->input->post('_txtbxFirstName');
		$last_name = $this->input->post('_txtbxLastName');
		$employee_classification = $this->input->post('_txtbxEmployeeClassification');
		$date_of_employment = $this->input->post('_dateEmployeeEmployed');
		// $first_name = $_POST['_txtbxFirstName'];
		// $last_name = $_POST['_txtbxLastName'];
		// $employee_classification = $_POST['_txtbxEmployeeClassification'];

		$config['upload_path'] = './uploads/';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['allowed_types'] = '*';
		$path = $config['upload_path'];
		$filename = date("Y-m-d-H-m-s").$_FILES['_fileEmployeeImage']['name'];
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
		$config['file_name'] = $filename; 

		$this->load->library('upload', $config);

		// if(!$this->upload->do_upload('_fileEmployeeImage'))
		// { //hindi na upload
		// 	$file_path = NULL;
		// 	// $file_path = $config['file_name'];
		// 	$result = $this->employee_model->inserting_employee($first_name, $last_name, $employee_classification, $file_path);
		// } else {
		// 	$file_path = $this->upload->data('file_name');
		// 	// $file_path = $config['file_name'];
		// 	$result = $this->employee_model->inserting_employee($first_name, $last_name, $employee_classification, $file_path);
		// 	// $result = $this->employee_model->inserting_employeee($first_name, $last_name, $employee_classification, $file_path ?? NULL);
		// }
		$file_path = !$this->upload->do_upload('_fileEmployeeImage') ? NULL : $this->upload->data('file_name');
		$result = $this->employee_model->inserting_employee($first_name, $last_name, $employee_classification, $file_path, $date_of_employment);
		echo $result ? 0 : "Error: ".$result;
	}

	function toEditEmployee(){
		$employee_id = $this->input->post('employee_id');
		// $employee_id = $_POST['employee_id'];
		$rs = $this->employee_model->get_employee_by_id($employee_id);
		$data = [];
		if ($rs !== FALSE)
		{
			// foreach ($rs->result() as $row) {
			// 	$data = array (
			// 		'employee_id' => $row->employee_id
			// 		, 'first_name' => $row->first_name
			// 		, 'last_name' => $row->last_name
			// 		, 'employee_classification' => $row->employee_classification
			// 		, 'employee_image' => $row->employee_image
			// 	);
			// }
			$data = array (
				'employee_id' => $rs->row()->employee_id
				, 'first_name' => $rs->row()->first_name
				, 'last_name' => $rs->row()->last_name
				, 'employee_classification' => $rs->row()->employee_classification
				, 'employee_image' => $rs->row()->employee_image
				, 'date_of_employment' => $rs->row()->date_of_employment
			);
		}
		echo json_encode($data);
	}

	function editEmployee(){
		$id = $this->input->post('id');
		$first_name = $this->input->post('_txtbxFirstName');
		$last_name = $this->input->post('_txtbxLastName');
		$employee_classification = $this->input->post('_txtbxEmployeeClassification');
		$date_of_employment = $this->input->post('_dateEmployeeEmployed');
		$imagefilename = $this->input->post('_hiddenImage');
		// $id = $_POST['id'];
		// $first_name = $_POST['_txtbxFirstName'];
		// $last_name = $_POST['_txtbxLastName'];
		// $employee_classification = $_POST['_txtbxEmployeeClassification'];
		// $imagefilename = $_POST['_hiddenImage'];

		$info = $this->employee_model->get_employee_by_id($id);

		$target_dir = "./uploads";
		$target_fileupload = basename($_FILES["_fileEmployeeImageEdit"]["name"]);
		$target_file = $target_dir . $target_fileupload;
		$this->load->helper("file");
		$this->load->helper("url");

		if (empty($_FILES['_fileEmployeeImageEdit']['name'])) {
			$file_path = $info->row()->employee_image;
			$result = $this->employee_model->editing_employee($first_name, $last_name, $employee_classification, $file_path, $date_of_employment, $id);
		} else {

			if ( $info->row()->employee_image != '' ) { // kapag may dating file na
				$files = $info->row()->employee_image;
				$file = 'uploads/'.$files.'';
				unlink( $file );
			}

			$config['upload_path'] = './uploads/';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			$config['allowed_types'] = '*';
			$path = $config['upload_path'];
			$filename = date("Y-m-d-H-m-s").$_FILES['_fileEmployeeImageEdit']['name'];
			$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			$config['file_name'] = $filename; 

			$this->load->library('upload', $config);

			$this->upload->do_upload('_fileEmployeeImageEdit');
			$file_path = $this->upload->data('file_name');
			$result = $this->employee_model->editing_employee($first_name, $last_name, $employee_classification, $file_path, $date_of_employment, $id);
		}
	}

	function deleteEmployee(){
		$employee_id = $this->input->post('id');
		// $employee_id = $_POST['id'];
		$info = $this->employee_model->get_employee_by_id($employee_id);

		if ( $info->row()->employee_image != '' ) { // kapag may dating file na
			$files = $info->row()->employee_image;
			$file = 'uploads/'.$files.'';
			unlink( $file );
		}

		$rs = $this->employee_model->delete_employee($employee_id);
	}

	function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('username');
		redirect('/');
	}



}
