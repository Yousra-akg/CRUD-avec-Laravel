# Zones principales du blog

| Zone / Page | URL (exemple) | Type d’accès souhaité |
|------------|----------------|------------------------|
| Accueil du blog | / | Public (tout le monde) |
| Liste des articles | /articles | Public (tout le monde) |
| Page d’un article | /articles/{slug} | Public (tout le monde) |
| Dashboard d’administration | /admin | Réservé aux utilisateurs connectés |
| Création d’article | /admin/articles/create | Réservé à certains rôles |
| Suppression d’article | /admin/articles/{id}/delete | Réservé à certains rôles |


# Rôles du blog

| Rôle | Description courte |
|------|---------------------|
| Visiteur | Personne non connectée qui peut lire les articles publics. |
| Auteur | Utilisateur connecté qui peut écrire des articles. |
| Admin | Utilisateur connecté qui gère le blog (articles, utilisateurs, etc.). |


# Qui a le droit de faire quoi ?

| Action / Rôle | Visiteur | Auteur | Admin |
|----------------|----------|--------|--------|
| Lire les articles publics | ✔️ | ✔️ | ✔️ |
| Accéder à /admin | ❌ | ✔️ | ✔️ |
| Créer un article | ❌ | ✔️ | ❌ |
| Modifier ses propres articles | ❌ | ✔️ | ✔️ |
| Supprimer ses propres articles | ❌ | ✔️ | ✔️ |
| Supprimer n’importe quel article | ❌ | ❌ | ✔️ |


# Comment Laravel va gérer ça ?

- La connexion / déconnexion sera gérée par l’authentification Laravel (Laravel UI).
- Le fait de bloquer l’accès à `/admin` pour les non connectés sera géré par le middleware `auth`.
- Le fait de limiter la suppression d’un article à certains rôles sera géré par des Gates ou une Policy.
