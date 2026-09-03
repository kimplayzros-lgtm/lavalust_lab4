<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
    }

    public function index()
    {
        $this->call->model('UsersModel');

        $data['users'] = $this->UsersModel->order_by('id', 'ASC')->all();
        $this->call->view('users', $data);
    }
}
