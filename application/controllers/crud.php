<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('crud_model');
	}
	public function index()
	{
		$this->load->view('home');
	}
	public function insert()
	{
		$this->form_validation->set_rules('titre', 'Titre', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
	
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('home');
            //var_dump("error");
        }
        else
        {
            $data = $this->input->post();
            if ( $this->crud_model->insert_entry($data))
             {
             	$this->session->set_flashdata('Success','Enregistrement effectué');
             	redirect('records');
             } 
             else
             {
             	$this->session->set_flashdata('Error','Une erreur s\'est produite');
             	redirect('/');
             }           
        }
	}

    public function fetch()
    {
        $posts = $this->crud_model->get_entries();
        $this->load->view('records',['posts'=>$posts]);
    }

    public function delete($id)
    {
        if ( $post = $this->crud_model->delete_entry($id))
         {
            $this->session->set_flashdata('Success','Suppression effectuée');
            redirect('records');
         } 
         else
         {
            $this->session->set_flashdata('Error','Une erreur s\'est produite lors de la suppression');
            redirect('records');
         }           
    }

    public function edit($id)
     {
        if ($post = $this->crud_model->single_entry($id))
        {
           $this->load->view('edit',['post'=>$post]);
        }
        else
        {
            $this->session->set_flashdata('Error','Une erreur s\'est produite');
            redirect('records');
        }
     }

    public function update($id)
    {
        $this->form_validation->set_rules('edit_titre', 'Titre', 'required');
        $this->form_validation->set_rules('edit_description', 'Description', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $post = $this->crud_model->single_entry($id);
            $this->load->view('edit',['post'=>$post]);
        }
        else
        {
            $data['titre'] = $this->input->post('edit_titre');
            $data['description'] = $this->input->post('edit_description');
            $data['id'] = $this->input->post('edit_id');

            if ( $this->crud_model->update_entry($id, $data))
             {
                $this->session->set_flashdata('Success','Modification effectué');
                redirect('records');
             } 
             else
             {
                $this->session->set_flashdata('Error','Une erreur s\'est produite');
                redirect('records');
             }           
        }
     }
     
}