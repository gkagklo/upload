<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* extension/module/entitycrud_form.twig */
class __TwigTemplate_507452d208675a8b6f851a3eb0a8eb8b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"pull-right\">
                <button type=\"submit\" form=\"form-category\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\">
                    <i class=\"fa fa-save\"></i>
                </button>
                <a href=\"";
        // line 9
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\">
                    <i class=\"fa fa-reply\"></i>
                </a>
            </div>
            <h1>";
        // line 13
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 16
            echo "                    <li>
                        <a href=\"";
            // line 17
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 17);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 17);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "            </ul>
        </div>
    </div>

    <div class=\"container-fluid\">
        ";
        // line 25
        if (($context["error_warning"] ?? null)) {
            // line 26
            echo "            <div class=\"alert alert-danger alert-dismissible\">
                <i class=\"fa fa-exclamation-circle\"></i>
                ";
            // line 28
            echo ($context["error_warning"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            </div>
        ";
        }
        // line 32
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">
                    <i class=\"fa fa-pencil\"></i>
                    ";
        // line 36
        echo ($context["text_form"] ?? null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 39
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" id=\"form-category\" class=\"form-horizontal\">
             
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 42
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"name\" value=\"";
        // line 44
        echo twig_get_attribute($this->env, $this->source, ($context["entity"] ?? null), "name", [], "any", false, false, false, 44);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                        ";
        // line 45
        if (($context["error_name"] ?? null)) {
            // line 46
            echo "                        <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 48
        echo "                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-description\">";
        // line 52
        echo ($context["entry_description"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <textarea name=\"description\" placeholder=\"";
        // line 54
        echo ($context["entry_description"] ?? null);
        echo "\" id=\"input-description\"  class=\"form-control\">";
        echo twig_get_attribute($this->env, $this->source, ($context["entity"] ?? null), "description", [], "any", false, false, false, 54);
        echo "</textarea>
                    </div>
                </div>            
                
                </form>
            </div>
        </div>
    </div>
    
</div>
";
        // line 64
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/entitycrud_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 64,  152 => 54,  147 => 52,  141 => 48,  135 => 46,  133 => 45,  127 => 44,  122 => 42,  116 => 39,  110 => 36,  104 => 32,  97 => 28,  93 => 26,  91 => 25,  84 => 20,  73 => 17,  70 => 16,  66 => 15,  61 => 13,  52 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/entitycrud_form.twig", "");
    }
}
