<?php

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //Start echoLastQuery
    function echoLastQuery() {
        //$this->output->enable_profiler(TRUE);
        echo $this->db->last_query();
        die;
    }

    //End echoLastQuery
    //-------------------------------------------------------
    //Start PreData 
    public function preData($var) {
        echo '<pre>';
        print_r($var);
        echo '<pre>';
        #die;
    }

    //End PreData
    //-------------------------------------------------------
    //Start insert
    function insert($tableName, $insertArray) {
        $this->db->insert($tableName, $insertArray);
        return $this->db->insert_id();
    }

    //End insert
    //-------------------------------------------------------
    //Start checkExistEmail
    public function checkExistEmail($table, $whereArr) {
        $sql = $this->db->select('*')
                ->from($table)
                ->where($whereArr);
        $email = $this->db->get();
        $res = $email->num_rows();
        return $res;
    }

    //End checkExistEmail
//-------------------------------------------------------
    //Start changePassword
    public function updates($table, $updateArr, $whereArr) {
        $this->db->where($whereArr);
        $query = $this->db->update($table, $updateArr);
        return $this->db->affected_rows();
    }

    //End changePassword
//-------------------------------------------------------
    //Start Select
    function Selectq($tableName, $select, $loginCondtion) {
        $datas = array();
        foreach ($loginCondtion as $key => $value) {
            $loginCondtion[$key] = trim($value);
        }
        if (!empty($select)) {
            $this->db->select($select);
        }
        if (!empty($loginCondtion)) {
            $this->db->where($loginCondtion);
        }
        $query = $this->db->get($tableName, true);
        return $query->result_array();
    }

    function TotalRows()
    {
        
    }

    //End login
    //Start login with join
    public function joinLogin($tbl_1, $tbl_2, $email, $pass, $utype) {
        echo $pass;
        $sql = "SELECT * FROM $tbl_1 a inner join $tbl_2 b ON a.U_ID=b.U_ID where a.
        `email`='$email' AND a.`password`='$pass' AND a.`utype`='$utype'
        AND a.`user_confirmation`='1'";

        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->result_array();
        }
    }

    //End login with join
    //Start delete
    function delete($table, $where) {
        $query = $this->db->delete($table, $where);
        return $query;
    }

    //End delete
    //start deletein
    function deletein($table, $column, $condition) {
        $this->db->where_in($column, $condition);
        $this->db->delete($table);
    }

    //End deletein
    //start update
    function update($table, $data, $condition) {
        $datas = array();
        foreach ($data as $k => $value) {
            $datas[$k] = trim($value);
        }
        $this->db->where($condition);
        $query = $this->db->update($table, $datas);
        return $query;
    }

    //End update
    //start getAllData
    function getAllData($table, $array_obj_type=0) {
        $sql = $this->db->get($table);
        if ($array_obj_type) { //$array_obj_type true or false
            return $sql->result();
        } else {
            return $sql->result_array();
        }
    }

    //end getAllData
    //start getWhere
    function getWhere($table, $condition, $limit=0) {
           
           if (!$limit) {
                $this->db->limit($limit, 0);
            }else
            {
                 $this->db->limit(1, 0);
            }

          $q = $this->db->get_where($table, $condition);
        $que = $q->num_rows($q);
        if ($que > 0) {
            if (!$limit) {
                return $q->result_array();
            } else {
                return $q->row_array();
            }
        }
    }

     function getExist($table, $condition) {

        $q = $this->db->get_where($table, $condition,1);
        return $que = $q->num_rows($q);
    }

    //End getWhere
    //Start function to get data
    //$single true or false for single or multiple results
    function getDataWhere($tableName, $single, $select, $whereCondtion, $orderByField, $orderByValue, $per_page, $page) {
        if (!empty($select)) {
            $this->db->select($select);
        }
        if (!empty($whereCondtion)) {
            $this->db->where($whereCondtion);
        }
        if (!empty($orderByField) && !empty($orderByValue)) {
            $this->db->order_by($orderByField, $orderByValue);
        }
        if (!empty($per_page) || !empty($page)) {
            $this->db->limit($per_page, $page);
        }
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            if ($single) {
                return $result[0];
            } else {
                return $result;
            }
        } else {
            return 0;
        }
    }

    //End function to get data
    //Start function to count all record
    function countData($table) {
        return $this->db->count_all($table);
    }

    //End function to all record
    //Start function to count all record
    //flag contain true/false
    function countWhere($table, $flag, $where) {

        $q = $this->db->get_where($table, $where);
        //if $count is true return count of rows
        if ($flag) {
            return $q->num_rows();
            die;
        } else {

            if ($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return 0;
            }
        }
    }

    //End function to all record
    //start function record with limit
    public function get_data_with_limit($table, $per_page, $page) {
        // $data = array();
        //$s='select * from bb_products ';
        $s = 'select * from ' . $table;
        if (!empty($page) or ! empty($per_page)) {
            $s .= 'limit ' . $page . ',' . $per_page;
        }
        $query = $this->db->query($s);
        if ($query->num_rows() > 0) {
//                foreach ($query->result() as $row) {
//                    $data[] = $row;
//                }
            return $query->result_array();
        }
        // return $data;
    }

    //End function record with limit
    //start function get_data_where_limit
    public function get_data_where_limit($table, $where, $per_page, $page) {
        $data = array();
        $this->db->limit($per_page, $page);
        $q = $this->db->get_where($table, $where);
        return $q->result_array();
    }

    //End function get_data_where_limit
    //start function where_in
    function where_in_limit($table, $field, $inArray, $per_page, $page) {
        $this->db->where_in($field, $inArray);
        if (!empty($per_page)) {
            //$this->db->limit($page,$per_page);
            $this->db->limit($per_page, $page);
        }
        $q = $this->db->get($table);
        return $q->result_array();
    }

    //End function where_in
    //Start function to get pagination data
    //
    //
  public function pagination_data($pagination_url, $table, $count_leads, $per_page, $fix_uri_segment, $uri_segment, $pagination_data) {
//pagination settings
        $config['base_url'] = $pagination_url;
        $config['total_rows'] = $count_leads;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = $fix_uri_segment;
        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
        $config["num_links"] = 10;
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '�';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '�';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = $uri_segment;
        // get books list
        $data['all_records'] = $pagination_data;
        $data['pagination'] = $this->pagination->create_links();

        return $data;
    }
