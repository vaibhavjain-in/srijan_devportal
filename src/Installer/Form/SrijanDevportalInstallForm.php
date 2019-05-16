<?php

namespace Drupal\srijan_devportal\Installer\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Installer task for Srijan Developer Portal Demo Content.
 */
class SrijanDevportalInstallForm extends FormBase {

  /**
   * The module installer.
   *
   * @var \Drupal\Core\Extension\ModuleInstallerInterface
   */
  protected $moduleInstaller;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * DemoInstallForm constructor.
   *
   * @param \Drupal\Core\Extension\ModuleInstallerInterface $module_installer
   *   The module installer.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ModuleInstallerInterface $module_installer, ConfigFactoryInterface $config_factory) {
    $this->moduleInstaller = $module_installer;
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_installer'),
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'srijan_devportal_demo_install_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#title'] = $this->t('Install Demo content?');

    $form['install_demo_content'] = [
      '#type' => 'checkbox',
      '#title' => 'Enable demo content',
      '#description' => $this->t('Check this box to install some demo content to help you test out srijan devportal features quickly.'),
      '#default_value' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save and continue'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $demo_content = $form_state->getValue('install_demo_content');

    $input = $form_state->getUserInput();
    if (isset($input['install_demo_content'])) {
      $demo_content = !empty($input['install_demo_content']);
    }

    if ($demo_content) {
      $this->moduleInstaller->install(['srijan_devportal_content']);
    }
  }

}
