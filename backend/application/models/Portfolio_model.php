<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_portfolios($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('portfolios');
            return $query->result_array();
        }

        $query = $this->db->get_where('portfolios', array('id' => $id));
        return $query->row_array();
    }

    public function set_portfolio()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('portfolios', $data);
    }

    public function update_portfolio($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('portfolios', $data);
    }

    public function delete_portfolio($id)
    {
        return $this->db->delete('portfolios', array('id' => $id));
    }
}
