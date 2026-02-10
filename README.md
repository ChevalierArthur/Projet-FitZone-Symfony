
## 🗄️ Modèle de données

### Entités principales

1. **User** : Membres/administrateurs
   - email, password, roles, createdAt, etc.

2. **Prestation** : Services proposés
   - titre, description, prix, categorie, image, createdAt

3. **Avis** : Commentaires clients
   - contenu, note, statut (validé/en attente), auteur, createdAt

4. **Contact** : Messages reçus
   - nom, email, sujet, message, lu, createdAt

## 🚀 Installation

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- MySQL 8.0 ou supérieur
- Symfony CLI (recommandé)

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone https://github.com/[votre-compte]/fitzone-symfony.git
cd fitzone-symfony
