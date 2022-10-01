<?php
namespace Drupal\events_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Our simple form class.
 */
class EventConfigForm extends ConfigFormBase  {
  
  protected function getEditableConfigNames() {
    return [
      'events_module.settings',
    ];
  }

	public function getFormId() {
		return 'event_config_form';
	}

  
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('events_module.settings');

    $form['show_past_events'] = array(
      '#type' => 'checkbox',
      '#title' => t('Show past events? '),
      '#default_value' => $config->get('events_module.show_past_events'),
    );
    $form['events_limit_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Number of events to be listed'),
      '#default_value' => $config->get('events_module.events_limit_number'),
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('events_module.settings');
    $config->set('events_module.show_past_events', $form_state->getValue('show_past_events'));
    $config->set('events_module.events_limit_number', $form_state->getValue('events_limit_number'));
    $config->save();

    // to log when the user changes the module's configuration.
    $current_time=new \Drupal\Core\Datetime\DrupalDateTime();
    $current_time=$current_time->format('Y-m-d h:m:s');
    $row = [
      'show_past_events'=>$form_state->getValue('show_past_events'),
      'events_number'=>$form_state->getValue('events_limit_number'),
      'created_at'=>$current_time,
      'user_id' => \Drupal::currentUser()->id()
    ];
    $query = \Drupal::database();

    $query->insert('events_module_config')->fields($row)->execute();

    return parent::submitForm($form, $form_state);
  }

}


?>