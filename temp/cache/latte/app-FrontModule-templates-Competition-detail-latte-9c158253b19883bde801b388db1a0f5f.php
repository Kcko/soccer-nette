<?php
// source: C:\wamp64\www\private\w-e-b-s\2014\Soccer\app\FrontModule/templates/Competition/detail.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4073575557', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb3439f5e108_title')) { function _lb3439f5e108_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?> <?php echo Latte\Runtime\Filters::escapeHtml($competName, ENT_NOQUOTES) ?> - <?php echo Latte\Runtime\Filters::escapeHtml($seasonName, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb5794fca111_content')) { function _lb5794fca111_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <div class="row">

            <div class="col-lg-8">
                <h1 class="page-header">
                   
                    <?php echo Latte\Runtime\Filters::escapeHtml($competName, ENT_NOQUOTES) ?>
 - <?php echo Latte\Runtime\Filters::escapeHtml($seasonName, ENT_NOQUOTES) ?>

                </h1>

                
                <div<?php echo ' id="' . $_control->getSnippetId('competition') . '"' ?>>
<?php call_user_func(reset($_b->blocks['_competition']), $_b, $template->getParameters()) ?>
                </div>
            </div>

            <div class="col-md-4">

                <div class="well">
                    <h4>Soutěže</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
<?php $iterations = 0; foreach ($competitions as $compet) { ?>
                                    <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("detail", array($compet->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($compet->competition->name, ENT_NOQUOTES) ?>
 - <?php echo Latte\Runtime\Filters::escapeHtml($compet->season->name, ENT_NOQUOTES) ?></a></li>
<?php $iterations++; } ?>
                            </ul>
                        </div>
   
                    </div>
                    <!-- /.row -->
                </div>

            </div>

        </div>
        <!-- /.row -->




<?php
}}

//
// block _competition
//
if (!function_exists($_b->blocks['_competition'][] = '_lb71c1cbadf4__competition')) { function _lb71c1cbadf4__competition($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('competition', FALSE)
;$iterations = 0; foreach ($iterator = $_l->its[] = new Latte\Runtime\CachingIterator($stageList) as $id => $stage) { ?>

<?php if ($stage['row']['has_matches'] || $stage['row']['has_table']) { ?>
                        
                            <h4>
                                <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
                                <a href="#stage-<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($id), ENT_COMPAT) ?>
" id="stage-<?php echo Latte\Runtime\Filters::escapeHtml($id, ENT_COMPAT) ?>"><?php echo Latte\Runtime\Filters::escapeHtml($stage['name'], ENT_NOQUOTES) ?></a>
                            </h4>
         
<?php if ($stage['row']['has_matches']) { ?>
                                <div<?php echo ' id="' . ($_l->dynSnippetId = $_control->getSnippetId("result-$id")) . '"' ?>>
<?php ob_start() ;$_l->tmp = $_control->getComponent("results"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render($id) ;$_l->dynSnippets[$_l->dynSnippetId] = ob_get_flush() ?>                                </div>
<?php } ?>

<?php if ($stage['row']['has_table']) { ?>
                                <div<?php echo ' id="' . ($_l->dynSnippetId = $_control->getSnippetId("table-$id")) . '"' ?>>
<?php ob_start() ;$_l->tmp = $_control->getComponent("tables"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render($id) ;$_l->dynSnippets[$_l->dynSnippetId] = ob_get_flush() ?>                                </div>
<?php } ?>

                           <?php if (!$iterator->isLast()) { ?> <hr> <?php } ?>


<?php } ?>

<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;if (isset($_l->dynSnippets)) return $_l->dynSnippets; 
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
$competName = $competition_season->competition->name ;$seasonName = $competition_season->season->name ?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ?>
 

<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 