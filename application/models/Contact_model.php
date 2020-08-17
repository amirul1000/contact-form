<?php

/**
 * Author: Amirul Momenin
 * Desc:Contact Model
 */
class Contact_model extends CI_Model
{

    protected $contact = 'contact';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get contact by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_contact($id)
    {
        $result = $this->db->get_where('contact', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('contact');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all contact
     */
    function get_all_contact()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('contact')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit contact
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_contact($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('contact')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count contact rows
     */
    function get_count_contact()
    {
        $result = $this->db->from("contact")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new contact
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_contact($params)
    {
        $this->db->insert('contact', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update contact
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_contact($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('contact', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete contact
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_contact($id)
    {
        $status = $this->db->delete('contact', array(
            'id' => $id
        ));
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }
}
