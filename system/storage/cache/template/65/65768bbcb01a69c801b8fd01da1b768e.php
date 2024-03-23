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

/* extension/module/entitycrud_list.twig */
class __TwigTemplate_55cbacda551897d76c9034d2282336ba extends Template
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
                <a href=\"";
        // line 6
        echo ($context["add"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_add"] ?? null);
        echo "\" class=\"btn btn-primary\">
                    <i class=\"fa fa-plus\"></i>
                </a>
                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
        // line 9
        echo ($context["button_delete"] ?? null);
        echo "\" class=\"btn btn-danger\" onclick=\"confirm('";
        echo ($context["text_confirm"] ?? null);
        echo "') ? \$('#form-entity').submit() : false;\">
                    <i class=\"fa fa-trash-o\"></i>
                </button>
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
        // line 24
        if (($context["error_warning"] ?? null)) {
            // line 25
            echo "            <div class=\"alert alert-danger alert-dismissible\">
                <i class=\"fa fa-exclamation-circle\"></i>
                ";
            // line 27
            echo ($context["error_warning"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            </div>
        ";
        }
        // line 31
        echo "        ";
        if (($context["success"] ?? null)) {
            // line 32
            echo "            <div class=\"alert alert-success alert-dismissible\">
                <i class=\"fa fa-check-circle\"></i>
                ";
            // line 34
            echo ($context["success"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            </div>
        ";
        }
        // line 38
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">
                    <i class=\"fa fa-list\"></i>
                    ";
        // line 42
        echo ($context["text_list"] ?? null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 45
        echo ($context["delete"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-entity\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-hover\">
                            <thead>
                                <tr>
                                    <td style=\"width: 1px;\" class=\"text-center\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', this.checked);\"/></td>
                                    <td class=\"text-left\">
                                        ";
        // line 52
        if (($context["sort"] ?? null)) {
            // line 53
            echo "                                            <a href=\"";
            echo ($context["sort_name"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_name"] ?? null);
            echo "</a>
                                        ";
        } else {
            // line 55
            echo "                                            <a href=\"";
            echo ($context["sort_name"] ?? null);
            echo "\">";
            echo ($context["column_name"] ?? null);
            echo "</a>
                                        ";
        }
        // line 57
        echo "                                    </td>
                                    <td>";
        // line 58
        echo ($context["column_description"] ?? null);
        echo "</td>                              
                                    <td class=\"text-right\">";
        // line 59
        echo ($context["column_action"] ?? null);
        echo "</td>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 63
        if (($context["entities"] ?? null)) {
            // line 64
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["entities"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 65
                echo "                                        <tr>
                                            <td class=\"text-center\">
                                                ";
                // line 67
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["entity"], "entity_id", [], "any", false, false, false, 67), ($context["selected"] ?? null))) {
                    // line 68
                    echo "                                                    <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["entity"], "entity_id", [], "any", false, false, false, 68);
                    echo "\" checked=\"checked\"/>
                                                ";
                } else {
                    // line 70
                    echo "                                                    <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["entity"], "entity_id", [], "any", false, false, false, 70);
                    echo "\"/>
                                                ";
                }
                // line 72
                echo "                                            </td>
                                            <td class=\"text-left\">";
                // line 73
                echo twig_get_attribute($this->env, $this->source, $context["entity"], "name", [], "any", false, false, false, 73);
                echo "</td>
                                            <td class=\"text-left\">";
                // line 74
                echo twig_get_attribute($this->env, $this->source, $context["entity"], "description", [], "any", false, false, false, 74);
                echo "</td>
                                            <td class=\"text-right\">
                                                <a href=\"";
                // line 76
                echo twig_get_attribute($this->env, $this->source, $context["entity"], "edit", [], "any", false, false, false, 76);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\">
                                                    <i class=\"fa fa-pencil\"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "                                ";
        } else {
            // line 83
            echo "                                    <tr>
                                        <td class=\"text-center\" colspan=\"4\">";
            // line 84
            echo ($context["text_no_results"] ?? null);
            echo "</td>
                                    </tr>
                                ";
        }
        // line 87
        echo "                            </tbody>
                        </table>
                    </div>
                </form>
                <div class=\"row\">
                    <div class=\"col-sm-6 text-left\">";
        // line 92
        echo ($context["pagination"] ?? null);
        echo "</div>
                    <div class=\"col-sm-6 text-right\">";
        // line 93
        echo ($context["results"] ?? null);
        echo "</div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        // line 99
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/entitycrud_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 99,  249 => 93,  245 => 92,  238 => 87,  232 => 84,  229 => 83,  226 => 82,  212 => 76,  207 => 74,  203 => 73,  200 => 72,  194 => 70,  188 => 68,  186 => 67,  182 => 65,  177 => 64,  175 => 63,  168 => 59,  164 => 58,  161 => 57,  153 => 55,  143 => 53,  141 => 52,  131 => 45,  125 => 42,  119 => 38,  112 => 34,  108 => 32,  105 => 31,  98 => 27,  94 => 25,  92 => 24,  86 => 20,  75 => 17,  72 => 16,  68 => 15,  63 => 13,  54 => 9,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/entitycrud_list.twig", "");
    }
}
