<?php
/**
 * BLOCK: Click to tweet (server)
 * Server side function shold hook init
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

 function render_tweet_block( $attributes ) {
   $tweet_url = urlencode( get_permalink() );
   /*gutenberg does not provide default value of property, we need to define here too.
   These must be same with gurenberg edit attriutes.*/
   $attributes_default = array(
     /*Common*/
     'pattern' => 1,
     'hashTag' => '',
     'via'=>'',
     'cttText' => '',
     'cttButtonText' => 'Click to Tweet',
     'cttTwIcon' => 'fab fa-twitter',
     'align' => 'left',
     /*pattern_1*/
     'textSize_1' => 16,
     'iconSize_1' => 16,
     'marginTop_1' => 0,
     'marginBottom_1' => 20,
     'borderStyle_1' => 'solid',
     'borderSize_1' => 3,
     'borderRadius_1' => 0,
     'paddingLeftRight_1' => 20,
     'paddingTopBottom_1' => 10,
     'textColor_1' => '#545454',
     'bgColor_1' => '#f5f5f5',
     'borderColor_1' => '#545454',
     'iconColor_1' => '#55acee',
     /*pattern_2*/
     'textSize_2' => 16,
     'iconSize_2' => 16,
     'marginTop_2' => 0,
     'marginBottom_2' => 20,
     'borderStyle_2' => 'none',
     'borderSize_2' => 3,
     'borderRadius_2' => 0,
     'paddingLeftRight_2' => 20,
     'paddingTopBottom_2' => 10,
     'textColor_2' => '#545454',
     'bgColor_2' => '#f5f5f5',
     'borderColor_2' => '#545454',
     'iconColor_2' => '#55acee',
     /*pattern_3*/
     'textSize_3' => 16,
     'iconSize_3' => 16,
     'marginTop_3' => 0,
     'marginBottom_3' => 20,
     'borderStyle_3' => 'double',
     'borderSize_3' => 4,
     'borderRadius_3' => 0,
     'paddingLeftRight_3' => 20,
     'paddingTopBottom_3' => 10,
     'textColor_3' => '#545454',
     'bgColor_3' => '#f5f5f5',
     'borderColor_3' => '#545454',
     'iconColor_3' => '#55acee',
     /*pattern_4*/
     'textSize_4' => 16,
     'iconSize_4' => 16,
     'marginTop_4' => 0,
     'marginBottom_4' => 20,
     'borderStyle_4' => 'dashed',
     'borderSize_4' => 3,
     'borderRadius_4' => 0,
     'paddingLeftRight_4' => 20,
     'paddingTopBottom_4' => 10,
     'textColor_4' => '#545454',
     'bgColor_4' => '#f5f5f5',
     'borderColor_4' => '#545454',
     'iconColor_4' => '#55acee',
     /*pattern_5*/
     'textSize_5' => 16,
     'iconSize_5' => 16,
     'marginTop_5' => 0,
     'marginBottom_5' => 20,
     'borderStyle_5' => 'dotted',
     'borderSize_5' => 3,
     'borderRadius_5' => 0,
     'paddingLeftRight_5' => 20,
     'paddingTopBottom_5' => 10,
     'textColor_5' => '#545454',
     'bgColor_5' => '#f5f5f5',
     'borderColor_5' => '#545454',
     'iconColor_5' => '#55acee',
   );
   /*Pass each default attribute to each variable.*/
   extract( $attributes_default );
   /*Pass each changed attribute to each variable.*/
   extract( $attributes );
   //echo '<pre>';
   //var_dump($attributes);
   //echo '</pre>';
   if ( $via ) {
     $via = "via={$via}";
   }
