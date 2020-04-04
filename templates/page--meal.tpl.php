<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="header" class="tw-mb-4 tw-bg-cmow-indigo tw-border">
    <div class="tw-flex tw-items-center tw-justify-between tw-p-4 lg:tw-py-4 lg:tw-mx-24">

      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo" class="tw-mr-2">
          <img class="tw-block lg:tw-w-48 tw-w-32" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>">
        </a>
      <?php endif; ?>

      <!--<?php if ($main_menu || $secondary_menu): ?>
        <nav id="navigation" class="tw-mb-4">
          <div class="nav-inner">
            <?php print theme('links__system_main_menu', array('links' => menu_navigation_links('main', 1), 'attributes' => array('id' => 'main-menu'))); ?>
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu'))); ?>
          </div>
        </nav>
      <?php endif; ?>-->

      <?php if ($page['header']): ?>
        <div class="tw-hidden lg:tw-block"><?php print render($page['header']); ?></div>
        <a id="open-mobile-menu" class="lg:tw-hidden tw-font-bold tw-text-white tw-text-xl">Menu</a>
      <?php endif; ?>

    </div>
    <?php if ($page['header']): ?>
      <div id="mobile-menu" class="lg:tw-hidden tw-pt-8 tw-pb-16 tw-object-right-top tw-w-full tw-z-50 tw-bg-cmow-indigo"><?php print render($page['header']); ?></div>
    <?php endif; ?>
  </div>

  <div class="tw-bg-white">
    <div id="page-wrapper" class="tw-p-4 lg:tw-px-8 lg:tw-py-20 lg:tw-mx-24">
      <div id="page">

      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>

      <?php print $messages; ?>

      <div id="main-wrapper"><div id="main" class="md:tw-flex tw--mx-4 tw-mb-6 clearfix">

        <div id="content" class="md:tw-flex-1 tw-px-4"><div class="section">
          <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
          <a id="main-content"></a>
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div></div> <!-- /.section, /#content -->

        <?php if ($page['sidebar_first']): ?>
          <div id="sidebar-first" class="md:tw-w-1/4 tw-px-4"><div class="section">
            <?php print render($page['sidebar_first']); ?>
          </div></div> <!-- /.section, /#sidebar-first -->
        <?php endif; ?>

        <?php if ($page['sidebar_second']): ?>
          <div id="sidebar-second" class="column sidebar"><div class="section">
            <?php print render($page['sidebar_second']); ?>
          </div></div> <!-- /.section, /#sidebar-second -->
        <?php endif; ?>

      </div></div> <!-- /#main, /#main-wrapper -->

    </div></div> <!-- /#page, /#page-wrapper -->
  </div>
  <footer id="footer" class="tw-bg-cmow-indigo tw-text-white">
    <div class="tw-px-4 tw-py-8 lg:tw-px-8 lg:tw-py-16 lg:tw-mx-24">
      <?php print render($page['footer']); ?>
    </div>
  </footer> <!-- /.section, /#footer -->
