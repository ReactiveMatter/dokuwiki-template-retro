<?php
/**
 * DokuWiki Retro Template
 *
 * @link     http://dokuwiki.org/template:minimal
 * @author   Reactive Matter <reactivematter@protonmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );


$theme = '';
if(tpl_getConf('theme')!='Default')
{
    $theme = ' theme-'.strtolower(tpl_getConf('theme'));
}

$toc = tpl_getConf('inlineToc')?' itoc':'';
$width = tpl_getConf('fullWidthSite')?' full-width':'';
$tpl_retro_classes =  tpl_classes().$toc.$width.$theme;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>


<body class="<?=$tpl_retro_classes?>">
<div id="dokuwiki__top"></div>
<navbar id="navbar" class="container" role="navigation" aria-label="Main navigation">
        <div id='showhidesidemenu' class="mobile icon">
            <div class="button"></div>
        </div>
        <div class="left-column">
        <a class="site-name" href="<?=DOKU_BASE?>">
        <div class="site-logo">
            <img src="<?=tpl_getMediaFile(array(':wiki:logo.png', ':wiki:logo.svg', ':wiki:logo.jpeg',':wiki:logo.jpg',  ':logo.png', ':logo.svg', ':logo.jpeg',':logo.jpg', 'images/logo.png', ':wiki:dokuwiki.svg'), false)?>">
        </div>
        <div class="site-title">
            <?=$conf['title']?>
        </div>
        </a>
        <?php if($conf['tagline']):?>
        <div class="site-tagline">
            <?=$conf['tagline']?>
        </div>
        <?php endif;?>
        </div>
        <?php if(actionOK('search') ):?>
        <div class="right-column">
        <?php if($showTools):?>
        <div class="search">
            <?php tpl_searchform(true,false) ?>
        </div>
        <?php endif?>

        </div>

     <?php endif?>
    </navbar>
    <?php if(tpl_getConf('topToolBar') ):?>
         <div class="top-toolbar plain-toolbar">
           <?php if(strpos(tpl_getConf('topToolBar'), 'page') !== false)
           {echo (new \dokuwiki\Menu\PageMenu())->getListItems();}
            ?>
            <?php if(strpos(tpl_getConf('topToolBar'), 'site') !== false)
           {echo (new \dokuwiki\Menu\SiteMenu())->getListItems();}
            ?>
            <?php if(strpos(tpl_getConf('topToolBar'), 'user') !== false)
           {
            echo (new \dokuwiki\Menu\UserMenu())->getListItems();
            if($USERINFO) { echo '<li>('.$USERINFO['name'].')</li>'; }
           }
            ?>
            
        </div>
    <?php endif; ?>
    
    <?php if($conf['youarehere'] || $conf['breadcrumbs'] || (page_exists(":header") && auth_quickaclcheck(":header"))):?>
    <div class="site-header">
    <?php html_msgarea()  ?>
    <!-- ********** Notice ********** -->
    <?php 
        if(page_exists(":header") && auth_quickaclcheck(":header"))
        {
            echo '<div class="site-header-content">';
            tpl_include_page(':header');
            echo '</div>';
        }
    ?>

    <?php if($conf['youarehere'] || $conf['breadcrumbs']):?>
    
    <div class="site-navigation">
        <!-- BREADCRUMBS -->
        <?php if($conf['youarehere']){ ?>
            <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
        <?php } ?>
        <?php if($conf['breadcrumbs']){ ?>
            <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
        <?php } ?>
    </div>
    <?php endif?>
    </div>
    <?php endif?>

<main id="main">
        <article id="content">
            <?php tpl_flush();
                if($conf['tocminheads']>0)
                {   
                    
                    tpl_toc();
                }
                tpl_content(false);
                tpl_flush(); ?>
        </article>
        <?php if(tpl_getConf('showPageInfo') ):?>
         <div class="page-info">
                <?php tpl_pageinfo()?>      
        </div>
        <?php endif; ?>
        <!-- /footer -->
     <div style="display: none;"><?php tpl_indexerWebBug()?></div>
    </div>
    <?php if(tpl_getConf('bottomToolBar') ):?>
         <div class="bottom-toolbar plain-toolbar">
         <?php if(strpos(tpl_getConf('bottomToolBar'), 'page') !== false)
           {echo (new \dokuwiki\Menu\PageMenu())->getListItems();}
            ?>
            <?php if(strpos(tpl_getConf('bottomToolBar'), 'site') !== false)
           {echo (new \dokuwiki\Menu\SiteMenu())->getListItems();}
            ?>
            <?php if(strpos(tpl_getConf('bottomToolBar'), 'user') !== false)
           {echo (new \dokuwiki\Menu\UserMenu())->getListItems();
            if($USERINFO) { echo '<li>('.$USERINFO['name'].')</li>'; }

           }
            ?>

        </main>
    <?php endif; ?>
        <?php 
    if(page_exists(":footer") && auth_quickaclcheck(":footer"))
    {
        echo '<footer id="footer">';
        tpl_include_page(':footer');
        echo '</footer>';
    }
    ?>
</body>
</html>
