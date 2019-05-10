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
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        <a href=\"#\" class=\"visible-xs-inline hide navbar-brand\"></a>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-user\"></div>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-search\"></div>
    </div>
    <section id=\"navbarCollapse\" class=\"collapse navbar-collapse\">
        <ul class=\"font nav navbar-nav col-sm-12\">
           
                <li class=\"col-sm-2 active\"><a class=\"centrado\" >Inicio</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Catálogo</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Localización</a></li>
                <li class=\"col-sm-2 active\"><a href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register_book");
        echo "\">Registrar Libro</a></li>
                <li class=\"col-sm-2 active\"><a href=\"";
        // line 26
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("buscar_catalogue");
        echo "\">Buscar Libro</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Cesta</a></li>
                <li class=\"col-sm-2 active\"><a href=\"";
        // line 28
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("item_maintenance");
        echo "\">Mantenimiento Items</a></li>
                <li class=\"col-sm-2 active\"><a href=\"";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("issue_maintenance");
        echo "\">Mantenimiento Revistas
                    </a></li>
                
                ";
        // line 32
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 32, $this->source); })()), "user", [])) {
            // line 33
            echo "                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
            echo "\">Cerrar Sesión</a></li>
                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile");
            echo "\">Editar perfil</a></li>
                ";
        } else {
            // line 36
            echo "                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
            echo "\">Login</a></li>
                ";
        }
        // line 38
        echo "        </ul>
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
        return array (  110 => 38,  104 => 36,  99 => 34,  94 => 33,  92 => 32,  86 => 29,  82 => 28,  77 => 26,  73 => 25,  48 => 2,  30 => 1,);
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
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        <a href=\"#\" class=\"visible-xs-inline hide navbar-brand\"></a>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-user\"></div>
        <div class=\"hide visible-xs-inline col-xs-1 navbar-brand icon-s glyphicon glyphicon-search\"></div>
    </div>
    <section id=\"navbarCollapse\" class=\"collapse navbar-collapse\">
        <ul class=\"font nav navbar-nav col-sm-12\">
           
                <li class=\"col-sm-2 active\"><a class=\"centrado\" >Inicio</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Catálogo</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Localización</a></li>
                <li class=\"col-sm-2 active\"><a href=\"{{ path('register_book') }}\">Registrar Libro</a></li>
                <li class=\"col-sm-2 active\"><a href=\"{{ path('buscar_catalogue') }}\">Buscar Libro</a></li>
                <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"#\">Cesta</a></li>
                <li class=\"col-sm-2 active\"><a href=\"{{ path('item_maintenance') }}\">Mantenimiento Items</a></li>
                <li class=\"col-sm-2 active\"><a href=\"{{ path('issue_maintenance') }}\">Mantenimiento Revistas
                    </a></li>
                
                {% if app.user %}
                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"{{ path('logout') }}\">Cerrar Sesión</a></li>
                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"{{ path('profile') }}\">Editar perfil</a></li>
                {% else %}
                    <li class=\"col-sm-2 active\"><a class=\"centrado\" href=\"{{ path('login') }}\">Login</a></li>
                {% endif %}
        </ul>
    </section>
</nav>
{% endblock %}", "components/nav.html.twig", "C:\\xampp\\htdocs\\nemesist\\templates\\components\\nav.html.twig");
    }
}
