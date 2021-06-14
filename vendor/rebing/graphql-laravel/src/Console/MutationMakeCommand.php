<?php

declare(strict_types=1);

namespace Rebing\GraphQL\Console;

use Illuminate\Console\GeneratorCommand;

class MutationMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:graphql:mutation {name}';
    protected $description = 'Create a new GraphQL mutation class';
    protected $type = 'Mutation';

    protected function getStub()
    {
        return __DIR__.'/stubs/mutation.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\GraphQL\Mutations';
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        return $this->replaceGraphqlName($stub);
    }

    protected function replaceGraphqlName(string $stub): string
    {
        $graphqlName = lcfirst($this->getNameInput());
        $graphqlName = preg_replace('/Mutation$/', '', $graphqlName);

        return str_replace(
            'DummyGraphqlName',
            $graphqlName,
            $stub
        );
    }
}
