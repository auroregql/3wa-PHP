<?php
// controllers/UserController.php

class UserController extends AbstractController {
    public function list(): void {
        $this->render('users/list', [
            'title' => 'Liste des utilisateurs'
        ]);
    }

    public function show(): void {
        $this->render('users/show', [
            'title' => 'Détails de l\'utilisateur'
        ]);
    }

    public function create(): void {
        $this->render('users/create', [
            'title' => 'Créer un utilisateur'
        ]);
    }

    public function checkCreate(): void {
        // Logique de vérification ici...
        $this->redirect('list_users');
    }

    public function update(): void {
        $this->render('users/update', [
            'title' => 'Modifier un utilisateur'
        ]);
    }

    public function checkUpdate(): void {
        // Logique de vérification ici...
        $this->redirect('list_users');
    }

    public function delete(): void {
        // Logique de suppression ici...
        $this->redirect('list_users');
    }
}