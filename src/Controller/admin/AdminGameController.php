<?php

namespace App\Controller\admin;

use App\Entity\Game;
use App\Form\NewGameType;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminGameController extends AbstractController
{

    #[Route('/admin/game/list', name: 'app_admin_game_list')]
    public function index(GameRepository $gameRepository, PaginatorInterface $paginator, Request $request): Response
    {
//        $games = $gameRepository->findAll();

        $games = $paginator->paginate(
            $gameRepository->getAll(), /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            10 /* limit per page */
        );

        return $this->render('admin_game/index.html.twig', [
            'games' => $games
        ]);
    }

    #[Route('/admin/game/view/{id}', name: 'app_admin_game_view')]
    public function viewGame($id, GameRepository $gameRepository): Response
    {

        $game = $gameRepository->find($id);

        return $this->render('admin_game/view_admin.html.twig', [
            'controller_name' => 'AdminGameController',
            'game' => $game
        ]);
    }


    #[Route('/admin/game/add', name: 'app_admin_game_add')]
    public function addGame(Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = new Game();
        $newGameForm = $this->createForm(NewGameType::class, $game);

        $newGameForm->handleRequest($request);
        if($newGameForm->isSubmitted()&& $newGameForm->isValid()) {
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_game_list');
        }

        return $this->render('admin_game/add_admin.html.twig', [
            'newGameForm' => $newGameForm
        ]);
    }

    #[Route('/admin/game/edit/{id}', name: 'app_admin_game_edit')]
    public function editGame($id, GameRepository $gameRepository, Request $request, EntityManagerInterface $entityManager): Response
    {

        $game = $gameRepository->find($id);
        $newGameForm = $this->createForm(NewGameType::class, $game);
        $newGameForm->handleRequest($request);

        if($newGameForm->isSubmitted()&& $newGameForm->isValid()) {
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_game_list');
        }



        return $this->render('admin_game/edit_admin.html.twig', [
            'newGameForm' => $newGameForm
        ]);
    }

    #[Route('/admin/game/delete/{id}', name: 'app_admin_game_delete')]
    public function deleteGame($id, GameRepository $gameRepository, EntityManagerInterface $entityManager): Response
    {

        $game = $gameRepository->find($id);
        $entityManager->remove($game);
        $entityManager->flush();

      return $this ->redirectToRoute('app_admin_game_list');
    }

}

