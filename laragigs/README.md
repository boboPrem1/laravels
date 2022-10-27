# LaraGigs app

Une application pour poster des jobs laravel

## Utilisation

### Mise en place Base de donnée
Cette application utilise MySQL pour fonctionner si vous en utilisez un autre veuillez mettre le driver adequat dans "config/Database.php"

Vou devez avoir MySQL sur votre machine, créer une base de donnée et ajoutez les crédentials(database, username et password) à une copie du fichier .env.example et renommez le .env

### Les Migrations
Pour créer toutes les tables et colonnes nécéssaires lancer ceci 
```
php artisan migrate
```

### Remplissement de la base de données
Pour ajouter des jobs par hasard et un seul utilisateur faites
```
php artisan db:seed
```

### Upload de fichier
Quand es fichier sont uploadés ils vont à "storage/app/public". Créez un liens vers ce dossier pour les rendre accessible publiquement en faisant
```
php artisan storage:link
```

### Lancez l'Application
Copiez les fichier vers votre dosier Root, Dossier valet ou lancez
```
php artisan serve
```

## License

L'Application Laragigs est Open Source avec une licence [MIT license](https://opensource.org/licenses/MIT).
