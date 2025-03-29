<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">

# Task Management App

&#x20;&#x20;

## 📌 Description

Task Management App est une application de gestion de tâches développée avec Laravel et TailwindCSS. Elle permet aux utilisateurs de :

- 📋 **Créer et gérer des tâches** : Ajouter, modifier, supprimer et marquer les tâches comme terminées.
- 📂 **Organiser des projets** : Gérer des projets avec une structure claire et organiser les tâches par projet.
- 🗓️ **Planifier des rendez-vous** : Ajouter des événements et organiser les réunions importantes.
- 💬 **Messagerie instantanée** : Discuter avec les membres d’un projet grâce à un système de chat en temps réel.

## 🚀 Installation

### Prérequis

- PHP 8.3+
- Composer
- Node.js & npm
- MySQL

### Étapes d’installation

```bash
# Cloner le dépôt
git clone https://github.com/ton_github/task-management-app.git
cd task-management-app

# Installer les dépendances
composer install
npm install && npm run build

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données
php artisan migrate --seed

# Lancer le serveur de développement
php artisan serve
```

## 📖 Règles de Contribution

📌 Nous utilisons **Git Flow** pour gérer les versions et les fonctionnalités.

### 🛠️ Création d’une nouvelle fonctionnalité

1. Créer une nouvelle branche depuis `dev`
   ```bash
   git checkout dev
   git pull origin dev
   git checkout -b feature/nom_de_la_feature
   ```
2. Développer la fonctionnalité et commit régulièrement
   ```bash
   git commit -m "✨ Ajout de la fonctionnalité X"
   ```
3. Faire une pull request vers `dev`

### 🐛 Correctif de bug

1. Créer une branche depuis `dev`
   ```bash
   git checkout -b fix/nom_du_bug
   ```
2. Corriger le bug et tester
3. Commit et push sur GitHub
4. Ouvrir une pull request

### 🔥 Déploiement

- La branche `main` contient uniquement des versions stables.
- Les fonctionnalités sont développées sur `dev` avant d’être fusionnées dans `main`.

## 📜 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus d’informations.

## 📬 Contact

📧 Email: [kendythe.c@gmail.com](mailto\:kendythe.c@gmail.com)