<?php

namespace Ada\Core;

class Router extends Proto
{
    protected
        $args       = [],
        $controller = '',
        $input      = null,
        $option     = '',
        $return     = '',
        $task       = '';

    public static function init(Input $input = null)
    {
        return new static($input);
    }

    public function __construct(Input $input = null)
    {
        /*$this->input      = $input ?: JFactory::getApplication()->input;
        $this->option     = $this->detectOption();
        $this->controller = $this->detectController();
        $this->task       = $this->detectTask($this->getController());
        $this->args       = $this->detectArgs($this->getController(), $this->getTask());
        $this->return     = $this->detectReturn();*/
    }

    public function getArgs()
    {
        return $this->args;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getInput(): Input
    {
        return $this->input;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function getReturn()
    {
        return $this->return;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    protected function detectArgs($controller, $task)
    {
        $res   = [];
        $input = $this->getInput();
        foreach (AkModelTask::init()->getArgs($controller, $task) as $arg) {
            if (
                $arg->name == 'data'  &&
                $arg->type == 'array' &&
                preg_match('/^save/', $task)
            ) {
                $closure = function (array $el) use (&$closure) {
                    foreach ($el as $k => $v) {
                        $el[$k] = is_string($v) ? trim($v) : $closure($v);
                    }
                    return $el;
                };
                $res[$arg->name] = $closure($input->getArray($_POST));
                continue;
            }
            if ($input->get($arg->name) === null && $arg->required) {
                continue;
            }
            switch ($arg->type) {
                case 'array':
                    $res[$arg->name] = $input->get($arg->name, $arg->default, 'array');
                    break;
                default:
                    $res[$arg->name] = trim($input->getString($arg->name, $arg->default));
            }
        }
        return $res;
    }

    protected function detectController()
    {
        return
            strtolower(trim($this->getInput()->getCmd('controller')))
                ?: strtolower(trim($this->getInput()->getCmd('view')))
                    ?: AkModelController::init()->getDefaultAlias();
    }

    protected function detectOption()
    {
        return
            strtolower(trim($this->getInput()->getCmd('option')))
                ?: AkConfig::get('alias');
    }

    protected function detectReturn()
    {
        $res = strtolower(trim($this->getInput()->getCmd('return')));
        return
            in_array($res, AkConfig::get('reply[returns]'))
                ? $res
                : AkConfig::get('reply[default_return]');
    }

    protected function detectTask($controller)
    {
        return
            strtolower(trim($this->getInput()->getCmd('task')))
                ?: AkModelTask::init()->getDefaultAlias($controller);
    }
}
