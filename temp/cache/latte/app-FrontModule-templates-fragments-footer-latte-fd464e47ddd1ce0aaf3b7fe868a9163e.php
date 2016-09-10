<?php
// source: C:\wamp\www\private\w-e-b-s\2014\Soccer\app\FrontModule/templates/fragments/footer.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3133370822', 'html')
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
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://rjwebdesign.cz"><span class="glyphicon glyphicon glyphicon glyphicon-heart" aria-hidden="true"></span> RJwebdesign</a>, Created with love ;)</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>



    </div>

    </body>
</html>

