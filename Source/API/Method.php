<?php

namespace Liloi\Interstate\API;

use Judex\Assert;
use Liloi\API\Response;

abstract class Method
{
    abstract static public function execute(): Response;

    /**
     * Get parameter value by name.
     *
     * @param string $name Parameter name.
     * @return mixed Parameter value.
     */
    public static function getParameter(string $name)
    {
        $parameters = self::getParameters();

        Assert::true(isset($parameters[$name]), 'Parameter name is not found.', [
            'parameters' => $parameters,
            'name' => $name
        ]);

        return $parameters[$name];
    }

    /**
     * Get all list of API parameters.
     *
     * @return array List of API parameters.
     */
    public static function getParameters(): array
    {
        return $_POST['parameters'];
    }

    protected static function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }
}