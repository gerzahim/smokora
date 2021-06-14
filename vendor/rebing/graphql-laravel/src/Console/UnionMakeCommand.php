<?php

declare(strict_types=1);

namespace Rebing\GraphQL\Console;

use Illuminate\Console\GeneratorCommand;

class UnionMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:graphql:union {name}';
    protected $description = 'Create a new GraphQL union class';
    protected $type = 'Union';

    protected function getStub()
    {
        return __DIR__.'/stubs/union.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\GraphQL\Unions';
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        return $this->replaceGraphqlName($stub);
    }

    protected function replaceGraphqlName(string $stub): string
    {
        $graphqlName = $this->getNameInput();
        $graphqlName = preg_replace('/Type$/', '', $graphqlName);

        return str_replace(
            'DummyGraphqlName',
            $graphqlName,
            $stub
        );
    }
}
