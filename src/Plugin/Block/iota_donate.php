<?php

namespace Drupal\iota_pay_donate\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'IOTA Donate' Block.
 *
 * @Block(
 *   id = "iota_donate",
 *   admin_label = @Translation("IOTA Donate"),
 *   category = @Translation("IOTA Donate"),
 * )
 */
class IOTA_Donate extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('iota_pay_donate.adminsettings');
    
    return [
      '#theme' => 'iota_donate',
      '#data' => [
        'address' => $config->get('iota_pay_donate_address'), 
        'amount' => $config->get('iota_pay_donate_amount'),
        'currency' => $config->get('iota_pay_donate_currency'),
        'user_1' => $config->get('iota_pay_donate_user'),
      ],
    ];
  } 

}