<?php

namespace Drupal\limon_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Class LimonConfigurationForm.
*
* @package Drupal\limon_form\Form
*/
class LimonConfigurationForm extends FormBase {

  /**
  * {@inheritdoc}
  */
  public function getFormId() {
    return 'config_form';
  }

  /**
  * {@inheritdoc}
  */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['url_action_limon'] = [
      '#type' => 'url',
      '#title' => $this->t('Url Action'),
      '#description' => $this->t('Url donde va el action'),
      '#default_value' => \Drupal::config('limon_form.settings.yml')->get('url_action'),
    ];

    $form['url_redirect_limon'] = [
      '#type' => 'url',
      '#title' => $this->t('Url de redireción'),
      '#description' => $this->t('Url donde redirige'),
      '#default_value' => \Drupal::config('limon_form.settings.yml')->get('url_redirect'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  /**
  * {@inheritdoc}
  */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
  * {@inheritdoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    \Drupal::configFactory()->getEditable('limon_form.settings.yml')->set('url_action', $values['url_action_limon'])->save();
    \Drupal::configFactory()->getEditable('limon_form.settings.yml')->set('url_redirect', $values['url_redirect_limon'])->save();

    \Drupal::messenger()->addStatus(t('Urls Actualizadas Correctamente'));
  }
}
