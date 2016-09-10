<?php
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2989403859', 'html')
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
<table class="table table-bordered table-condensed"> 
	<tr>
		<th>#</th>
		<th></th>
		<th class="text-center">PZ</th>
		<th class="text-center">V</th>
		<th class="text-center">R</th>
		<th class="text-center">P</th>
		<th class="text-center">Sk.</th>
		<th class="text-center">B.</th>
	</tr>
<?php $rank = 0 ;$iterations = 0; foreach ($rows as $row) { ?>

	<tr <?php if ($rank < 2) { ?>class="warning"<?php } ?>>
		<td><?php $rank++ ?> <?php echo Latte\Runtime\Filters::escapeHtml($rank, ENT_NOQUOTES) ?>.</td>
		<td><img src="/assets/gfx/flags/16/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($row['logo']), ENT_COMPAT) ?>
" alt=""> <?php echo Latte\Runtime\Filters::escapeHtml($row['name'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><?php echo Latte\Runtime\Filters::escapeHtml($row['pz'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><?php echo Latte\Runtime\Filters::escapeHtml($row['w'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><?php echo Latte\Runtime\Filters::escapeHtml($row['d'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><?php echo Latte\Runtime\Filters::escapeHtml($row['l'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><?php echo Latte\Runtime\Filters::escapeHtml($row['gf'], ENT_NOQUOTES) ?>
:<?php echo Latte\Runtime\Filters::escapeHtml($row['ga'], ENT_NOQUOTES) ?></td>
		<td class="text-center"><strong><?php echo Latte\Runtime\Filters::escapeHtml($row['pts'], ENT_NOQUOTES) ?></strong></td>
	</tr>
<?php $iterations++; } ?>
</table>