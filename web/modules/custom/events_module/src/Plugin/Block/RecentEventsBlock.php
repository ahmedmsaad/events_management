<?php

namespace Drupal\events_module\Plugin\Block;


use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Link;
/**
 * Provides a 'events' Block.
 *
 * @Block(
 *   id = "events_block",
 *   admin_label = @Translation("events block"),
 *   category = @Translation("events World"),
 * )
 */
class RecentEventsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('events_module.settings');

    $table_header = [
      'title'=>t('Title'),
  ];
  $table_rows=[];
  $db_connention = Database::getConnection();
  $query = $db_connention->select('user_events','ue');
  $query->fields('ue', ['uid','title','img_url','description','category_id', 'start_time','end_time']);
  $query->orderBy('start_time', 'DESC');
  // $query->range(0, (int)$config->get('events_module.recent_event_limit'));
  $query->range(0, 5);

  $results = $query->execute()->fetchAll();
  foreach ($results as $key => $event) {
      $edit_opt = Url::fromUserInput('/event/data?id='.$event->uid);
      $table_rows[]=[
          'title'=>Link::fromTextAndUrl($event->title,$edit_opt),
      ];
  }

  $data['table']=[
      '#type'=>'table',
      '#header'=> $table_header,
      '#rows'=> $table_rows,
      '#empty'=> t('No events found'),
  ];
  return $data;

  }

}