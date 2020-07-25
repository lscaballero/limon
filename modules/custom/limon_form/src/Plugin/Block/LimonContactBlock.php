<?php

namespace Drupal\limon_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'FormcontactBlock' block.
 *
 * @Block(
 *  id = "limon_contact_limon_form",
 *  admin_label = @Translation("Contactenos"),
 * )
 */

class LimonContactBlock extends BlockBase  {
  public function build() {
   $form = \Drupal::formBuilder()->getForm('Drupal\limon_form\Form\LimonContactForm');
    return  $form;
  }
}
