<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            // Added this line
            //'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'dni',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our pages controller
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['rol']) && $user['rol'] == 'ADMIN') {
            return true;
        }

        // By default deny access.
        return false;
    }

    // Devuelve un array asociativo con las horas_inicio como clave, y valor a la vez.
    // Pensado para usarse en inputs de tipo select en formularios
    public function getHorasPista(){
        $this->loadModel('Horarios');
        $horasPista = $this->Horarios->find('list', [ 'keyField' => function ($horarios) {
                                                                        return date('H:i' ,strtotime($horarios->get('hora_inicio')));
                                                                    },
                                                                        'valueField' => function ($horarios) {
                                                                            return date('H:i' ,strtotime($horarios->get('hora_inicio')));
                                                                        }
                                                                    ]);

        return $horasPista;
    }

    // Devuelve un array asociativo con las horas_inicio como clave, y valor a la vez.
    // Pensado para usarse en inputs de tipo select en formularios
    public function getHorasPistaEntero(){
        $this->loadModel('Horarios');
        $horasPista = $this->Horarios->find('all')->select('hora_inicio')->all()->toArray();
        /*$horasPista = $this->Horarios->find('list', [ 'keyField' => function ($horarios) {
                                                                        return date('H:i' ,strtotime($horarios->get('hora_inicio')));
                                                                    },
                                                                        'valueField' => 0
                                                                    ]);
        */
        //date('H:i', strtotime($horasPista[$i]['hora_inicio']))
        $toret=array();
        for($i = 0; $i<=8; $i++){
            $toret[$i+1] = date('H:i:s', strtotime($horasPista[$i]['hora_inicio']));
        }
        return $toret;
    }

    public function getHorasPistaInverso(){
        $this->loadModel('Horarios');
        $horasPista = $this->Horarios->find('all')->select('hora_inicio')->all()->toArray();
        /*$horasPista = $this->Horarios->find('list', [ 'keyField' => function ($horarios) {
                                                                        return date('H:i' ,strtotime($horarios->get('hora_inicio')));
                                                                    },
                                                                        'valueField' => 0
                                                                    ]);
        */
        //date('H:i', strtotime($horasPista[$i]['hora_inicio']))
        $toret=array();
        for($i = 0; $i<=8; $i++){
            $toret[date('H:i:s', strtotime($horasPista[$i]['hora_inicio']))] = $i+1;
        }
        return $toret;
    }

}
