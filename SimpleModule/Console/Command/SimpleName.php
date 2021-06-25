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
use Magento\Framework\App\State;
use Magento\Framework\App\Area;
use Magento\Framework\Event\ManagerInterface;

/**
 * Class SimpleCli
 */
class SimpleName extends Command
{
    /**
     * @const string INPUT_PARAM_FIRSTNAME
     */
    private const INPUT_PARAM_FIRSTNAME = 'firstname';

    /**
     * @const string INPUT_PARAM_LASTNAME
     */
    private const INPUT_PARAM_LASTNAME = 'lastname';

    /**
     * @var State
     */
    private $state;

    /**
     * @var ManagerInterface
     */
    private $eventManager;

    /**
     * SimpleName constructor.
     * @param string|null $state
     * @param string|null $name
     */
    public function __construct(State $state, ManagerInterface $eventManager, string $name = null)
    {
        parent::__construct($name);

        $this->eventManager = $eventManager;
        $this->state = $state;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $options = [
            new InputOption(
                self::INPUT_PARAM_FIRSTNAME,
                'f',
                InputOption::VALUE_REQUIRED,
                'Firstname'
            ),
            new InputOption(
                self::INPUT_PARAM_LASTNAME,
                'l',
                InputOption::VALUE_REQUIRED,
                'Lastname'
            )
        ];
        $this->setName('simple:test-name')
            ->setDescription('My Second Command')
            ->setDefinition($options);

        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->emulateAreaCode(AREA::AREA_ADMINHTML, [$this, 'displayData'], [$input, $output]);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool|string|string[]|null
     */
    private function getParam(InputInterface $input, OutputInterface $output, $param)
    {
        $value = $input->getOption($param);

        if (!$value) {
            $question = new Question(sprintf('<question>Put your %s:</question> ', $param), '');

            /** @var QuestionHelper $questionHelper */
            $questionHelper = $this->getHelper('question');

            $input->setOption(
                $param,
                $questionHelper->ask($input, $output, $question)
            );

            return $this->getParam($input, $output, $param);
        }

        return $value;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function displayData(InputInterface $input, OutputInterface $output): void
    {
        $firstname = $this->getParam($input, $output, self::INPUT_PARAM_FIRSTNAME);
        $lastname = $this->getParam($input, $output, self::INPUT_PARAM_LASTNAME);
        $output->writeln(sprintf('<info>Your firstname is: %s</info>', $firstname));
        $output->writeln(sprintf('<info>Your lasttname is: %s</info>', $lastname));

        $this->eventManager->dispatch('simple_name_cli', ['firstname' => $firstname, 'lastname' => $lastname]);
    }
}
