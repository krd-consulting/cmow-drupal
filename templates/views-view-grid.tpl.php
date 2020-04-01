<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="<?php print $class; ?>"<?php print $attributes; ?>>
  <?php if (!empty($caption)) : ?>
    <caption><?php print $caption; ?></caption>
  <?php endif; ?>

  <div class="tw-grid tw-grid-cols-<?php echo count($rows[0]); ?> tw-grid-gap-12">
    <?php foreach ($rows as $row_number => $columns): ?>
        <?php foreach ($columns as $column_number => $item): ?>
            <div>
              <?php print $item; ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>
