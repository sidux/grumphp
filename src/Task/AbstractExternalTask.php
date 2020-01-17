<?php

declare(strict_types=1);

namespace GrumPHP\Task;

use GrumPHP\Configuration\GrumPHP;
use GrumPHP\Formatter\ProcessFormatterInterface;
use GrumPHP\Process\ProcessBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractExternalTask implements TaskInterface
{
    protected $grumPHP;
    protected $processBuilder;
    protected $formatter;
    protected $resolver;

    public function __construct(GrumPHP $grumPHP, ProcessBuilder $processBuilder, ProcessFormatterInterface $formatter)
    {
        $this->grumPHP = $grumPHP;
        $this->processBuilder = $processBuilder;
        $this->formatter = $formatter;
        $this->resolver = new OptionsResolver();
        $this->createDefaultConfigurableOptions();
    }

    public function getConfiguration(): array
    {
        $configured = $this->grumPHP->getTaskConfiguration($this->getName());

        return $this->getConfigurableOptions()->resolve($configured);
    }

    private function createDefaultConfigurableOptions()
    {
        $this->resolver->setDefault('filter_created_only', false);
        $this->resolver->addAllowedTypes('filter_created_only', ['null', 'bool']);
    }
}
