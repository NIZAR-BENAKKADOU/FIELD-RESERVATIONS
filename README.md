<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/your-username/field-reservations/actions">
        <img src="https://github.com/your-username/field-reservations/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

# ⚡ *Field Reservations* - Web Application for Field Booking

*Une application web pour la gestion de la réservation de terrains pour des événements sportifs et autres.*  
Développé avec *Laravel* (Backend), *MongoDB* (Base de données), et *JavaScript* (Frontend).

---

## 🚀 *Fonctionnalités*

- *Gestion des utilisateurs* :  
  Enregistrement, connexion et gestion des profils des utilisateurs, y compris la distinction entre utilisateurs clients et administrateurs.

- *Réservation de terrains* :  
  Les utilisateurs peuvent consulter la disponibilité des terrains et réserver des créneaux horaires.

- *Suivi des réservations* :  
  Gestion des réservations effectuées, avec possibilité d'annuler ou de modifier une réservation existante.

- *MongoDB pour la gestion des données* :  
  Utilisation de **MongoDB** pour une gestion rapide et évolutive des données de réservation, utilisateurs et terrains.

- *Frontend interactif avec JavaScript* :  
  Interface utilisateur dynamique pour une expérience fluide de gestion des réservations.

---

## 📂 *Structure du Projet*

### 🛠 *Backend (Laravel)*  
Le backend est responsable de la gestion des utilisateurs, des réservations et des terrains.

#### Structure des répertoires :

backend/
├── app/                # Code source de l'application
│   ├── Http/           # Contrôleurs, middleware et requêtes
│   ├── Models/         # Modèles Eloquent pour interagir avec la base de données MongoDB
│   └── ...
├── config/             # Configuration des services (MongoDB, etc.)
├── database/           # Migrations et seeders pour MongoDB
├── routes/             # Définition des routes API
├── storage/            # Fichiers de stockage (logs, fichiers temporaires, etc.)
└── .env                # Variables d'environnement

### 🗄 *Base de données (MongoDB)*  
La base de données MongoDB est utilisée pour stocker les informations liées aux utilisateurs, terrains et réservations.

---

## 🖥 *Prérequis*

Avant de commencer, assurez-vous d'avoir installé :

- [PHP 8.1+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MongoDB](https://www.mongodb.com/)
- [Docker](https://www.docker.com/) (optionnel)

---

## ⚙ *Installation*

### 🛠 *Backend (Laravel)*

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/your-username/field-reservations.git
   cd field-reservations/backend