//    public function pagination_data($pagination_url, $table, $count_leads, $per_page, $fix_uri_segment, $uri_segment, $pagination_data, $page_name) {
////pagination settings
//        $config['base_url'] = $pagination_url;
//        $config['total_rows'] = $count_leads;
//        $config['per_page'] = $per_page;
//        $config["uri_segment"] = $fix_uri_segment;
//        //$choice = $config["total_rows"] / $config["per_page"];
//        $choice = '4'; //$config["total_rows"] / $config["per_page"];
//        $config["num_links"] = floor($choice);
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['page'] = $uri_segment;
//        // get books list
//        $data['all_records'] = $pagination_data;
//        $data['pagination'] = $this->pagination->create_links();
//        // pagination code end here     
//        $data['pages'] = $page_name;
//
//        return $data;
//    }

    //End function to get pagination data


    function getData_order_limit($tableName, $single, $select, $whereCondtion, $orderByField, $orderByValue, $per_page, $page) {
        if (!empty($select)) {
            $this->db->select($select);
        }
        if (!empty($whereCondtion)) {
            $this->db->where($whereCondtion);
        }
        if (!empty($orderByField) && !empty($orderByValue)) {
            $this->db->order_by($orderByField, $orderByValue);
        }
        if (!empty($page) or ! empty($per_page)) {
            $this->db->limit($per_page, $page);
        }
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            if ($single) {
                return $result[0];
            } else {
                return $result;
            }
        } else {
            return 0;
        }
    }

    function getDataWhereObject($tableName, $single, $select, $whereCondtion, $orderByField, $orderByValue, $perPage, $page) {
        if (!empty($select)) {
            $this->db->select($select);
        }
        if (!empty($whereCondtion)) {
            $this->db->where($whereCondtion);
        }
        if (!empty($orderByField) && !empty($orderByValue)) {
            $this->db->order_by($orderByField, $orderByValue);
        }
        if (!empty($perPage) || !empty($page)) {
            $this->db->limit($perPage, $page);
        }
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) {
            // $result=$query->result_array();
            $result = $query->result();
            if ($single) {
                return $result[0];
            } else {
                return $result;
            }
        } else {
            return 0;
        }
    }

    public function get_records_by_id($table, $single, $data_condition, $select, $order_by_field, $order_by_value) {
        if (!empty($data_condition)) {
            $this->db->where($data_condition);
        }if (!empty($select)) {
            $this->db->select($select);
        }
        if (!empty($order_by_field) && !empty($order_by_value)) {
            $this->db->order_by($order_by_field, $order_by_value);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            if ($single) {
                return $result[0];
            } else {
                return $result;
            }
        } else {
            return 0;
        }
    }

    //Update meta data
    public function UpdateMeta($key, $value) {
        $condition['meta_key'] = $key;
        $data = $this->getWhere('cms_setting', $condition, 1);
        if (count($data) > 0) {
            $insert['meta_value'] = $value;
            $this->updates('cms_setting', $insert, $condition);
        } else {
            $insert['meta_key'] = $key;
            $insert['meta_value'] = $value;
            $this->insert('cms_setting', $insert);
        }
    }

    //Update meta data
    //getmeta data
    public function GetMeta($key) {
        $condition['meta_key'] = $key;
        $data = $this->getWhere('cms_setting', $condition, 1);
        return $data[0]['meta_value'];
    }

    //getmeta data
}

//Class common model close