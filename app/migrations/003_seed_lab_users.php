<?php

class Seed_lab_users
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        if (!$this->_lava->dbforge->table_exists('users')) {
            return;
        }

        if (!$this->_lava->dbforge->column_exists('users', 'firstname')) {
            $this->_lava->dbforge->add_column('users', [
                'firstname' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => TRUE,
                ],
            ]);
        }

        if (!$this->_lava->dbforge->column_exists('users', 'lastname')) {
            $this->_lava->dbforge->add_column('users', [
                'lastname' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => TRUE,
                ],
            ]);
        }

        $users = $this->_lava->db->table('users')->get_all() ?: [];
        $sample_users = [
            ['firstname' => 'Juan', 'lastname' => 'Dela Cruz', 'email' => 'juan@example.com', 'username' => 'juandelacruz'],
            ['firstname' => 'Maria', 'lastname' => 'Santos', 'email' => 'maria@example.com', 'username' => 'mariasantos'],
            ['firstname' => 'Pedro', 'lastname' => 'Garcia', 'email' => 'pedro@example.com', 'username' => 'pedrogarcia'],
            ['firstname' => 'Ana', 'lastname' => 'Reyes', 'email' => 'ana@example.com', 'username' => 'anareyes'],
            ['firstname' => 'Jose', 'lastname' => 'Mendoza', 'email' => 'jose@example.com', 'username' => 'josemendoza'],
        ];

        $extra_fields = [];
        if ($this->_lava->dbforge->column_exists('users', 'password')) {
            $extra_fields['password'] = password_hash('password', PASSWORD_DEFAULT);
        }
        if ($this->_lava->dbforge->column_exists('users', 'role')) {
            $extra_fields['role'] = 'user';
        }
        if ($this->_lava->dbforge->column_exists('users', 'is_active')) {
            $extra_fields['is_active'] = 1;
        }

        foreach (array_slice($sample_users, count($users)) as $user) {
            $this->_lava->db->table('users')->insert(array_merge($user, $extra_fields));
        }
    }

    public function down()
    {
    }
}
