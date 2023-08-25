<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      Jorge Obreque <obrequel337@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

/**
 * Class Migration_Add_users_rut
 *
 * @property CI_DB_query_builder $db
 * @property CI_DB_forge $dbforge
 */
class Migration_Add_users_rut extends CI_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        $fields = [
            'rut' => [
                'type' => 'INT',
                'constraint' => '8',
                'null' => TRUE
            ],
            'dv' => [
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => TRUE
            ],
        ];

        $this->dbforge->add_column('users', $fields);
    }

    /**
     * Downgrade method.
     */
    public function down()
    {
        $this->dbforge->drop_column('users', 'rut');
        $this->dbforge->drop_column('users', 'dv');
    }
}
