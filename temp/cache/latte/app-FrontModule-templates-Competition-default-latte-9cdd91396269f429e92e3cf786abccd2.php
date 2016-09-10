<?php
// source: C:\wamp\www\private\w-e-b-s\2014\Soccer\app\FrontModule/templates/Competition/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1085910379', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe0a600a0a1_content')) { function _lbe0a600a0a1_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Soccer Tournament</h1>

                <h2>test Multiplieru</h2>

<?php $iterations = 0; foreach ($data as $number) { ?>
                    <?php echo Latte\Runtime\Filters::escapeHtml($number, ENT_NOQUOTES) ?> <br>
<?php $_l->tmp = $_control->getComponent("testForm-$number"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;$iterations++; } ?>


                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("test", array('backlink' => $backlink)), ENT_COMPAT) ?>
">Test backlinku</a>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">


                <!-- Blog Categories Well -->
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 