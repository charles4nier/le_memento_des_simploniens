INSERT INTO `user` (`login`, `password`, `role`) VALUES
('charles4nier', '@coucou@1948@', 'admin');

INSERT INTO `article` (`id_user`,`title`, `content`, `link`) VALUES
(1, 'How to CRUD with React', 'Un tuto pour apprendre à modifier ses bases de données avec react.', 'https://www.codeofaninja.com/2016/07/react-crud-tutorial.html'),
(1, 'Comment fluidifier les animations', 'Un article qui explique comment optimiser ses animations en css', 'https://www.kirupa.com/html5/animating_movement_smoothly_using_css.htm'),
(1, 'Styliser la couleur du placeholder', '', 'https://css-tricks.com/almanac/selectors/p/placeholder/'),
(1, 'Tdd JS', '', 'https://github.com/simplonco/js-challenges'),
(1, 'Accès fichier travail react elephorm', '', 'https://github.com/hqro/Elephorm-React-Basics'),
(1, 'Laravel - Traversy Media', 'Une série de tutos pour apprendre les bases de Laravel en créant un blog.', 'https://www.youtube.com/watch?v=EU7PRmCpx-0&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-'),
(1, 'Preload Image', 'Un article qui explique comment charger des images avant d\'afficher la page web.', 'http://www.thonky.com/javascript-and-css-guide/javascript-image-preload'),
(1, 'Création de maquette', 'Utiliser Vectr qui permet de faire gratuitement des maquettes', 'https://vectr.com/'),
(1, 'Comment créer une Api Rest Laravel', 'Cet article nous apprend à mettre en place une Api Rest avec Laravel.', 'https://www.toptal.com/laravel/restful-laravel-api-tutorial'),
(1, 'Vue Js et Vue ressource', 'Comment faire une connexion avec une abse de données', 'https://medium.com/codingthesmartway-com-blog/vue-js-2-vue-resource-real-world-vue-application-with-external-api-access-c3de83f25c00');

INSERT INTO `tag` (`tag_name`) VALUES
('HTML'), ('CSS'), ('JS'), ('PHP'), ('Design'), ('Maquette'), ('VueJS'), ('ReactJs'), ('Test'), ('Laravel'), ('Tutos'), ('API');

INSERT INTO `tag_article` (`id_article`, `id_tag`) VALUES (1, 3), (1, 8), (1, 11), (2, 2), (3, 2), (4, 3), (4,9), (5, 10), (6, 4), (6, 10), (6, 11), (7, 3), (8, 5), (8, 6), (8, 10), (9, 4), (9, 10), (9, 11), (10, 3), (10, 7), (10, 10);
