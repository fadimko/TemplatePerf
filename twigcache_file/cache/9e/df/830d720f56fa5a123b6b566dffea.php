<?php

/* test1_singlediv.html */
class __TwigTemplate_9edf830d720f56fa5a123b6b566dffea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["body"]) ? $context["body"] : null), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "test1_singlediv.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
