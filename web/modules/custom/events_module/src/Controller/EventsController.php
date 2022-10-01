<?php
namespace Drupal\events_module\Controller;

use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Symfony\Component\HttpFoundation\RedirectResponse;



class EventsController {
  

  public function index() {
    $config = \Drupal::config('events_module.settings');
    $table_header = [
        'id'=>t('ID'),
        'title'=>t('Title'),
        'img_url'=>t('image'),
        'description'=>t('Description'),
        'category_id'=>t('Category'),
        'start_time'=>t('Start'),
        'end_time'=>t('End'),
        'opt_edit'=>t('Edit'),
        'opt_delete'=>t('Delete'),
    ];
    $table_rows=[];
    $db_connention = Database::getConnection();
    $query = $db_connention->select('user_events','ue');
    $query->join('events_categories', 'ec', 'ue.category_id  = ec.uid');
    $query->join('file_managed', 'fm', 'ue.img_url  = fm.fid');
    $query->fields('ue', ['uid','title','img_url','description','category_id', 'start_time','end_time']);
    $query->fields('ec', ['uid','title']);
    $query->fields('fm', ['uri']);
    $query->orderBy('start_time', 'DESC');
    $current_time=new \Drupal\Core\Datetime\DrupalDateTime();
    $current_time=$current_time->format('Y-m-d h:m:s');

    if((int)$config->get('events_module.show_past_events')>0)
    {
        $query->condition('start_time',$current_time, '>');
        $query->condition('end_time',$current_time, '>');
    }
    if((int)$config->get('events_module.events_limit_number')>0)
    {
        $query->range(0, $config->get('events_module.events_limit_number'));
    }
    $results = $query->execute()->fetchAll();
    foreach ($results as $key => $event) {
        $delete_opt = Url::fromUserInput('/event/delete/'.$event->uid);
        $edit_opt = Url::fromUserInput('/event/data?id='.$event->uid);
        $absolute_path = \Drupal::service('stream_wrapper_manager')->getViaUri($event->uri);
        $table_rows[]=[
            'id'=>$event->uid,
            'title'=>$event->title,
            'img_url'=>t('<img src="'.$absolute_path->getExternalUrl().'" alt="photo" style="">') ,
            'description'=>$event->description,
            'category_id'=>$event->ec_title,
            'start_time'=>$event->start_time,
            'end_time'=>$event->end_time,
            'opt_edit'=>Link::fromTextAndUrl('Edit',$edit_opt),
            'opt_delete'=>Link::fromTextAndUrl('Delete',$delete_opt)
        ];
    }

    $add_opt = Url::fromUserInput('/event/data');
    $data['table']=[
        '#type'=>'table',
        '#header'=> $table_header,
        '#rows'=> $table_rows,
        '#empty'=> t('No events found'),
        '#caption'=> Link::fromTextAndUrl('Add event', $add_opt)
    ];
    return $data;
  }

}