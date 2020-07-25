<?php

/**
* @file
* Contains \Drupal\limon_form\Form\LimonContactForm.
*/
namespace Drupal\limon_form\Form;

/**
* Implements the LimonContactForm form controller.
*
* @see \Drupal\Core\Form\FormBase
*/

use Drupal\Core\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormBuilder;

define('REDIRECT_WS_URL', \Drupal::configFactory()->getEditable('limon_form.settings')->get('url_redirect'));

class LimonContactForm extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['limon_form']['returl'] = [
        '#type' => 'hidden',
        '#default_value' => REDIRECT_WS_URL,
      ];

    $form['limon_form']['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nombre de contacto'),
      '#title_display' => 'invisible',
      // '#description' => $this->t('The title must be at least 5 characters long and least 30 characteres short.'),
      '#placeholder' => 'Nombres',
      '#id' => 'limon_form_name',
      '#size' => 40,
      '#maxlength' => 80,
      '#required' => TRUE,
      '#weight' => 1,
    ];
    $form['limon_form']['lastname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Apellido de contacto'),
      '#title_display' => 'invisible',
      // '#description' => $this->t('The title must be at least 5 characters long and least 30 characteres short.'),
      '#placeholder' => 'Apellidos',
      '#id' => 'limon_form_lastname',
      '#size' => 40,
      '#maxlength' => 80,
      '#required' => TRUE,
      '#weight' => 2,
    ];
    $form['limon_form']['genre']=[
        '#type' => 'select',
        '#title' => $this->t('Genero'),
        '#title_display' => 'invisible',
        '#id' => 'limon_form_genre',
        '#options' => [
          'masculino' => 'masculino',
          'femenino' => 'femenino',
        ],
        '#placeholder' => 'Genero',
        '#weight' => 2,
      ];
    //
    $form['limon_form']['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#title_display' => 'invisible',
      '#placeholder' => 'Email',
      '#id' => 'limon_form_email',
      '#size' => 40,
      '#maxlength' => 80,
      '#required' => TRUE,
      '#weight' => 3,
    ];

    $form['limon_form']['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Teléfono'),
      '#title_display' => 'invisible',
      '#placeholder' => 'Teléfono',
      '#id' => 'limon_form_phone',
      '#size' => 40,
      '#maxlength' => 20,
      '#required' => FALSE,
      '#weight' => 4,
    ];
    $form['limon_form']['dni'] = [
      '#type' => 'number',
      '#title' => $this->t('D.N.I'),
      '#title_display' => 'invisible',
      '#placeholder' => 'D.N.I',
      '#id' => 'limon_form_dni',
      '#size' => 40,
      '#maxlength' => 20,
      '#required' => FALSE,
      '#weight' => 5,
    ];
    $form['limon_form']['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Fecha de nacimiento'),
      '#title_display' => 'invisible',
      '#placeholder' => 'DÍA/MES/AÑO',
      '#id' => 'limon_form_date',
      '#size' => 40,
      '#maxlength' => 20,
      '#required' => FALSE,
      '#weight' => 6,
    ];
    $form['limon_form']['city']=[
        '#type' => 'select',
        '#title' => $this->t('Ciudad'),
        '#title_display' => 'invisible',
        '#id' => 'limon_form_city',
        '#options' => [
          'city_1' => 'city_1',
          'city_2' => 'city_2',
          'city_3' => 'city_3',
        ],
        '#placeholder' => 'Ciudad',
        '#weight' => 7,
      ];

    $form['limon_form']['wish']=[
      '#type' => 'checkbox',
      '#title' => $this->t('Deseo recibir información por parte de Limon a mi correo electrónico'),
      '#default_value' => 'accept',
      '#id' => 'limon_form_hb',
      '#weight' => 8,
    ];

    $form['limon_form']['terms']=[
      '#type' => 'checkbox',
      '#title' => $this->t('He leído y acepto los'.'<a href= "google.com" target="blank"> términos y condiciones </a>'.' y la '.'<a href="google.com" target="blank">política de privacidad</a>'),
      '#default_value' => 'accept',
      '#id' => 'limon_form_terminos_y_condiciones',
      '#required' => TRUE,
      '#weight' => 9,
    ];

    $form['limon_form']['actions']=[
      '#type' => 'actions',
    ];

    $form['limon_form']['actions']['submit']=[
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#id' => 'limon_form_submit',
    ];

    return $form;
  }

  public function getFormId() {
    return 'limon_contact_limon_form';
  }


  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();
    $connection = \Drupal::database();
    if(!empty($values)){
      $result = $connection->insert('contacts')
      ->fields([
        'nombres' => $values['name'],
        'apellidos' => $$values['lastname'],
        'genero' => $values['genre'],
        'celular' => $values['phone'],
        'dni' => $values['dni'],
        'email' => $values['email'],
        'ciudad' => $values['city'],
        'fecha' => strtotime($values['date']),
        'creado' => strtotime(date('Y-m-d')),
      ])
      ->execute();
    }

    \Drupal::messenger()->addStatus(t('Gracias por susucribirte'));

  }

}
