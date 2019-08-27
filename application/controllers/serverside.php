<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Serverside extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('employee_model');
    }


    public function server_side_Request()
    {

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
}
