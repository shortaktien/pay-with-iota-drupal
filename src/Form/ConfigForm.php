<?php  
  
/**  
 * @file  
 * Contains Drupal\iota_pay_donate\Form\ConfigForm.  
 */  
  
namespace Drupal\iota_pay_donate\Form;  
  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  
  
class ConfigForm extends ConfigFormBase {  
  /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'iota_pay_donate.adminsettings',  
    ];  
  }  
  
  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'iota_pay_donate_form';  
  }  

   /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('iota_pay_donate.adminsettings'); 
  
    $form['iota_pay_donate_address'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('Address'),    
      '#default_value' => $config->get('iota_pay_donate_address'),  
    ];  
    $form['iota_pay_donate_amount'] = [  
      '#type' => 'textfield',
      '#title' => $this->t('Amount'),  
      '#default_value' => $config->get('iota_pay_donate_amount'),  
    ];
    $form['iota_pay_donate_currency'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('Currency'),  
      '#default_value' => $config->get('iota_pay_donate_currency'),  
    ];
    $form['iota_pay_donate_user'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('User'),   
      '#default_value' => $config->get('iota_pay_donate_user'),  
    ];
  
    return parent::buildForm($form, $form_state);  
    
  } 

    /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);  
  
    $this->config('iota_pay_donate.adminsettings')  
      ->set('iota_pay_donate_address', $form_state->getValue('iota_pay_donate_address')) 
      ->set('iota_pay_donate_amount', $form_state->getValue('iota_pay_donate_amount'))
      ->set('iota_pay_donate_currency', $form_state->getValue('iota_pay_donate_currency'))
      ->set('iota_pay_donate_user', $form_state->getValue('iota_pay_donate_user')) 
      ->save();  
  } 

} 