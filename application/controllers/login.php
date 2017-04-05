<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		$this->load->view('Plantilla/header');
		$this->load->view('Login/login_view');
		$this->load->view('Plantilla/footer');
	}

	public function ingresar()
	{

      if(!isset($_POST['tuser'])){   //   Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.   
      		$this->load->view('Plantilla/header');
			$this->load->view('Login/login_view');
			$this->load->view('Plantilla/footer');
      		      //   Por lo tanto le presentamos la pantalla del formulario de ingreso.
      }
      else{                        //   Si el usuario ya pasó por la pantalla inicial y presionó el botón "Ingresar"
         $this->form_validation->set_rules('tuser','user','required|valid_email');      //   Configuramos las validaciones ayudandonos con la librería form_validation del Framework Codeigniter
         $this->form_validation->set_rules('tpass','password','required');
         if(($this->form_validation->run()==FALSE)){            //   Verificamos si el usuario superó la validación
            $this->load->view('Plantilla/header');
			$this->load->view('Login/login_view');
			$this->load->view('Plantilla/footer');              //   En caso que no, volvemos a presentar la pantalla de login
         }
         else{                                       //   Si ambos campos fueron correctamente rellanados por el usuario,
            $this->load->model('usuarios_model');
            $ExisteUsuarioyPassoword=$this->usuarios_model->ValidarUsuario($_POST['tuser'],$_POST['tpass']);   //   comprobamos que el usuario exista en la base de datos y la password ingresada sea correcta
            if($ExisteUsuarioyPassoword){   // La variable $ExisteUsuarioyPassoword recibe valor TRUE si el usuario existe y FALSE en caso que no. Este valor lo determina el modelo.
               echo "Validacion Ok<br><br><a href=''>Volver</a>";   //   Si el usuario ingresó datos de acceso válido, imprimos un mensaje de validación exitosa en pantalla
            }
            else{   //   Si no logró validar
               $data['error']="E-mail o password incorrecta, por favor vuelva a intentar";
               	$this->load->view('Plantilla/header');
				$this->load->view('Login/login_view',$data);
				$this->load->view('Plantilla/footer');
                //   Lo regresamos a la pantalla de login y pasamos como parámetro el mensaje de error a presentar en pantalla
            }
         }
      }
	}
}
