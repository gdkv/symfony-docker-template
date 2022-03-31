<?php

namespace App\Command;

use App\Entity\User\Admin;
use App\Repository\AdminRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[AsCommand(
    name: 'app:admin-create',
    description: 'Add a short description for your command',
)]
class AdminCreateCommand extends Command
{
    public function __construct(
        private AdminRepository $adminRepository,
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
    )
    {
        $this->adminRepository = $adminRepository;
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create user')
            ->addArgument('name', InputArgument::REQUIRED, 'Name')
            ->addArgument('password', InputArgument::REQUIRED, 'Password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');
        $password = $input->getArgument('password');

        $output->writeln([
            '',
            'Admin Creator',
            '============================',
            '',
            '🧑  Name: '. $name,
            '🔑  Password: '. $password,
            '',
        ]);

        $user = new Admin();
        $user->setUsername($name);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        $user->setRoles(["ROLE_ADMIN",]);

        $this->adminRepository->add($user);

        $io->success('Admin was created!');

        return Command::SUCCESS;
    }
}
