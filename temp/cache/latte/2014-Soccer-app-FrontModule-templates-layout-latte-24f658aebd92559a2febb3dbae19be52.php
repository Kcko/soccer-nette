<?php
// source: C:\wamp64\www\private\w-e-b-s\2014\Soccer\app\FrontModule/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5954089774', 'html')
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

<?php ob_start(); $_b->templates['5954089774']->renderChildTemplate('fragments/header.latte', get_defined_vars()); echo rtrim(ob_get_clean()) ?>


<?php Latte\Macros\BlockMacros::callBlock($_b, 'content', $template->getParameters()) ?>

<?php ob_start(); $_b->templates['5954089774']->renderChildTemplate('fragments/footer.latte', get_defined_vars()); echo rtrim(ob_get_clean()) ?>


