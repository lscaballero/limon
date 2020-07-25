<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__1082986803de318efdddfbd8084b1b196cda6ad83b75f992858883ee56dd3b39 */
class __TwigTemplate_03870f53e62b59410e44b92370f3d73345c5fae25bb030d3daa172d9f30fdb42 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"container home-content\">
    <header class=\"block-title\">
      <h3 class=\"title principal-title color-white bold\">Mike’s Hard Lemonade</h3>
      <h4 class=\"title principal-title color-white regular\">llegó para quedarse</h4>
      <h5 class=\"title small-title color-yellow bold\">y hacer tus previos más divertidos.</h5>
    </header>

    <div class=\"block-text\">
      <p class=\"color-white light\">Hecha con jugo de limón real y con un toque de vodka, es la bebida refrescante de sabor intenso que pasa fácil y que te sorprenderá porque es deliciosamente diferente. </p>
      <p class=\"color-white bold\">Así que ya sabes, cuando te juntes con tus amigos, lleva limonada… <span class=\"color-yellow bold\">lleva MIKE’S.</span></p>
    </div>


    <div class=\"block-warning\">
      <p><span>Tomar Bebidas Alcohólicas en exceso es dañino</span></p>
    </div>
  </div>";
    }

    public function getTemplateName()
    {
        return "__string_template__1082986803de318efdddfbd8084b1b196cda6ad83b75f992858883ee56dd3b39";
    }

    public function getDebugInfo()
    {
        return array (  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__1082986803de318efdddfbd8084b1b196cda6ad83b75f992858883ee56dd3b39", "");
    }
}
