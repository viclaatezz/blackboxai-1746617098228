<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_coins($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('coins');
            return $query->result_array();
        }

        $query = $this->db->get_where('coins', array('id' => $id));
        return $query->row_array();
    }

    public function set_coin()
    {
        $data = array(
            'symbol' => $this->input->post('symbol'),
            'name' => $this->input->post('name'),
            'api_id' => $this->input->post('api_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('coins', $data);
    }

    public function update_coin($id)
    {
        $data = array(
            'symbol' => $this->input->post('symbol'),
            'name' => $this->input->post('name'),
            'api_id' => $this->input->post('api_id'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('coins', $data);
    }

    public function delete_coin($id)
    {
        return $this->db->delete('coins', array('id' => $id));
    }
}
