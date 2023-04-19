
# Agenda Create

Application de gestion d'agenda avec la possibilité de créer de nouveaux agendas ainsi que des contacts.
Actuellement, nous avons seulement la possibilité de créer un utilisateur et de se connecter.






## Installation


```bash
Symfony CLI version v4.25.9
  composer install 
  - Créer la BDD: 
  php bin/console doctrine:database:create
  - Modifier le .env:
  DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
```
    
## Lancement

```bash
- Lancer le serveur symfony:
symfony server:start
- Pour créer un utilisateur:
127.0.0.1:8000/register
- Pour se connecter:
127.0.0.1:8000/login 
```

## Auteur

- [@RoiBann](https://github.com/RoiBann) (Chauveau Emmanuel)

