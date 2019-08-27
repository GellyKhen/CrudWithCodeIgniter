<?php
class Employee_model extends CI_Model
{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function checking_account($username, $password){
		$sql = "SELECT * FROM admin WHERE admin_username = ? AND admin_password = ?";
		$qry = $this->db->query($sql, array( "$username", "$password" ));
		return $qry->row_array();
	}

	function get_employee_list(){
		$sql = "SELECT * FROM employee";
		$qry = $this->db->query($sql);
		return $qry->num_rows() > 0 ? $qry : FALSE;
	}

	function records_filtered($searchvalue, $order, $dir){
		$query = "SELECT * FROM employee ";
		if ($searchvalue != NULL){
			$query .= '
			WHERE employee_id LIKE "%'.$searchvalue.'%" 
			OR first_name LIKE "%'.$searchvalue.'%"
			OR first_name LIKE "%'.$searchvalue.'%" 
			OR employee_classification LIKE "%'.$searchvalue.'%"
			';
		}
		if ($order != NULL){
			$query .= 'ORDER BY '.$order.' '.$dir.' 
			';
		}
		else{
			$query .= 'ORDER BY employee_id DESC ';
		}

		$qry = $this->db->query($query);
		return $qry->num_rows() > 0 ? $qry : FALSE;
	}

	function get_employee_search($searchvalue, $order, $dir, $start, $length){
		$query = "SELECT * FROM employee ";
		if ($searchvalue != NULL){
			$query .= '
			WHERE employee_id LIKE "%'.$searchvalue.'%" 
			OR first_name LIKE "%'.$searchvalue.'%"
			OR first_name LIKE "%'.$searchvalue.'%" 
			OR employee_classification LIKE "%'.$searchvalue.'%"
			';
		}
		if ($order != NULL){
			$query .= 'ORDER BY '.$order.' '.$dir.' 
			';
		}
		else{
			$query .= 'ORDER BY employee_id DESC ';
		}

		$query1 = '';

		if($length != -1)
		{
			$query1 = 'LIMIT '.$start.', '.$length;
		}

		$qry = $this->db->query($query . $query1);
		return $qry->result_array() > 0 ? $qry : FALSE;
	}

	function inserting_employee($first_name, $last_name, $employee_classification, $file_path, $date_of_employment){
		$sql = "INSERT INTO employee (first_name, last_name, employee_classification, employee_image, date_of_employment) VALUES (?, ?, ?, ?, ?)";
		$qry = $this->db->query($sql, array("$first_name", "$last_name", "$employee_classification", "$file_path", "$date_of_employment"));
		$start = strrpos( $this->db->error()['message'], "]") + 1;
		$error = substr( $this->db->error()['message'], $start );
		return $qry ? TRUE : $error;
	}
	// function inserting_employee($first_name, $last_name, $employee_classification, $file_path = NULL)

	function get_employee_by_id($employee_id){
		$sql = "SELECT * FROM employee WHERE employee_id = ?";
		$qry = $this->db->query($sql, array("$employee_id"));
		return  $qry->num_rows() > 0 ? $qry : FALSE;
	}

	function editing_employee($first_name, $last_name, $employee_classification, $file_path,$date_of_employment, $id){
		$sql = "UPDATE employee SET first_name = ? , last_name = ? , employee_classification = ? , employee_image = ? , date_of_employment = ? WHERE employee_id = ?";
		$qry = $this->db->query($sql, array("$first_name", "$last_name", "$employee_classification", "$file_path", "$date_of_employment", $id));
		$start = strrpos( $this->db->error()['message'], "]") + 1;
		$error = substr( $this->db->error()['message'], $start );
		return $qry ? TRUE : $error;
	}
	// function inserting_employee($first_name, $last_name, $employee_classification, $file_path = NULL)
	function delete_employee($employee_id){
		$sql = "DELETE FROM employee WHERE employee_id = ? ";
		$qry = $this->db->query($sql, array($employee_id));
		$start = strrpos( $this->db->error()['message'], "]") + 1;
		$error = substr( $this->db->error()['message'], $start );
		return $qry ? TRUE : $error;
	}



// Read data from database to show data in admin page
// public function read_user_information($username) {

// $condition = "user_name =" . "'" . $username . "'";
// $this->db->select('*');
// $this->db->from('user_login');
// $this->db->where($condition);
// $this->db->limit(1);
// $query = $this->db->get();

// if ($query->num_rows() == 1) {
// return $query->result();
// } else {
// return false;
// }
// }
// function __construct()
// {
// }

// function login()
// {

// }

// public function getphones()
// {
// 	// $query = $this->db->get('phones');
// 	$sql = 'SELECT * FROM phones';
// 	// $params= ($query , $sql);
// 	$query = $this->db->query("SELECT * FROM phones");
// 	$phone = $query->result_array();
// 	return $phone;
// }

// public function getphonebyid()
// {
// 	$query = $this->db->get_where('phones', array('phone_id' => $id));
// 	return $query->row_array();
// }

// public function editphone()
// {
// 	// $data = array(

// 	// )
// 	// $query = $this->db->where();
// }












}
