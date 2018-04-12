<div class="<?php print $classes; ?>" <?php print $attributes; ?>>

  <figure>
    <a href="<?php print $node_url; ?>" title="<?php print $title; ?>">
      <img src="<?php print image_style_url('sl7_news_teaser', $sl7_news_image[0]['uri']); ?>" />
    </a>
  </figure>

  <div class="description">
    <article>

      <?php print render($title_prefix); ?>
      <h3<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h3>
      <?php print render($title_suffix); ?>

      <div class="info">
        <ul class="property">
          <li><?php print format_date($node->created, 'custom', SL7_DATE_FORMAT_WEEKDAY_NO_HOUR); ?></li>

          <?php if (isset($comment_count) && $comment_count > 0): ?>
            <li><a href="<?php print $node_url . '/#comments' ; ?>">Комментариев: <?php print $comment_count; ?></a></li>
          <?php endif; ?>
        </ul>

        <ul class="rubric">
          <?php if (!empty($sl7_news_rubric)): ?>
            <li>
              <?php
              $total = count($sl7_news_rubric);
              $counter = 0;
              foreach ($sl7_news_rubric as $rubric) {
                $counter++;
                if ($counter == $total) {
                  print l($rubric['taxonomy_term']->name, '/taxonomy/term/' . $rubric['taxonomy_term']->tid);
                }
                else {
                  print l($rubric['taxonomy_term']->name, '/taxonomy/term/' . $rubric['taxonomy_term']->tid) . ', ';
                }
              }
              ?>
            </li>
          <?php endif; ?>
        </ul>
      </div>

      <div class="body" <?php print $content_attributes; ?>>
        <p><?php print truncate_utf8(check_plain(strip_tags($body[0]['safe_value'])), 150, FALSE, TRUE); ?></p>
      </div>

      <div class="readmore">
        <a href="<?php print $node_url; ?>">Читать полностью</a>
      </div>

    </article>
  </div>

</div>