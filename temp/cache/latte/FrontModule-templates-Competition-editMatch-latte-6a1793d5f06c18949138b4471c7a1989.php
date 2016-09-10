<?php
// source: C:\wamp\www\private\w-e-b-s\2014\Soccer\app\FrontModule/templates/Competition/editMatch.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9417476244', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lba88e480757_content')) { function _lba88e480757_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$homeTeam = $match->ref('team', 'team_home_id') ;$awayTeam = $match->ref('team', 'team_away_id') ?>
	
	<h1>
		<?php echo Latte\Runtime\Filters::escapeHtml($homeTeam->name, ENT_NOQUOTES) ?>
 - <?php echo Latte\Runtime\Filters::escapeHtml($awayTeam->name, ENT_NOQUOTES) ?>

		<small>editace zápasu, #<?php echo Latte\Runtime\Filters::escapeHtml($match->id, ENT_NOQUOTES) ?></small>
	</h1>

<?php $_l->tmp = $_control->getComponent("editForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 