/*Start render DOM*/
  $output = "";
  if ( $pattern === 1 ) {
    $output .= "<style>";
    $output .= ".wp-block-ug-ctt-block-$pattern-$id {
      display: block;
      margin-top: ".$marginTop_1."px;
      margin-bottom: ".$marginBottom_1."px;
      background-color: $bgColor_1;
      color: $textColor_1;
      font-size: ".$textSize_1."px;
      border: ".$borderSize_1."px $borderStyle_1 $borderColor_1;
      border-radius: ".$borderRadius_1."px;
      padding: ".$paddingTopBottom_1."px ".$paddingLeftRight_1."px;
      text-align: $align;
    }
    .wp-block-ug-ctt-block-$pattern-$id a.wp-block-ug-ctt-block-text {
      color: $textColor_1;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button {
      display: block;
      color: $textColor_1;
      font-size: ".$iconSize_1."px;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button i {
      color: $iconColor_1;
    }";
    $output .= "</style>";
   	$output .= "<div class='wp-block-ug-ctt-block-common wp-block-ug-ctt-block-$pattern'>";
    $output .= "<div class='wp-block-ug-ctt-block-$pattern-$id'>";
    $output .= "<a class='wp-block-ug-ctt-block-text' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'>$cttText</a>";
    $output .= "<a class='wp-block-ug-ctt-block-button' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'><i class='{$cttTwIcon}'></i>{$cttButtonText}</a>";
    $output .= "</div></div>";
  }
  if ( $pattern === 2 ) {
    $output .= "<style>";
    $output .= ".wp-block-ug-ctt-block-$pattern-$id {
      display: block;
      margin-top: ".$marginTop_2."px;
      margin-bottom: ".$marginBottom_2."px;
      background-color: $bgColor_2;
      color: $textColor_2;
      font-size: ".$textSize_2."px;
      border: ".$borderSize_2."px $borderStyle_2 $borderColor_2;
      border-radius: ".$borderRadius_2."px;
      padding: ".$paddingTopBottom_2."px ".$paddingLeftRight_2."px;
      text-align: $align;
    }
    .wp-block-ug-ctt-block-$pattern-$id a.wp-block-ug-ctt-block-text {
      color: $textColor_2;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button {
      display: block;
      color: $textColor_2;
      font-size: ".$iconSize_2."px;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button i {
      color: $iconColor_2;
    }";
    $output .= "</style>";
    $output .= "<div class='wp-block-ug-ctt-block-common wp-block-ug-ctt-block-$pattern'>";
    $output .= "<div class='wp-block-ug-ctt-block-$pattern-$id'>";
    $output .= "<a class='wp-block-ug-ctt-block-text' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'>$cttText</a>";
    $output .= "<a class='wp-block-ug-ctt-block-button' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'><i class='{$cttTwIcon}'></i>{$cttButtonText}</a>";
    $output .= "</div></div>";
  }
  if ( $pattern === 3 ) {
    $output .= "<style>";
    $output .= ".wp-block-ug-ctt-block-$pattern-$id {
      display: block;
      margin-top: ".$marginTop_3."px;
      margin-bottom: ".$marginBottom_3."px;
      background-color: $bgColor_3;
      color: $textColor_3;
      font-size: ".$textSize_3."px;
      border: ".$borderSize_3."px $borderStyle_3 $borderColor_3;
      border-radius: ".$borderRadius_3."px;
      padding: ".$paddingTopBottom_3."px ".$paddingLeftRight_3."px;
      text-align: $align;
    }
    .wp-block-ug-ctt-block-$pattern-$id a.wp-block-ug-ctt-block-text {
      color: $textColor_3;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button {
      display: block;
      color: $textColor_3;
      font-size: ".$iconSize_3."px;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button i {
      color: $iconColor_3;
    }";
    $output .= "</style>";
    $output .= "<div class='wp-block-ug-ctt-block-common wp-block-ug-ctt-block-$pattern'>";
    $output .= "<div class='wp-block-ug-ctt-block-$pattern-$id'>";
    $output .= "<a class='wp-block-ug-ctt-block-text' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'>$cttText</a>";
    $output .= "<a class='wp-block-ug-ctt-block-button' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'><i class='{$cttTwIcon}'></i>{$cttButtonText}</a>";
    $output .= "</div></div>";
  }
  if ( $pattern === 4 ) {
    $output .= "<style>";
    $output .= ".wp-block-ug-ctt-block-$pattern-$id {
      display: block;
      margin-top: ".$marginTop_4."px;
      margin-bottom: ".$marginBottom_4."px;
      background-color: $bgColor_4;
      color: $textColor_4;
      font-size: ".$textSize_4."px;
      border: ".$borderSize_4."px $borderStyle_4 $borderColor_4;
      border-radius: ".$borderRadius_4."px;
      padding: ".$paddingTopBottom_4."px ".$paddingLeftRight_4."px;
      text-align: $align;
    }
    .wp-block-ug-ctt-block-$pattern-$id a.wp-block-ug-ctt-block-text {
      color: $textColor_4;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button {
      display: block;
      color: $textColor_4;
      font-size: ".$iconSize_4."px;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button i {
      color: $iconColor_4;
    }";
    $output .= "</style>";
    $output .= "<div class='wp-block-ug-ctt-block-common wp-block-ug-ctt-block-$pattern'>";
    $output .= "<div class='wp-block-ug-ctt-block-$pattern-$id'>";
    $output .= "<a class='wp-block-ug-ctt-block-text' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'>$cttText</a>";
    $output .= "<a class='wp-block-ug-ctt-block-button' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'><i class='{$cttTwIcon}'></i>{$cttButtonText}</a>";
    $output .= "</div></div>";
  }
  if ( $pattern === 5 ) {
    $output .= "<style>";
    $output .= ".wp-block-ug-ctt-block-$pattern-$id {
      display: block;
      margin-top: ".$marginTop_5."px;
      margin-bottom: ".$marginBottom_5."px;
      background-color: $bgColor_5;
      color: $textColor_5;
      font-size: ".$textSize_5."px;
      border: ".$borderSize_5."px $borderStyle_5 $borderColor_5;
      border-radius: ".$borderRadius_5."px;
      padding: ".$paddingTopBottom_5."px ".$paddingLeftRight_5."px;
      text-align: $align;
    }
    .wp-block-ug-ctt-block-$pattern-$id a.wp-block-ug-ctt-block-text {
      color: $textColor_5;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button {
      display: block;
      color: $textColor_5;
      font-size: ".$iconSize_5."px;
    }
    .wp-block-ug-ctt-block-$pattern-$id .wp-block-ug-ctt-block-button i {
      color: $iconColor_5;
    }";
    $output .= "</style>";
    $output .= "<div class='wp-block-ug-ctt-block-common wp-block-ug-ctt-block-$pattern'>";
    $output .= "<div class='wp-block-ug-ctt-block-$pattern-$id'>";
    $output .= "<a class='wp-block-ug-ctt-block-text' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'>$cttText</a>";
    $output .= "<a class='wp-block-ug-ctt-block-button' href='https://twitter.com/share?&text={$cttText}&url={$tweet_url}&hashtags={$hashTag}&{$via}' target='_blank' rel='nofollow'><i class='{$cttTwIcon}'></i>{$cttButtonText}</a>";
    $output .= "</div></div>";
  }
  return $output;
}
