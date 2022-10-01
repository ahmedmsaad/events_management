<?php
namespace Drupal\events_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Messenger;
use Drupal\Core\Datetime\DrupalDateTime;
/**
 * Our simple form class.
 */
class EventForm extends FormBase {
  /**
   * {@inheritdoc}
   */
	public function getFormId() {
		return 'event_form';
	}
  public function buildForm(array $form, FormStateInterface $form_state) {

    $conn = Database::getConnection();
     $record = array();
    if (isset($_GET['id'])) {
        $query = $conn->select('user_events', 'm')
            ->condition('uid', $_GET['id'])
            ->fields('m');
        $record = $query->execute()->fetchAssoc();
    }
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Event Title:'),
      '#required' => TRUE,
      '#default_value' => (isset($record['title']) && $_GET['id']) ? $record['title']:'',
    );
    $form['description'] = array(
      '#type' => 'textarea',
      '#title' => t('Event Description:'),
      '#default_value' => (isset($record['description']) && $_GET['id']) ? $record['description']:'',
    );
    $form['img_url'] = array(
      '#type' => 'managed_file',
      '#title' => t('Image:'),
      '#size' => 20,
      '#default_value' => (isset($record['img_url']) && $_GET['id']) ? [$record['img_url']]:[],
      '#upload_location' => 'public://my_files/',
    );

    $form['start_time'] = array(
      '#type' => 'datetime',
      '#title' => t('Start:'),
      '#default_value' => (isset($record['start_time']) && $_GET['id']) ? new DrupalDateTime($record['start_time'], 'UTC'):'',
    );
    $form['end_time'] = array(
      '#type' => 'datetime',
      '#title' => t('End Description:'),
      '#default_value' => (isset($record['end_time']) && $_GET['id']) ? new DrupalDateTime($record['end_time'], 'UTC'):'',
    );
   
    $query = $conn->select('events_categories', 'm')
            ->fields('m');
        $categories = $query->execute()->fetchAll(); 
    $categories_opts_list = [];
    if($categories){
      foreach($categories as $key => $value ){
        $categories_opts_list[$value->uid] = $value->title ;
      }
    }
    $form['category_id'] = array (
      '#type' => 'select',
      '#title' => ('Event category'),
      '#options' => $categories_opts_list,
      '#default_value'=>(isset($record['category_id']) && $_GET['id']) ? $categories_opts_list[$record['category_id']]:''
      );

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => 'save',
        //'#value' => t('Submit'),
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

    
    if ($form_state->getValue('start_time') > $form_state->getValue('end_time')) {
      $form_state->setErrorByName('event_time', $this->t('Event start & end time are not valid'));
    }

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $fields =$form_state->getValues();

    $row = [
      'title'=>$fields['title'],
      'img_url'=>$fields['img_url'][0],
      'description'=>$fields['description'],
      'category_id'=>$fields['category_id'],
      'start_time'=>$fields['start_time']->format('Y-m-d h:m:s'),
      'end_time'=>$fields['end_time']->format('Y-m-d h:m:s'),
      'user_id' => \Drupal::currentUser()->id()
    ];
    $query = \Drupal::database();
    if(isset($_GET['id'])){
      $query->update('user_events')->fields($row)->condition('uid',$_GET['id'])->execute();
    }else{
      $query->insert('user_events')->fields($row)->execute();

    }
    $form_state->setRedirect('events_module.events');
  }



}


?>