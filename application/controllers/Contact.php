<?php

/**
 * Author: Amirul Momenin
 * Desc:Contact Controller
 *
 */
class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        $this->load->model('Contact_model');
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of contact table's index to get query
     *            
     */
    function index($start = 0)
    {
        $data['contact'] = $this->Contact_model->get_contact(0);

        $data['_view'] = 'front/contact/form';
        $this->load->view('layouts/front/body', $data);
    }

    /**
     * Save contact
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $created_at = "";
        $updated_at = "";

        if ($id <= 0) {
            $created_at = date("Y-m-d H:i:s");
        } else if ($id > 0) {
            $updated_at = date("Y-m-d H:i:s");
        }

        $params = array(
            'first_name' => html_escape($this->input->post('first_name')),
            'last_name' => html_escape($this->input->post('last_name')),
            'email' => html_escape($this->input->post('email')),
            'phone' => html_escape($this->input->post('phone')),
            'comment' => html_escape($this->input->post('comment')),
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );

        if ($id > 0) {
            unset($params['created_at']);
        }
        if ($id <= 0) {
            unset($params['updated_at']);
        }
        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['contact'] = $this->Contact_model->get_contact($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Contact_model->update_contact($id, $params);
                $this->session->set_flashdata('msg', 'Contact has been updated successfully');
                redirect('contact/index');
            } else {
                $data['_view'] = 'front/contact/form';
                $this->load->view('layouts/front/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $contact_id = $this->Contact_model->add_contact($params);
                $this->session->set_flashdata('msg', 'Contact has been saved successfully');
                redirect('contact/index');
            } else {
                $data['contact'] = $this->Contact_model->get_contact(0);
                $data['_view'] = 'front/contact/form';
                $this->load->view('layouts/front/body', $data);
            }
        }
    }
}
//End of Contact controller