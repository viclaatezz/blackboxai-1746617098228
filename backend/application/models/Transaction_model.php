<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_transactions($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->select('transactions.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
            $this->db->from('transactions');
            $this->db->join('portfolios', 'transactions.portfolio_id = portfolios.id');
            $this->db->join('coins', 'transactions.coin_id = coins.id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('transactions.*, portfolios.name as portfolio_name, coins.symbol as coin_symbol');
        $this->db->from('transactions');
        $this->db->join('portfolios', 'transactions.portfolio_id = portfolios.id');
        $this->db->join('coins', 'transactions.coin_id = coins.id');
        $this->db->where('transactions.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function set_transaction()
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'type' => $this->input->post('type'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'transaction_date' => $this->input->post('transaction_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('transactions', $data);
    }

    public function update_transaction($id)
    {
        $data = array(
            'portfolio_id' => $this->input->post('portfolio_id'),
            'coin_id' => $this->input->post('coin_id'),
            'type' => $this->input->post('type'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'transaction_date' => $this->input->post('transaction_date'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        return $this->db->update('transactions', $data);
    }

    public function delete_transaction($id)
    {
        return $this->db->delete('transactions', array('id' => $id));
    }
}
