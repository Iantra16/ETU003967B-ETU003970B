create database db_s2_ETU003970;
use db_s2_ETU003970;

create table final_project_membre(
    id_membre int auto_increment primary key,
    nom varchar(100) not null,
    date_naissance date,
    gender ENUM ('M','F')  NOT NULL, 
    email varchar(100) UNIQUE not null,
    ville varchar(100),
    mdp varchar(100) not null,
    image_profil varchar(255)
);


create table final_project_categorie(
    id_categorie int auto_increment primary key,
    nom_categorie varchar(50)
);

create table final_project_objet(
    id_objet int auto_increment primary key,
    nom_objet varchar(50),
    id_categorie int not null,
    id_membre int not null,
    FOREIGN key (id_categorie) REFERENCES final_project_categorie (id_categorie) ON DELETE CASCADE,
    FOREIGN key (id_membre) REFERENCES final_project_membre (id_membre) ON DELETE CASCADE
);

CREATE TABLE final_project_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    nom_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_objet) REFERENCES final_project_objet(id_objet) ON DELETE CASCADE
);

CREATE TABLE final_project_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    id_membre INT NOT NULL,
    date_emprunt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    date_retour DATETIME,
    FOREIGN KEY (id_objet) REFERENCES final_project_objet(id_objet) ON DELETE CASCADE,
    FOREIGN KEY (id_membre) REFERENCES final_project_membre(id_membre) ON DELETE CASCADE
);

create or replace view final_project_v_objet as
SELECT obj.nom_objet,cat.nom_categorie,meb.nom,obj.id_objet 
FROM final_project_objet obj 
    join final_project_categorie cat on obj.id_categorie = cat.id_categorie
    join final_project_membre meb on obj.id_membre = meb.id_membre;

create or replace view final_project_v_objet_emprunter as
SELECT o.*,em.date_emprunt,em.date_retour from final_project_v_objet o 
join final_project_emprunt em on em.id_objet = o.id_objet;
    

    
SELECT * from final_project_categorie;
SELECT * from final_project_emprunt;
SELECT * from final_project_images_objet;
SELECT * from final_project_objet;
SELECT * from final_project_v_objet_emprunter_ko;

create or replace view final_project_v_objet_emprunter_ko as
SELECT o.*,em.date_emprunt,em.date_retour,em.id_membre From final_project_emprunt em
 join final_project_v_objet o on em.id_objet = o.id_objet
 WHERE  (em.id_membre = '%d' ) and (em.date_retour is null or em.date_retour >= NOW()) ;

-- 4 membres
INSERT INTO final_project_membre (nom, date_naissance, gender, email, ville, mdp, image_profil) VALUES
('Alice Dupont', '1990-05-15', 'F', 'alice.dupont@example.com', 'Antananarivo', 'mdp_alice', 'alice_profile.jpg'),
('Bob Martin', '1988-11-22', 'M', 'bob.martin@example.com', 'Toamasina', 'mdp_bob', 'bob_profile.jpg'),
('Carole Lefevre', '1992-03-01', 'F', 'carole.lefevre@example.com', 'Fianarantsoa', 'mdp_carole', 'carole_profile.jpg'),
('David Bernard', '1985-07-30', 'M', 'david.bernard@example.com', 'Mahajanga', 'mdp_david', 'david_profile.jpg');

