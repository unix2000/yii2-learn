<?php

/* index.twig */
class __TwigTemplate_e179e8f9f17e191e69ca3306cdb49e894ee0c9540f7fc918cf0c8b46fefff26c extends yii\twig\Template
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
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "
";
        // line 2
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, 200.35), "html", null, true);
        echo "
";
        // line 3
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, 9800.333, 2, ".", ","), "html", null, true);
        echo "
<ul>
";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 6
            echo "    <li>* ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["i"], "name", array()));
            echo "</li>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 8
            echo "    没有记录.
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 10,  45 => 8,  37 => 6,  32 => 5,  27 => 3,  23 => 2,  19 => 1,);
    }
}
/* {{ email }}*/
/* {{ 200.35|number_format }}*/
/* {{ 9800.333|number_format(2, '.', ',') }}*/
/* <ul>*/
/* {% for i in data %}*/
/*     <li>* {{ i.name | e }}</li>*/
/* {% else %}*/
/*     没有记录.*/
/* {% endfor %}*/
/* </ul>*/
