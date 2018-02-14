<?php

/* index.html */
class __TwigTemplate_057553dfbbb85d2d359d435e7af5d1b029b3d6f26161abbd0c16b9f38dc5a2d6 extends Twig_Template
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
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>twig</title>
</head>
<body>
    <h1>Hi ";
        // line 9
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "!</h1>
    <h2>You are ";
        // line 10
        echo twig_escape_filter($this->env, ($context["age"] ?? null), "html", null, true);
        echo " years old</h2>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 10,  29 => 9,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "/Users/emichalsen/SectorSearch/templates/index.html");
    }
}
