<?php

/**
 * @file
 * Contains \Drupal\axe\Controller\AxeController.
 */

namespace Drupal\axe\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for axe module routes.
 */
class AxeController extends ControllerBase {

  /**
   * Builds a axe page.
   */
  public function build() {

    // Sanity Check 1. Somethings Printing.
    // return 'Howdy Austin';

    // Sanity Check 2. Renderable Array.
    // return array(
    //   '#theme' => 'item_list',
    //   '#items' => array(
    //     'beaver',
    //     'pine beetle',
    //     'lumber jack',
    //   ),
    // );

    // Quick Inline Template test. Sanity Check 3.

    // Creat some link render array.
    // $render_array = array(
    //   '#type' => 'link',
    //   '#title' => "Y'all",
    //   '#href' => '<front>',
    //   '#attributes' => array('rel' => 'home', 'title' => t('Home')),
    // );

    // $users = array(
    //   array(
    //     'name' => '<taggy mc="taggerson">',
    //   ),
    //   array(
    //     'name' => 'Jay Pritchett',
    //   ),
    //   array(
    //     'name' => 'Gloria Delgado-Pritchett',
    //   )
    // );

    // // Render quick inline.
    // return $this->renderInline('
    //   Hello {{ name }}!
    //   {% for user in users %}
    //     <li>{{ user.name|e }}</li>
    //   {% endfor %}',
    //   array(
    //     'name' => $render_array,
    //     'users' => $users,
    //   )
    // );

  }

  /**
   * Inline Rendering Twig
   * @return string
   */
  function renderInline($template = '', $data = array()) {
    // 'Pilfer' the twig service.
    $twig = \Drupal::service('twig');

    // Create a new string loader(inline template).
    // @see http://twig.sensiolabs.org/api/master/Twig_Loader_String.html
    // and http://twig.sensiolabs.org/doc/api.html#twig-loader-string
    $loader = new \Twig_Loader_String();

    // Sore the old template loader so we don't break things.
    $old_loader = $twig->getLoader();

    // Set the new twig string template loader.
    $twig->setLoader($loader);

    // Render the inline template with the name link renderable array variable.
    $output = $twig->render($template, $data);

    // Set the old loader so templates still work.
    $twig->setLoader($old_loader);

    return $output;
  }

}
