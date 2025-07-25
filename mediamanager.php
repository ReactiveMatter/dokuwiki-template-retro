<?php
/**
 * DokuWiki Media Manager Popup
 *
 * @author   Andreas Gohr <andi@splitbrain.org>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */
// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
  lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction'] ?>" class="popup no-js">
<head>
    <meta charset="UTF-8" />
    <title>
        <?php echo hsc($lang['mediaselect'])?>
        [<?php echo strip_tags($conf['title'])?>]
    </title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders()?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>
<?php

$theme = '';
if(tpl_getConf('theme')!='Default')
{
    $theme = ' theme-'.strtolower(tpl_getConf('theme'));
}

$toc = tpl_getConf('inlineToc')?' itoc':'';
$width = tpl_getConf('fullWidthSite')?' full-width':'';
$tpl_retro_classes =  tpl_classes().$toc.$width.$theme;
?>

<body <?=$tpl_retro_classes?>>
    <div id="media__manager">
        <?php html_msgarea() ?>
        <nav id="mediamgr__aside"><div class="pad">
            <h1><?php echo hsc($lang['mediaselect'])?></h1>

            <?php /* keep the id! additional elements are inserted via JS here */?>
            <div id="media__opts"></div>

            <?php tpl_mediaTree() ?>
        </div></nav>

        <main id="mediamgr__content"><div class="pad">
            <?php tpl_mediaContent() ?>
        </div></main>
    </div>
</body>
</html>
