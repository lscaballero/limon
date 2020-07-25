<?php

/**
* @file
* Contains \Drupal\limon_validate\Form\LimonValidateForm.
*/
namespace Drupal\limon_validate\Form;

/**
* Implements the LimonValidateForm form controller.
*
* @see \Drupal\Core\Form\FormBase
*/

use Drupal\Core\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LimonValidateForm extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['limon_validate'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('PARA CONTINUAR CON LA EXPERIENCIA DEBES SER MAYOR DE EDAD'),
    ];

    $form['limon_validate']['returl'] = [
        '#type' => 'hidden',
        '#default_value' => 'http://localhost/limon/',
      ];

    $form['limon_validate']['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Fecha de nacimiento'),
    //   '#title_display' => 'invisible',
      '#placeholder' => 'DÍA/MES/AÑO',
      '#id' => 'limon_form_date',
      '#size' => 40,
      '#maxlength' => 20,
      '#required' => FALSE,
      '#weight' => 6,
    ];

    $form['limon_validate']['actions']=[
      '#type' => 'actions',
    ];

    $form['limon_validate']['actions']['submit']=[
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#id' => 'limon_form_submit_validate',
    ];

    return $form;
  }

  public function getFormId() {
    return 'limon_validate_form';
  }


  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

    $hoy = substr(date("Ymd"), 0 , 4);
    $values = $form_state->getValues();
    $edad = $values['date'];
    $ano_nacimiento = substr($edad, 0, 4);

    if($edad){
        if ($hoy - $ano_nacimiento >= 18 ) {
            $response = new RedirectResponse('http://localhost/limon/home');
            $response->send();
        }else{
            \Drupal::messenger()->addError(t('Eres menor de edad, no puedes ingresar'));
        }
    }else{
        \Drupal::messenger()->addError(t('Por favor ingresa tu edad'));
    }
  }

}
