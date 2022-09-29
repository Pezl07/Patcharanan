<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_model extends CI_Model {

        public function all()
        {
                $query = $this->db->get('tbl_case');
                return $query->result();
        }

        public function insert_case()
        {
                $data = array(
                        'case_type' => $this->input->post('case_type'),
                        'case_detail' => $this->input->post('case_detail'),
                        'case_loc' => $this->input->post('case_loc'),
                        'p_name' => $this->input->post('p_name'),
                        'p_phone' => $this->input->post('p_phone'),
                );
                $this->db->insert('tbl_case', $data);
        }

        public function insert_img_case($case_id, $case_img, $is_emp)
        {
                $data = array(
                        'case_id' => $case_id,
                        'p_img' => $case_img,
                        'is_emp' => $is_emp,
                );
                $this->db->insert('tbl_img', $data);
        }

        public function lastid($p_phone)
        {
                $this->db->select_max('id');
                $this->db->from('tbl_case c');
                $this->db->where('c.p_phone',$p_phone);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

        public function get_detail($id){
                $this->db->select('c.*');
                $this->db->from('tbl_case c');
                $this->db->where('c.id',$id);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

        public function get_detail_img($id, $is_emp){
                $this->db->select('c.*');
                $this->db->from('tbl_img c');
                $this->db->where('c.case_id',$id);
                $this->db->where('c.is_emp', $is_emp);
                $query = $this->db->get();
                return $query->result();
        }


        public function update_job()
        {
                //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
                //date_default_timezone_set('Asia/Bangkok');
                //index.php
                //https://www.codexworld.com/how-to/change-timezone-in-codeigniter/
                $data = array(
                    'case_status' => $this->input->post('case_status'),
                    'tech_id' => $this->input->post('tech_id'),
                    'tech_name' => $this->input->post('tech_name'),
                    'case_update_log' => $this->input->post('case_update_log'),
                    'case_update' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $this->input->post('id'));
                $query=$this->db->update('tbl_case',$data);
        }

        //count by status 1
        public function status1()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus1');
                $this->db->from('tbl_case');
                $this->db->where('case_status',1);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

        //count by status 2
        public function status2()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus2');
                $this->db->from('tbl_case');
                $this->db->where('case_status',2);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


        //count by status 3
        public function status3()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus3');
                $this->db->from('tbl_case');
                $this->db->where('case_status',3);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


        //count by status 4
        public function status4()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus4');
                $this->db->from('tbl_case');
                $this->db->where('case_status',4);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }




//count by status foreach
        public function count_status()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus1');
                $this->db->group_by('case_status');
                $query = $this->db->get('tbl_case');
                return $query->result();
        }

//query by status 
        public function by_status($status_id)
        {
            $this->db->where('case_status',$status_id);
            $query = $this->db->get('tbl_case');
            return $query->result();
        }

//query by case_type หรือตามชื่ออุปกรณ์
        public function by_case_type($case_type)
        {
            $this->db->where('case_type',$case_type);
            $query = $this->db->get('tbl_case');
            return $query->result();
        }

 //query count by case_type
        public function countbycasetype($month, $year)
        {
            $this->db->select('case_type, COUNT(id) as casetotal');
            $this->db->group_by('case_type');
            $this->db->order_by('casetotal','desc');
            $this->db->where('month(case_update)', $month);
            $this->db->where('year(case_update)', $year);
            $query = $this->db->get('tbl_case');
            return $query->result();
        }     

//query count by status
        public function countbycasestatus($month, $year)
        {
            $this->db->select('case_status, COUNT(id) as statustotal');
            $this->db->group_by('case_status');
            $this->db->order_by('statustotal','desc');
            $this->db->where('month(case_update)', $month);
            $this->db->where('year(case_update)', $year);
            $query = $this->db->get('tbl_case');
            return $query->result();
        }        

        



}