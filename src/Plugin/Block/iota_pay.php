<?php

namespace Drupal\iota_pay_donate\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'IOTA Pay' Block.
 *
 * @Block(
 *   id = "iota_pay",
 *   admin_label = @Translation("IOTA Pay"),
 *   category = @Translation("IOTA Pay"),
 * )
 */
class IOTA_Pay extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('iota_pay_donate.adminsettings');
    return [
      '#theme' => 'iota_pay',
      '#data' => [
        'address' => $config->get('iota_pay_donate_address'), 
        'amount' => $config->get('iota_pay_donate_amount'),
        'currency' => $config->get('iota_pay_donate_currency'),
        'user_1' => $config->get('iota_pay_donate_user'),  
      ],
    ];
  }  
}