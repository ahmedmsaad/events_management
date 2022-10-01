<?php
namespace Drupal\events_module\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Messenger;

/**
 * Our simple form class.
 */
class EventDeleteForm extends ConfirmFormBase {
  public $id;
  /**
   * {@inheritdoc}
   */
	public function getFormId() {
		return 'delete_form';
	}
  public function getQuestion() {
		return t('Delete Event?');
	}
  public function getDescription() {
		return t('Are you sure Do you want to delete the event?');
	}

  public function getCancelUrl(){
		return new Url('events_module.events');
  }
  public function getConfirmText(){
		return t('Delete it');
  }

  public function getCancelText() {
		return t('Cancel');
	}
  public function buildForm(array $form, FormStateInterface $form_state,$id= NULL) {
    $this->id = $id;
    return parent::buildForm($form, $form_state);
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $query = \Drupal::database();
    $query->delete('user_events')->condition('uid', $this->id)->execute();
    $form_state->setRedirect('events_module.events');

  }


}


?>