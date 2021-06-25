<?php

/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\SimpleModule
 * @date        2021
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

declare(strict_types=1);

namespace DevVsAdmin\SimpleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class SimpleCli
 */
class SimpleCli extends Command
{
    /**
     * @const string
     */
    private const YES = 'y';

    /**
     * @const string
     */
    private const NO = 'n';

    /**
     * @const string INPUT_PARAM_NAME
     */
    private const INPUT_PARAM_NAME = 'param';

    /**
     * @const string INPUT_DISPLAY_NAME
     */
    private const INPUT_DISPLAY_NAME = 'display';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $options = [
            new InputOption(
                self::INPUT_PARAM_NAME,
                'p',
                InputOption::VALUE_REQUIRED,
                'Param'
            ),
            new InputOption(
                self::INPUT_DISPLAY_NAME,
                'd',
                InputOption::VALUE_REQUIRED,
                'Display?'
            )
        ];
        $this->setName('simple:test-cli')
            ->setDescription('My First Command')
            ->setDefinition($options);

        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $param = $input->getOption('param');
        if (!$param) {
            $output->writeln('<error>You have to set param value ! [--param=value]</error>');
            die();
        }

        if ($this->getAnswer($input, $output) == self::YES) {
            $output->writeln(sprintf('<info>You have set value: %s</info>', $param));
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool|string|string[]|null
     */
    private function getAnswer(InputInterface $input, OutputInterface $output)
    {
        $answer = $input->getOption(self::INPUT_DISPLAY_NAME);

        if (!in_array($answer, [self::YES, self::NO])) {
            $question = new Question('<question>Display param?:[n/y]</question> ', '');

            /** @var QuestionHelper $questionHelper */
            $questionHelper = $this->getHelper('question');

            $input->setOption(
                self::INPUT_DISPLAY_NAME,
                $questionHelper->ask($input, $output, $question)
            );

            return $this->getAnswer($input, $output);
        }

        return $answer;
    }
}