-- 4 catégories
INSERT INTO final_project_categorie (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');

-- 10 objets par membre (total 40 objets)
-- Membre 1 (Alice Dupont)
INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux professionnel', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Kit de manucure', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Perceuse visseuse', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Scie sauteuse', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Clé dynamométrique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Cric hydraulique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Mixeur plongeant', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Robot de cuisine multifonction', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Fer à repasser vapeur', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')),
('Pistolet à colle', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont'));

-- Membre 2 (Bob Martin)
INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) VALUES
('Ponceuse excentrique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Niveau laser', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Compresseur d''air', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Jeu de clés à douilles', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Machine à café expresso', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Machine à pain', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Tondeuse à cheveux', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Rasoir électrique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Poste à souder', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')),
('Testeur de batterie auto', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin'));

-- Membre 3 (Carole Lefevre)
INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) VALUES
('Kit de maquillage complet', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Lisseur à cheveux', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Dremel multifonction', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Pistolet à peinture', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Pompe à vélo', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Démarreur de batterie portable', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Friteuse sans huile', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Appareil à raclette', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Lampe UV pour ongles', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')),
('Sertisseuse de câbles', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre'));

-- Membre 4 (David Bernard)
INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) VALUES
('Kit de dessin professionnel', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Appareil photo reflex', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Marteau-piqueur', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Tronçonneuse électrique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Scanner de diagnostic OBD2', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Équilibreuse de roues', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Mécanique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Barbecue à gaz', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Plancha électrique', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Cuisine'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Microphone de studio', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Esthétique'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')),
('Nettoyeur haute pression', (SELECT id_categorie FROM final_project_categorie WHERE nom_categorie = 'Bricolage'), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard'));


-- Exemples d'images pour quelques objets (tu devras adapter pour tous les objets réels)
-- Note: Les IDs des objets sont auto-incrémentés, donc ils dépendront de l'ordre d'insertion.
-- Il est plus sûr de récupérer l'ID de l'objet par son nom et l'ID du membre propriétaire.
INSERT INTO final_project_images_objet (id_objet, nom_image) VALUES
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Sèche-cheveux professionnel' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')), 'seche_cheveux_pro_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Perceuse visseuse' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')), 'perceuse_visseuse_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Ponceuse excentrique' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')), 'ponceuse_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Machine à café expresso' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')), 'machine_cafe_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Kit de maquillage complet' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')), 'kit_maquillage_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Appareil à raclette' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')), 'raclette_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Appareil photo reflex' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')), 'appareil_photo_1.jpg'),
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Barbecue à gaz' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')), 'barbecue_1.jpg');


-- 10 emprunts
-- Pour les emprunts, il faut un objet qui appartient à un membre X, et qui est emprunté par un membre Y (Y != X).
INSERT INTO final_project_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
-- Emprunt 1: Bob emprunte le sèche-cheveux d'Alice (retourné)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Sèche-cheveux professionnel' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin'), '2025-06-01 10:00:00', '2025-06-05 10:00:00'),
-- Emprunt 2: Carole emprunte la perceuse d'Alice (en cours)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Perceuse visseuse' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre'), '2025-07-10 14:30:00', NULL),
-- Emprunt 3: David emprunte le mixeur d'Alice (retourné)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Mixeur plongeant' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont')), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard'), '2025-05-20 09:00:00', '2025-05-22 09:00:00'),
-- Emprunt 4: Alice emprunte la ponceuse de Bob (en cours)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Ponceuse excentrique' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont'), '2025-07-12 11:00:00', NULL),
-- Emprunt 5: Carole emprunte le compresseur de Bob (retourné)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Compresseur d''air' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre'), '2025-06-25 16:00:00', '2025-06-28 16:00:00'),
-- Emprunt 6: David emprunte la machine à café de Bob (en cours)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Machine à café expresso' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin')), (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard'), '2025-07-14 08:00:00', NULL),
-- Emprunt 7: Alice emprunte le kit de maquillage de Carole (retourné)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Kit de maquillage complet' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont'), '2025-07-01 13:00:00', '2025-07-03 13:00:00'),
-- Emprunt 8: Bob emprunte la friteuse de Carole (en cours)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Friteuse sans huile' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Bob Martin'), '2025-07-13 19:00:00', NULL),
-- Emprunt 9: Carole emprunte l'appareil photo de David (retourné)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Appareil photo reflex' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Carole Lefevre'), '2025-06-18 10:00:00', '2025-06-20 10:00:00'),
-- Emprunt 10: Alice emprunte le barbecue de David (en cours)
((SELECT id_objet FROM final_project_objet WHERE nom_objet = 'Barbecue à gaz' AND id_membre = (SELECT id_membre FROM final_project_membre WHERE nom = 'David Bernard')), (SELECT id_membre FROM final_project_membre WHERE nom = 'Alice Dupont'), '2025-07-11 17:00:00', NULL);