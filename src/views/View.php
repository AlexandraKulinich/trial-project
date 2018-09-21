<?php

class View
{
    public $template = 'layout';
    public $params = [];
    public $content;

    public function __construct()
    {

    }

    public function init()
    {
        return [];
    }

    /**
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function render(string $view, array $params = []): string
    {
        ob_start();
        extract($params, EXTR_OVERWRITE);
        include $view;

        return ob_get_clean();
    }

    public function getTemplatePath()
    {
        return '../src/templates/' . $this->template . '.php';
    }

    public function run()
    {
        $content = $this->render($this->getTemplatePath(), $this->init());
        echo $this->render($this->getBaseTemplatePath(), ['content' => $content]);
    }

    public function getBaseTemplatePath()
    {
        return '../src/templates/layout.php';
    }
}
