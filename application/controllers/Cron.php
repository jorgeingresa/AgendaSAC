<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Cron Controller
 *
 * @package Controllers
 */
class Cron extends EA_Controller {
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('installation');
        $this->load->helper('google_analytics');
        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('admins_model');
        $this->load->model('secretaries_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('settings_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
        $this->load->library('availability');
        $this->load->driver('cache', ['adapter' => 'file']);
        date_default_timezone_set('America/Santiago');
    }


    public function index()
    {
        try{
            
            $appointments = $this->appointments_model->get_appointments_reminder();
            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];
            print_r($appointments);
            foreach ($appointments as $key => $value) {
                $provider    = (array)$this->providers_model->get_row($appointments[$key]->id_users_provider);
                $service     = (array)$this->services_model->get_row($appointments[$key]->id_services);
                $appointment = (array)$appointments[$key];
                $customer    = (array)$this->customers_model->get_row($appointments[$key]->id_users_customer);
                $this->notifications->notify_appointment_saved($appointment, $service, $provider, $customer, $settings,FALSE,TRUE);
            }

            
        }
        catch(Exeption $exception){
            log_message('error', $exception->getMessage());
            log_message('error', $exception->getTraceAsString());
        }

        echo "enviado OK";
    }
}
