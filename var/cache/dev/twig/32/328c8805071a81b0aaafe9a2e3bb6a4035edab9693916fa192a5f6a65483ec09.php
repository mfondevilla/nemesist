<?php

/* components/nav.html.twig */
class __TwigTemplate_31fce1578c85a9f6e3d0e964c21f3a64efea7d69f7cae758e74e747475c9d706 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'nav' => [$this, 'block_nav'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "components/nav.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "components/nav.html.twig"));

        // line 1
        $this->displayBlock('nav', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_nav($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "nav"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "nav"));

        // line 2
        echo "<nav role=\"navigation\" class=\"container navbar navbar-default navbar-inverse\">
    <div class=\"navbar-header\">
        <button type=\"button\" data-target=\"#navbarCollapse\" data-toggle=\"collapse\" class=\"navbar-toggle\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
        <a href=\"#\" class=\"visible-xs-inline hide navbar-brand\">FALCOM</a>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-user\"></div>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-search\"></div>
    </div>
    <section id=\"navbarCollapse\" class=\"collapse navbar-collapse\">
        <ul class=\"font nav navbar-nav col-sm-12\">
           
                <li class=\"col-sm-3 active\"><a class=\"centrado\" >Inicio</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Catálogo</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Localización</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Cesta</a></li>
          
          
                
        </ul>
    </section>
</nav>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "components/nav.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  48 => 2,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block nav %}
<nav role=\"navigation\" class=\"container navbar navbar-default navbar-inverse\">
    <div class=\"navbar-header\">
        <button type=\"button\" data-target=\"#navbarCollapse\" data-toggle=\"collapse\" class=\"navbar-toggle\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
        <a href=\"#\" class=\"visible-xs-inline hide navbar-brand\">FALCOM</a>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-user\"></div>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-search\"></div>
    </div>
    <section id=\"navbarCollapse\" class=\"collapse navbar-collapse\">
        <ul class=\"font nav navbar-nav col-sm-12\">
           
                <li class=\"col-sm-3 active\"><a class=\"centrado\" >Inicio</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Catálogo</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Localización</a></li>
                <li class=\"col-sm-3 active\"><a class=\"centrado\" href=\"#\">Cesta</a></li>
          
          
                
        </ul>
    </section>
</nav>
{% endblock %}", "components/nav.html.twig", "C:\\xampp\\htdocs\\pruebaSymfony\\templates\\components\\nav.html.twig");
    }
}
