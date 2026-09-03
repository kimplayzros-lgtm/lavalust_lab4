<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
        if (!isset(lava_instance()->db)) {
            lava_instance()->call->database();
        }
    }
}
