## **1. Zones principales du blog**

| Zone / Page            | URL                         | Type d’accès souhaité              |
| ---------------------- | --------------------------- | ---------------------------------- |
| Accueil du blog        | /                           | Public                             |
| Liste des articles     | /articles                   | Public                             |
| Page d’un article      | /articles/{slug}            | Public                             |
| Dashboard admin        | /admin                      | Réservé aux utilisateurs connectés |
| Création d’article     | /admin/articles/create      | Réservé à certains rôles           |
| Modification d’article | /admin/articles/{id}/edit   | Réservé à certains rôles           |
| Suppression d’article  | /admin/articles/{id}/delete | Réservé à certains rôles           |

👉 **Résumé :** Les pages publiques restent ouvertes. L’espace admin et les actions sur les articles doivent être protégés.

---

## **2. Rôles du blog**

| Rôle         | Description                                                                      |
| ------------ | -------------------------------------------------------------------------------- |
| **Visiteur** | Personne non connectée. Peut seulement consulter les pages publiques.            |
| **Auteur**   | Utilisateur connecté pouvant créer et gérer **ses propres** articles.            |
| **Admin**    | Utilisateur connecté avec accès complet à l’admin. Peut gérer tous les articles. |

---

## **3. Qui a le droit de faire quoi ?**

| Action / Rôle                        | Visiteur | Auteur | Admin                                |
| ------------------------------------ | -------- | ------ | ------------------------------------ |
| Lire les articles publics            | ✔️       | ✔️     | ✔️                                   |
| Accéder à /admin                     | ❌        | ✔️     | ✔️                                   |
| Créer un article                     | ❌        | ✔️     | ❌ *(selon consigne du fil rouge V6)* |
| Modifier **ses propres** articles    | ❌        | ✔️     | ✔️                                   |
| Supprimer **ses propres** articles   | ❌        | ✔️     | ✔️                                   |
| Supprimer **n’importe quel article** | ❌        | ❌      | ✔️                                   |

👉 Ce tableau représente les **règles métier** qui seront implémentées dans V6.

---

## **4. Lien entre les règles et Laravel**

Voici comment Laravel gèrera ces règles dans les prochains tutoriels :

* **Savoir qui est connecté** → Authentification Laravel UI (`Auth::user()`).
* **Bloquer les pages admin aux non connectés** → Middleware `auth`.
* **Distinguer Auteur / Admin** → Champ `is_admin` dans la base + `Auth::user()->is_admin`.
* **Limiter certaines actions (modifier, supprimer...)** → Gates et Policies.
* **Autorisation fine (par article)** → Policy `ArticlePolicy`.

👉 Ce document va servir directement pour les tutoriels 3.2.2 à 3.2.8.

---

