<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_alerts($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('alerts.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
            $this->db->from('alerts');
            $this->db->join('portfolios', 'alerts.portfolio_id = portfolios.id');
            $this->db->join('coins', 'alerts.coin_id = coins.id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('alerts.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
        $this->db->from('alerts');
        $this->db->join('portfolios', 'alerts.portfolio_id = portfolios.id');
        $this->db->join('coins', 'alerts.coin_id = coins.id');
        $this->db->where('alerts.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function set_alert()
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'target_price' => $this->input->post('target_price'),
            'direction' => $this->input->post('direction'),
            'email' => $this->input->post('email'),
            'is_active' => TRUE,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('alerts', $data);
    }

    public function update_alert($id)
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'target_price' => $this->input->post('target_price'),
            'direction' => $this->input->post('direction'),
            'email' => $this->input->post('email'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('alerts', $data);
    }

    public function delete_alert($id)
    {
        return $this->db->delete('alerts', array('id' => $id));
    }
}
