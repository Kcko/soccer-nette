<?php
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6679828810', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>

    
<table class="table table-striped table-bordered table-condensed">      
<?php $iterations = 0; foreach ($matches as $match) { ?>

<?php $homeTeam = $match->ref('team', 'team_home_id') ;$awayTeam = $match->ref('team', 'team_away_id') ?>
    
<?php $score = '' ;if ($match->played) { ?>
    
<?php $score = $match->goal_home_90 . ':' . $match->goal_away_90 ;} ?>


    <tr id="match-<?php echo Latte\Runtime\Filters::escapeHtml($match->id, ENT_COMPAT) ?>">
        <td><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link("Competition:editMatch", array($match->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($match->id, ENT_NOQUOTES) ?></a></td>
        <td class="text-right" style="width: 32%; padding-right: 2%;"><?php echo Latte\Runtime\Filters::escapeHtml($homeTeam->name, ENT_NOQUOTES) ?>
 <img src="/assets/gfx/flags/16/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($homeTeam->logo), ENT_COMPAT) ?>" alt=""></td>
        <td class="text-center"><a href="" class="match-edit"><?php $_l->tmp = $_control->getComponent("matchResult"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->renderInline($match) ?></a></td>
        <td class="text-left" style="width: 32%; padding-left: 2%;"><img src="/assets/gfx/flags/16/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($awayTeam->logo), ENT_COMPAT) ?>
" alt=""> <?php echo Latte\Runtime\Filters::escapeHtml($awayTeam->name, ENT_NOQUOTES) ?></td>
        <td class="text-center text-muted"><?php echo Latte\Runtime\Filters::escapeHtml($homeTeam->strenght, ENT_NOQUOTES) ?>
 vs <?php echo Latte\Runtime\Filters::escapeHtml($awayTeam->strenght, ENT_NOQUOTES) ?></td>
    </tr>  
    <tr style="display: none;">
        <td colspan="5">
<?php $_l->tmp = $_control->getComponent("editFormResults-$match->id"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
        </td>

    </tr>   
<?php $iterations++; } ?>
</table>


