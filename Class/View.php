<?php
class View
{
    protected $data = [];
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function with($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->data);
        include $this->view;
    }
}
